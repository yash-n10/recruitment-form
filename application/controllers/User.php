<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
public function __construct()
	{		
		parent::__construct();		
		// error_reporting(E_ALL & ~E_NOTICE);	
		error_reporting(0);
	}
	public function dashboard()

	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
       
            redirect('home', 'refresh');
        }

        $uid = $this->session->userdata['uid'];  
        $name = $this->session->userdata['name'];
        $data = $this->dbconnection->select('application_form_zoned','*','reg_id='.$uid); 
        $application_no= $data[0]->form_no; 
        $application_status= $data[0]->application_status; 
       	if(isset($data[0]))
       	{
       		$datas = $this->dbconnection->select('adm_transaction_zoned','*',"registered_id='$uid' AND paid_status='1'" ); 
       		if(isset($datas[0])) {
       		$page_title = 'Download';	
			$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'application_status'=>$application_status,'name'=>$name,'application_no'=>$application_no);
       		}
       		else {
       	
       		$page_title = 'Pay Now';	
			$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);
			}
       	}
       	else
       	{

	        $serial = $this->dbconnection->get_max_value("id","serial","application_form_zoned");
	        $serials=$serial+1;
	        $serial_n= 'DAVJHZONED-'.$serials; 
	     	$page_title = 'Dashboard';	
			$array = array('view'=>'dashboard','page_title' => $page_title,'form_no'=>$serial_n,'uid'=>$uid);
		}
		$this->load->view('user/template',$array);	

	}

	public function save()
	{	
	
		$this->load->library('image_lib');
		$serial = $this->dbconnection->get_max_value("id","serial","application_form_zoned");
        $serials=$serial+1;
        $serial_n= 'DAVJHZONED-'.$serials;    
        $uid = $this->session->userdata['uid'];
		//$form_no=$this->input->post('form_no');
		$form_no = $serial_n;
		$date_app=$this->input->post('date_app');
		$dob=$this->input->post('dob');
		$teaching_cat=$this->input->post('teaching_cat');
		$teaching_post=$this->input->post('teaching_post');
		$non_teaching=$this->input->post('non_teaching');
		$pgt_teaching=$this->input->post('pgt_teaching');
		$tgt_teaching=$this->input->post('tgt_teaching');
		$prt_teaching=$this->input->post('prt_teaching');
		$nursury_sub=$this->input->post('nt_teaching');
		$fname=$this->input->post('fname');
		$mname=$this->input->post('mname');
		$lname=$this->input->post('lname');
		$fathername=$this->input->post('fathername');
		$father_mname=$this->input->post('father_mname');
		$father_lname=$this->input->post('father_lname');
		$hus_wife_name=$this->input->post('hus_wife_name');
		$hus_wife_mname=$this->input->post('hus_wife_mname');
		$hus_wife_lname=$this->input->post('hus_wife_lname');
		$email=$this->input->post('email');
		$aadhar=$this->input->post('aadhar');
		$gender=$this->input->post('gender');
		$mobile=$this->input->post('mobile');
		$nation=$this->input->post('nation');
		$religion=$this->input->post('religion');
		$cat=$this->input->post('cat');
		$tongue=$this->input->post('tongue');
		$marital=$this->input->post('marital');
		$permanent_address=$this->input->post('permanent_address');
		$permanent_postoffice=$this->input->post('permanent_postoffice');
		$permanent_state=$this->input->post('permanent_state');
		$permanent_district=$this->input->post('permanent_district');
		$permanent_city=$this->input->post('permanent_city');
		$permanent_pin=$this->input->post('permanent_pin');
		$present_address=$this->input->post('present_address');
		$present_postoffice=$this->input->post('present_postoffice');
		$present_state=$this->input->post('present_state');
		$present_district=$this->input->post('present_district');
		$present_city=$this->input->post('present_city');
		$present_pin=$this->input->post('present_pin');
		$mat_year=$this->input->post('mat_year');
		$mat_board=$this->input->post('mat_board');
		$mat_division=$this->input->post('mat_division');
		$mat_percentage=$this->input->post('mat_percentage');
		$mat_subject=$this->input->post('mat_subject');
		$inter_year=$this->input->post('inter_year');
		$inter_board=$this->input->post('inter_board');
		$inter_division=$this->input->post('inter_division');
		$inter_percentage=$this->input->post('inter_percentage');
		$inter_subject=$this->input->post('inter_subject');
		$grad_year=$this->input->post('grad_year');
		$grad_board=$this->input->post('grad_board');
		$grad_division=$this->input->post('grad_division');
		$grad_percentage=$this->input->post('grad_percentage');
		$grad_subject=$this->input->post('grad_subject');
		$post_grad_year=$this->input->post('post_grad_year');
		$post_grad_board=$this->input->post('post_grad_board');
		$post_grad_division=$this->input->post('post_grad_division');
		$post_grad_percentage=$this->input->post('post_grad_percentage');
		$post_grad_subject=$this->input->post('post_grad_subject');
		$bed_year=$this->input->post('bed_year');
		$bed_board=$this->input->post('bed_board');
		$bed_division=$this->input->post('bed_division');
		$bed_percentage=$this->input->post('bed_percentage');
		$bed_subject=$this->input->post('bed_subject');
		$ctet_year=$this->input->post('ctet_year');
		$ctet_board=$this->input->post('ctet_board');
		$ctet_division=$this->input->post('ctet_division');
		$ctet_percentage=$this->input->post('ctet_percentage');
		$ctet_subject=$this->input->post('ctet_subject');
		$other_year=$this->input->post('other_year');
		$other_board=$this->input->post('other_board');
		$other_division=$this->input->post('other_division');
		$other_percentage=$this->input->post('other_percentage');
		$other_subject=$this->input->post('other_subject');
		$comp=$this->input->post('comp');
		$present_emp=$this->input->post('present_emp');
		$place_work=$this->input->post('place_work');
		$experience_school=$this->input->post('experience_school');
		$experience_school_place=$this->input->post('experience_school_place');
		$exp_name=$this->input->post('exp_name');
		$exp_months=$this->input->post('exp_months');
		$last_pay=$this->input->post('last_pay');
		$ctc=$this->input->post('ctc');
		$job_center1=$this->input->post('job_center1');
		$job_center2=$this->input->post('job_center2');
		$exam_center=$this->input->post('exam_center');
		
		$rand=mt_rand(100000, 999999);	 

	    $photoimg_name=$_FILES['img']['name'];
        $pic_img_name=$uid.'_'.time();
        $fileExt = pathinfo($photoimg_name, PATHINFO_EXTENSION);
        $photoimg_upload_name=$pic_img_name;
	    $config['upload_path'] = 'uploads/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] =$photoimg_upload_name;
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $upload_1=$this->upload->do_upload("img");
        $uploadData_1 = $this->upload->data();
        $image = $uploadData_1['file_name'];
        $new_name = $uid.'_'.time().$uploadData_1['file_ext'];

         $img_name=$_FILES['matric_marsheet']['name'];
        $up_img_name=$uid.'_'.time();
        $fileExt = pathinfo($img_name, PATHINFO_EXTENSION);
        $matric_marsheet_name=$up_img_name;

	    $config_matric['upload_path'] = 'uploads/matricdoc/';
        $config_matric['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
        $config_matric['file_name'] =$matric_marsheet_name;
        $config_matric['overwrite'] = false;
        $this->load->library('upload', $config_matric);
        $this->upload->initialize($config_matric);
        $upload_2=$this->upload->do_upload("matric_marsheet");
        $uploadData = $this->upload->data();
        $image = $uploadData['file_name'];
        $matric_marsheet_name = $uid.'_'.time().$uploadData['file_ext'];

        $bed_name=$_FILES['bed_certificate']['name'];
        $bed_img_name=$uid.'_'.time();
        $fileExt = pathinfo($bed_name, PATHINFO_EXTENSION);
        $bed_marsheet_name=$bed_img_name;      	
		$config_bed['upload_path'] = 'uploads/beddoc/';
        $config_bed['allowed_types'] = 'jpg|png|jpeg|gif|pdf';		
    
        $config_bed['file_name'] =$bed_marsheet_name;
        $config_bed['overwrite'] = false;
        $this->load->library('upload', $config_bed);
        $this->upload->initialize($config_bed);
      	$upload_7=$this->upload->do_upload("bed_certificate");

      	$uploadData_bed = $this->upload->data();
        $image_bed = $uploadData_bed['file_name'];
        $bed_final = $uid.'_'.time().$uploadData_bed['file_ext'];

        $other_name_sec=$_FILES['other_certificate_second']['name'];
        $other_img_name_sec=$uid.'_'.time();
        $fileExt = pathinfo($other_name_sec, PATHINFO_EXTENSION);
        $other_marsheet_name_sec=$other_img_name_sec;
		$config_other_sec['upload_path'] = 'uploads/otherdoc_second/';
        $config_other_sec['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
        
        $config_other_sec['file_name'] =$other_marsheet_name_sec;
        $config_other_sec['overwrite'] = false;
        $this->load->library('upload', $config_other_sec);
        $this->upload->initialize($config_other_sec);
      	$upload_10=$this->upload->do_upload("other_certificate_second");

      	$uploadData_other_sec = $this->upload->data();
        $image_other_sec = $uploadData_other_sec['file_name'];
        $other_final_sec = $uid.'_'.time().$uploadData_other_sec['file_ext'];
	    
        if(($teaching_post=='PGT') && ($pgt_teaching=='ENGLISH')){
		   $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='ENGLISH'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'ENG/'.'100'.$form_serials;
		  
	    } else if (($teaching_post=='PGT') && ($pgt_teaching=='MATHS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='MATHS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'MAT/'.'100'.$form_serials;
	   	 } 

	    else if (($teaching_post=='PGT') && ($pgt_teaching=='PHYSICS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='PHYSICS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'PHY/'.'100'.$form_serials;
	    }
	    else if (($teaching_post=='PGT') && ($pgt_teaching=='CHEMISTRY')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='CHEMISTRY'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'CHM/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PGT') && ($pgt_teaching=='BIOLOGY')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='BIOLOGY'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'BIO/'.'100'.$form_serials;
	   	 }
	   	  else if (($teaching_post=='PGT') && ($pgt_teaching=='HISTORY')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='HISTORY'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'HIS/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PGT') && ($pgt_teaching=='ECONOMICS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='ECONOMICS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'EC/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PGT') && ($pgt_teaching=='COMMERCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='COMMERCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'COMM/'.'100'.$form_serials;
	   	 }

	   	 
	   	 else if (($teaching_post=='PGT') && ($pgt_teaching=='COMPUTER-SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='COMPUTER-SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'CSE/'.'100'.$form_serials;
	   	 }
	   	 
	   	 //  else if (($teaching_post=='PGT') && ($pgt_teaching=='BIO_TECHNOLOGY')){
	    	// $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='BIO_TECHNOLOGY'");
		    // $pgtval=$getcat_value[0]->pgt_id;
		    // $form_serials=$pgtval+1;
		    // $sub_form_no='P/'.'BT/'.'100'.$form_serials;
	   	 // }
	   	 //  else if (($teaching_post=='PGT') && ($pgt_teaching=='ACCOUNTS')){
	    	// $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='ACCOUNTS'");
		    // $pgtval=$getcat_value[0]->pgt_id;
		    // $form_serials=$pgtval+1;
		    // $sub_form_no='P/'.'ACC/'.'100'.$form_serials;
	   	 // }	
	   	 // else if (($teaching_post=='PGT') && ($pgt_teaching=='BUSINESS_STUDIES')){
	    	// $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PGT' and pgt_teaching='BUSINESS_STUDIES'");
		    // $pgtval=$getcat_value[0]->pgt_id;
		    // $form_serials=$pgtval+1;
		    // $sub_form_no='P/'.'BS/'.'100'.$form_serials;
	   	 // }	
	   	 

	   	 else if (($teaching_post=='TGT') && ($tgt_teaching=='ENGLISH')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='ENGLISH'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		     $sub_form_no='T/'.'ENG/'.'100'.$form_serials;
	   	 }
	   	  else if (($teaching_post=='TGT') && ($tgt_teaching=='MATHS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='MATHS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'MAT/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='TGT') && ($tgt_teaching=='HINDI')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='HINDI'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'HIN/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='TGT') && ($tgt_teaching=='SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'SCI/'.'100'.$form_serials;
	   	 }
	   	else if (($teaching_post=='TGT') && ($tgt_teaching=='SOCIAL-SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='SOCIAL-SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'SS/'.'100'.$form_serials;
	   	 }
	   	 	 else if (($teaching_post=='TGT') && ($tgt_teaching=='SANSKRIT')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='SANSKRIT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'SNS/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='TGT') && ($tgt_teaching=='COMPUTER-SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='COMPUTER-SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'CS/'.'100'.$form_serials;
	   	 }

	   	
	   	   else if (($teaching_post=='TGT') && ($tgt_teaching=='FINE-ARTS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='FINE-ARTS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'FA/'.'100'.$form_serials;
	   	 }	
	   	 else if (($teaching_post=='PRT') && ($tgt_teaching=='PHYSICAL_EDUCATION')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT' and tgt_teaching='PHYSICAL_EDUCATION'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'PE/'.'100'.$form_serials;
	   	 }

	   	

	   	 else if (($teaching_post=='PRT') && ($prt_teaching=='ENGLISH')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='ENGLISH'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		     $sub_form_no='P/'.'ENG/'.'100'.$form_serials;
	   	 }
	   	  else if (($teaching_post=='PRT') && ($prt_teaching=='MATHS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='MATHS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'MAT/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PRT') && ($prt_teaching=='HINDI')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='HINDI'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'HIN/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PRT') && ($prt_teaching=='SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'SCI/'.'100'.$form_serials;
	   	 }
	   	else if (($teaching_post=='PRT') && ($prt_teaching=='SOCIAL-SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='SOCIAL-SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'SS/'.'100'.$form_serials;
	   	 }
	   	 	 else if (($teaching_post=='PRT') && ($prt_teaching=='SANSKRIT')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='SANSKRIT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'SNS/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_post=='PRT') && ($prt_teaching=='COMPUTER-SCIENCE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='COMPUTER-SCIENCE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'CS/'.'100'.$form_serials;
	   	 }

	   	
	   	   else if (($teaching_post=='PRT') && ($prt_teaching=='FINE-ARTS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='FINE-ARTS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'FA/'.'100'.$form_serials;
	   	 }	

	   	  else if (($teaching_post=='PRT') && ($prt_teaching=='MUSICS')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='MUSICS'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'MS/'.'100'.$form_serials;
	   	 }	
	   	 else if (($teaching_post=='PRT') && ($prt_teaching=='PHYSICAL_EDUCATION')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='PRT' and prt_teaching='PHYSICAL_EDUCATION'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='P/'.'PE/'.'100'.$form_serials;
	   	 }
	   	 
	   	 //  else if (($teaching_post=='TGT/PRT') && ($tgt_prt_teaching=='GENERAL SCIENCE')){
	    	// $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT/PRT' and tgt_prt_teaching='GENERAL_SCIENCE'");
		    // $pgtval=$getcat_value[0]->pgt_id;
		    // $form_serials=$pgtval+1;
		    // $sub_form_no='T/'.'GS/'.'100'.$form_serials;
	   	 // }	
	   	  
	   	  
	 	  
	   	 //  else if (($teaching_post=='TGT/PRT') && ($tgt_prt_teaching=='PHYSICAL_EDUCATION')){
	    	// $getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='TGT/PRT' and tgt_prt_teaching='PHYSICAL_EDUCATION'");
		    // $pgtval=$getcat_value[0]->pgt_id;
		    // $form_serials=$pgtval+1;
		    // $sub_form_no='T/'.'PE/'.'100'.$form_serials;
	   	 // }

	   	   else if (($teaching_post=='NURSERY')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_post='NURSERY'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'NR/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='LDC')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='LDC'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'LD/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='UDC')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='UDC'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'UD/'.'100'.$form_serials;
	   	 } 
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='ASSISTANT')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='ASSISTANT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'AST/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='OFFICE-SUPERINTENDENT')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='OFFICE SUPERINTENDENT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'OS/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='NURSE')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='NURSE'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'NUR/'.'100'.$form_serials;
	   	 }	
	   	   else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='RECEPTIONIST')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='RECEPTIONIST'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'REC/'.'100'.$form_serials;
	   	 }
	   	 else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='LIBRARIAN')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='LIBRARIAN'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'LIB/'.'100'.$form_serials;
	   	 }
	   	  else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='LIBRARY-ASSISTANT"')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='LIBRARY-ASSISTANT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'LIA/'.'100'.$form_serials;
	   	 }
	   	  else if (($teaching_cat=='NON-TEACHING') && ($non_teaching=='LAB-ASSISTANT')){
	    	$getcat_value=$this->dbconnection->select("application_form_zoned","count('id') as pgt_id","teaching_cat='NON-TEACHING' and non_teaching='LAB-ASSISTANT'");
		    $pgtval=$getcat_value[0]->pgt_id;
		    $form_serials=$pgtval+1;
		    $sub_form_no='T/'.'LAB/'.'100'.$form_serials;
	   	 }

	    else {
	    	$sub_form_no='DAVJHZONED'.''.'/E1001'.$form_serials;
	    }

		$data= array(
			'reg_id'=>$uid,
			'form_no' => $form_no, 
			'date_app' => $date_app, 
			'dob' => $dob, 
			'teaching_cat' => $teaching_cat, 
			'teaching_post' => $teaching_post,
			'non_teaching' => $non_teaching, 
			'pgt_teaching' => $pgt_teaching, 
			'tgt_teaching' => $tgt_teaching, 
			'prt_teaching' => $prt_teaching, 
			'nursury_sub' => $nursury_sub, 
			'sub_form_no' => $sub_form_no, 
			'fname' => $fname, 
			'mname' => $mname, 
			'lname' => $lname, 
			'fathername' => $fathername, 
			'father_mname' => $father_mname, 
			'father_lname' => $father_lname, 
			'hus_wife_name' => $hus_wife_name,
			'hus_wife_mname' => $hus_wife_mname, 
			'hus_wife_lname' => $hus_wife_lname, 
			'email' => $email, 
			'aadhar' => $aadhar, 
			'gender' => $gender, 
			'mobile' => $mobile, 
			'nation' => $nation, 
			'religion' => $religion, 
			'cat' => $cat, 
			'tongue' => $tongue, 
			'marital' => $marital, 
			'permanent_address' => $permanent_address, 
			'permanent_postoffice' => $permanent_postoffice,
			'permanent_state' => $permanent_state, 
			'permanent_district' => $permanent_district, 
			'permanent_city' => $permanent_city, 
			'permanent_pin' => $permanent_pin, 
			'present_address' => $present_address, 
			'present_postoffice' => $present_postoffice, 
			'present_state' => $present_state, 
			'present_district' => $present_district, 
			'present_city' => $present_city, 
			'present_pin' => $present_pin, 
			'mat_year' => $mat_year, 
			'mat_board' => $mat_board, 
			'mat_division' => $mat_division, 
			'mat_percentage' => $mat_percentage, 
			'mat_subject' => $mat_subject, 
			'inter_year' => $inter_year, 
			'inter_board' => $inter_board, 
			'inter_division' => $inter_division,
			'inter_percentage' => $inter_percentage,
			'inter_subject' => $inter_subject, 
			'grad_year' => $grad_year, 
			'grad_board' => $grad_board, 
			'grad_division' => $grad_division, 
			'grad_percentage' => $grad_percentage, 
			'grad_subject' => $grad_subject, 
			'post_grad_year' => $post_grad_year, 
			'post_grad_board' => $post_grad_board, 
			'post_grad_division' => $post_grad_division, 
			'post_grad_percentage' => $post_grad_percentage, 
			'post_grad_subject' => $post_grad_subject, 
			'bed_year' => $bed_year, 
			'bed_board' => $bed_board, 
			'bed_division' => $bed_division, 
			'bed_percentage' => $bed_percentage,
			'bed_subject' => $bed_subject, 
			'ctet_year' => $ctet_year, 
			'ctet_board' => $ctet_board, 
			'ctet_division' => $ctet_division,
			'ctet_percentage' => $ctet_percentage, 
			'ctet_subject' => $ctet_subject, 
			'other_year' => $other_year, 
			'other_board' => $other_board, 
			'other_division' => $other_division, 
			'other_percentage' => $other_percentage, 
			'other_subject' => $other_subject, 
			'comp' => $comp, 
			'present_emp' => $present_emp, 
			'place_work' => $place_work, 
			'experience_school' => $experience_school, 
			'experience_school_place' => $experience_school_place, 
			'exp_name' => $exp_name, 
			'exp_months' => $exp_months, 
			'last_pay' => $last_pay, 
			'ctc' => $ctc, 
			// 'uploads' => $image_one,
			'uploads' => $new_name,
			'matric_marsheet_name' => $matric_marsheet_name,	
			'bed_final' => $bed_final,		
			'other_final_sec' => $other_final_sec,
			'job_center1' => $job_center1,
			'job_center2' => $job_center2,
			'examination_center' => $exam_center,
			'ip' =>$_SERVER['REMOTE_ADDR'],

		);	
		$sel = $this->dbconnection->select("application_form_zoned","*","reg_id='$uid'");
		if($sel)
		{

		}
		else {
			if(!empty($_POST)){
			 $this->dbconnection->insert('application_form_zoned',$data);			 
			}
			else {
				redirect('user/dashboard','refresh');
			}
		}
		
		// $this->dbconnection->insert('application_form_zonef',$data);		
		redirect('User/pay', 'refresh');
	// }		

	}

	public function pay()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }

        $uid = $this->session->userdata['uid']; 
        $name = $this->session->userdata['name'];
        $data = $this->dbconnection->select('application_form_zoned','*','reg_id='.$uid); 
         $application_no= $data[0]->form_no;  
         $application_status = $data[0]->application_status ;  
        // $page_title = 'Pay Now';	
		 $page_title = 'Pay Now';		
		// $array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);
        if(isset($data[0]))
        {
        	$application_no= $data[0]->form_no;  
        	$datas = $this->dbconnection->select('adm_transaction_zoned','*',"registered_id='$uid' AND paid_status='1'" ); 
        	if(isset($datas[0])) {
        		$page_title = 'Download';		
        		$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'application_status'=>$application_status,'name'=>$name,'application_no'=>$application_no);
        	}
        	else {

        		$page_title = 'Pay Now';		
        		$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);
        	}
        }else{
        	$application_no=0;
        	$page_title = 'Pay Now';		
        	$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);

        }

        $this->load->view('user/template',$array);
    }



	public function download()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }
         $uid = $this->session->userdata['uid'];
         $getid = $this->dbconnection->select("application_form_zoned","*","reg_id=".$uid); 
         $application_no= $getid[0]->form_no;
         $application_status= $getid[0]->application_status;
         $name = $this->session->userdata['name'];
		$page_title = 'Download';	
		$array = array('view'=>'download','page_title' => $page_title,'name'=>$name,'uid'=>$uid,'application_status'=>$application_status,'application_no'=>$application_no);
		$this->load->view('user/template',$array);
	}


	function form_pdf(){		

		$id = $this->uri->segment(2);	
		$row=$this->dbconnection->select('application_form_zoned','*','reg_id='.$id);
		$array = array('data'=>$row);
		$this->load->view('user/application_form_pdf',$array);
		$html = $this->output->get_output();
		// Load library
		$this->load->library('pdf');	

		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("application_form.pdf");
	 }



	 function admit_card(){
		

		$id = $this->uri->segment(2);
		$row=$this->dbconnection->select('application_form_zoned','*','reg_id='.$id);	
		$array = array('data'=>$row);
		$this->load->view('user/admit_card_pdf',$array);
		$html = $this->output->get_output();
		// Load library
		$this->load->library('pdf');
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("admit_card.pdf");
	 }

       function payment_receipt(){

    	$id = $this->uri->segment(2);
    	$row=$this->dbconnection->select('adm_transaction_zoned','*','paid_status="1" AND registered_id='.$id);	
    	$data_stu = $this->dbconnection->select('application_form_zoned','*','reg_id='.$id);	
    	$array = array('data'=>$row,'datauser'=>$data_stu);
    	$this->load->view('user/payment_receipt_pdf',$array);
    	$html = $this->output->get_output();
		// Load library
    	$this->load->library('pdf');

		// Convert to PDF
    	$this->dompdf->load_html($html);
    	$this->dompdf->render();
    	$this->dompdf->stream("payment_receipt.pdf");
    }



	

	public function user_profile()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }
		$page_title = 'Profile';	
		$array = array('view'=>'profile','page_title' => $page_title);
		$this->load->view('user/template',$array);	
	}	

	public function ajax_return()
	{
		$mobile = $this->input->post('mobile');
		$data = array(
			'mobile' =>$mobile,			
		);
		$counts = $this->dbconnection->count('register_zoned',$data);
		echo $counts;
	}

}



