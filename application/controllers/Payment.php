<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {   
public function __construct()

    {       
        parent::__construct();     

        error_reporting(E_ALL & ~E_NOTICE);
    }


    public function request()
    {
        $user_id=$this->session->userdata('uid');
        $amount=$this->input->post('fees');  
        $form_no=$this->input->post('form_no');  
        $ran = rand(1000,9999);
        $date = strtotime(date('Y-m-d H:i:s'));
        //$orderid =  'DAVRO-G-'.$ran.''.$date;
        $orderid =  $form_no.$ran.'-'.$user_id;
        $data=array(
           'registered_id'=>$user_id,
           'total_amount'=>$amount,
           'order_no'=>$orderid,
           'form_no'=>$form_no
        );
        $this->dbconnection->insert('adm_transaction_zoned',$data);
        $last_id=$this->db->insert_id();
        $requestData=array(
                'userid'=>$this->session->userdata('uid'),
                'name'=>$this->session->userdata('name'),
                'email'=>$this->session->userdata('email'),
                'contact'=>$this->session->userdata('contact'),
                'amount'=>$amount,
                'orderno'=>$orderid,
                'trans_id'=>$last_id,
                'form_no'=>$form_no
        );

                // print_r($requestData);

                // die();
        $this->load->view('user/payment/ccavRequestHandler',$requestData);
    }

        public function response(){
            $inputall = $this->input->post();
            $insert_to_db = 'NO';
            $ERROR = '';   
            include ($_SERVER['DOCUMENT_ROOT'] . '/davbarkakana/assets/ccgateway/Crypto.php');

            // $workingKey='73C93F55487701202AB57D44EF933F00';     

            $workingKey='85699D1D523F01C354DF11626611227B';     
            $encResponse = $inputall["encResp"];   //This is the response sent by the CCAvenue Server
            $rcvdString = decrypt($encResponse, $workingKey);  //Crypto Decryption used as per the specified working key.

            $order_status = "";
            $decryptValues = explode('&', $rcvdString);
            $dataSize = sizeof($decryptValues);
            $response = array();
            for ($i = 0; $i < $dataSize; $i++) {
                $information = explode('=', $decryptValues[$i]);
                $response[$information[0]] = $information[1];
            }
            $trans_id = $response['merchant_param4'];
            $trans_cnt_query = $this->dbconnection->select('adm_transaction_zoned', 'count(id) as cnt', "id=$trans_id and (response_code=0 or response_code=2) and status='Y'");
            if ($response['order_status'] === "Success") {
                $responseCode = 0;
                $statusCode = 'S';

            } else {
                $responseCode = 2;
                $statusCode = 'F';
            }
            // print_r($response);
            // die();
            $response_var = array(
                'txnRefNo' => $response['tracking_id'],
                'payment_id' => $response['tracking_id'],
                'orderId' => $response['order_id'],
                'amount' => round($response['amount'], 0),
                'statusCode' => $statusCode,
                'statusDesc' => $response['order_status'],
                'txnReqDate' => date('Y-m-d H:i:s', strtotime(str_replace("/", "-", "{$response['trans_date']}"))),
                'responseCode' => $responseCode,
                'payment_method' => $response['payment_mode'],
                'txnRemarks' => '',
                'full_pgw_response_json' => json_encode($response),
                'doubleresponse' => $trans_cnt_query[0]->cnt,

            );
            $success_page = 'user/payment/hdfc_ccavenue_success_page';
             $PaymentMethod = $response['payment_mode'];
            if ($PaymentMethod == 'Debit Card') {
                $PaymentMode = 'DC';
            } else if ($PaymentMethod == 'Credit Card') {
                $PaymentMode = 'CC';
            } else if ($PaymentMethod == 'Net Banking') {
                $PaymentMode = 'NB';
            } else {
                $PaymentMode = $PaymentMethod;
            }
             if ($response['order_status'] === "Success" || $response['order_status'] === "Aborted" || $response['order_status'] === "Failure") {
                if ($response_var['orderId'] != NULL && $response_var['orderId'] != '' && $trans_cnt_query[0]->cnt == 0) {
                    $insert_to_db = 'YES';
                } else {
                    $ERROR .= 'Invalid Access Or Time Out Or Double Response Received!';
                }

            } else {
                $ERROR .= 'Security_Error. Illegal access detected';
            }

            $response_var['ERROR'] = $ERROR;
            if ($insert_to_db == 'YES') {
                if ($responseCode == 0) { //success
                    $status = 'Y';
                    $paid_status = 1;
                }
                else {
                    $status = 'Pending';
                    $paid_status = 0;
                }
                $data = array(
                'paid_status' => $paid_status,
                'payment_date' => date('Y-m-d H:i:s'),
                'transaction_id' => $response_var['txnRefNo'],
                'response_code' => $responseCode,
                'response_message' => $response_var['statusDesc'],
                'full_pgw_response_json' => $response_var['full_pgw_response_json'],
                'payment_method' => $PaymentMethod,
                'status' => $status,
            );

            $this->dbconnection->update("adm_transaction_zoned", $data, "id=$trans_id");
            }
            else
            {
                                
            }
            $this->load->view($success_page, $response_var);
        }

}