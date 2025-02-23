<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
public function __construct()
	{		
		parent::__construct();		
		error_reporting(0);
		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
		{
		    @set_time_limit(0);
		}
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function admin_page()
	{
		$array=array('view'=>'home_page','page_title' => $page_title);
		$this->load->view('admin/template',$array);
	}
	public function dashboard()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
        $page_title = 'Dashboard';
	 	$registercount = $this->db->query("SELECT COUNT(*) cnt FROM register_zoned")->result();
		$query = $this->db->query("SELECT COUNT(*) cnt FROM application_form_zoned")->result();
	
		 $paymentquery = $this->db->query("SELECT Sum(adm.total_amount) cnt,app.reg_id,adm.registered_id FROM adm_transaction_zoned adm,application_form_zoned app where adm.paid_status='1' AND adm.status='Y' and adm.response_message='Success' and adm.registered_id=app.reg_id ")->result();
		
		   $paymentapplication = $this->db->query("SELECT count(Distinct adm.id) cnt,app.reg_id,adm.registered_id FROM adm_transaction_zoned adm,application_form_zoned app where adm.paid_status='1' AND adm.status='Y' and adm.response_message='Success' and adm.registered_id=app.reg_id")->result();
		
		
		$teachingcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='TEACHING' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$teachingTGTcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
		$teachingPRTcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$teachingPGTcount =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$teachingNurserycount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='NURSERY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();



		$pgt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();


		$pgt_phy_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$pgt_chm_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='CHEMISTRY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$pgt_mth_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$pgt_comm_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMMERCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

	$pgt_cse_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$pgt_bio_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$pgt_his_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='HISTORY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$pgt_biotech_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIO-TECHNOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$pgt_acc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ACCOUNTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$pgt_bus_stu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BUSINESS-STUDIES' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$pgt_eco_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ECONOMICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$pgt_phy_edu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();



		
		$tgt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$tgt_hin_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$tgt_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		
		$tgt_mat_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$tgt_sans_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		

		$tgt_gensci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='GENERAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		
		$tgt_socsci_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SOCIAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		
		$tgt_comp_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();



		
		$tgt_mus_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$tgt_finearts_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='FINE-ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
	
		$tgt_phyedu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();


//prt

		$prt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$prt_hin_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		
		$prt_mat_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$prt_sans_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		

		$prt_gensci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		
		$prt_socsci_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SOCIAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		
		$prt_comp_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();



		
		$prt_mus_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


	
		$prt_finearts_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='FINE-ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
	
		$prt_phyedu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$nonteachingcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING'and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$nonteaching_ldc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		
		$nonteaching_udc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='UDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$nonteaching_assis_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$nonteaching_off_super_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='OFFICE SUPERINTENDENT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$nonteaching_nur_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='NURSE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$nonteaching_recp_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='RECEPTIONIST' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

		$nonteaching_lib_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARIAN' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$nonteaching_lib_assis_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARY ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();


		$nonteaching_lab_assist_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LAB-ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
		

		$array = array('view'=>'dashboard','page_title' => $page_title,'queryy'=>$query,'registercount'=>$registercount,'paymentquery'=>$paymentquery,'paymentapplication'=>$paymentapplication,'teachingcount'=>$teachingcount,'teachingTGTcount'=>$teachingTGTcount,'teachingPRTcount'=>$teachingPRTcount,'teachingPGTcount'=>$teachingPGTcount,'teachingNurserycount'=>$teachingNurserycount,

			'pgt_eng_count'=>$pgt_eng_count,'pgt_phy_count'=>$pgt_phy_count,'pgt_chm_count'=>$pgt_chm_count,'pgt_mth_count'=>$pgt_mth_count,'pgt_cse_count'=>$pgt_cse_count,'pgt_bio_count'=>$pgt_bio_count,'pgt_biotech_count'=>$pgt_biotech_count,'pgt_acc_count'=>$pgt_acc_count,'pgt_bus_stu_count'=>$pgt_bus_stu_count,'pgt_eco_count'=>$pgt_eco_count,'pgt_phy_edu_count'=>$pgt_phy_edu_count,

			'tgt_eng_count'=>$tgt_eng_count,'tgt_hin_count'=>$tgt_hin_count,'tgt_mat_count'=>$tgt_mat_count,'tgt_sans_count'=>$tgt_sans_count,'tgt_gensci_count'=>$tgt_gensci_count,'tgt_sci_count'=>$tgt_sci_count,'tgt_socsci_count'=>$tgt_socsci_count,'tgt_comp_sci_count'=>$tgt_comp_sci_count,'tgt_mus_count'=>$tgt_mus_count,'tgt_finearts_count'=>$tgt_finearts_count,'tgt_phyedu_count'=>$tgt_phyedu_count,'prt_eng_count'=>$prt_eng_count,'prt_hin_count'=>$prt_hin_count,'prt_mat_count'=>$prt_mat_count,'prt_sans_count'=>$prt_sans_count,'prt_gensci_count'=>$prt_gensci_count,'prt_sci_count'=>$prt_sci_count,'prt_socsci_count'=>$prt_socsci_count,'prt_comp_sci_count'=>$prt_comp_sci_count,'prt_mus_count'=>$prt_mus_count,'prt_finearts_count'=>$prt_finearts_count,'prt_phyedu_count'=>$prt_phyedu_count,'nonteachingcount'=>$nonteachingcount,'nonteaching_ldc_count'=>$nonteaching_ldc_count,'nonteaching_udc_count'=>$nonteaching_udc_count,'nonteaching_assis_count'=>$nonteaching_assis_count,'nonteaching_off_super_count'=>$nonteaching_off_super_count,'nonteaching_nur_count'=>$nonteaching_nur_count,'nonteaching_recp_count'=>$nonteaching_recp_count,'nonteaching_lib_count'=>$nonteaching_lib_count,'nonteaching_lib_assis_count'=>$nonteaching_lib_assis_count,'nonteaching_lab_assist_count'=>$nonteaching_lab_assist_count,'pgt_comm_count'=>$pgt_comm_count,'pgt_his_count'=>$pgt_his_count);
		$this->load->view('admin/template',$array);	
	}

	public function exportcsv_teaching() {
		   
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='TEACHING'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='TEACHING' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "Teaching-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();
        $colnames[] = 'CATEGORY';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.' '.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }

    public function exportcsv_tgt_prt() {
		   
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT/PRT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT/PRT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'POST';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_pgt() {
		   
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'POST';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_nusery() {
		   
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='NURSERY'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='NURSERY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NURSERY-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'POST';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_pgt_eng() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='ENGLISH'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-ENGLISH-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_pgt_phy() {
           
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='PHYSICS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-PHYSICS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_pgt_chm() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='CHEMISTRY'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='CHEMISTRY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-CHEMISTRY-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_pgt_mth() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='MATHS'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

        $filename = "PGT-MATHS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_pgt_cse() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='COMPUTER_SCIENCE'");
           $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

        $filename = "PGT-COMPUTER-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }  

       public function exportcsv_pgt_phy_edu() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='COMPUTER_SCIENCE'");
           $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

        $filename = "PGT-COMPUTER-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }

      public function exportcsv_pgt_comm() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='COMPUTER_SCIENCE'");
           $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMMERCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

        $filename = "PGT-COMMERCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }

     public function exportcsv_pgt_his() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='COMPUTER_SCIENCE'");
           $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='HISTORY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();

        $filename = "PGT-HISTORY-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
         public function exportcsv_pgt_biology() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='BIOLOGY'");
          $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-BIOLOGY-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_pgt_bio_tech() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='BIO_TECHNOLOGY'");
          $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIO_TECHNOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-BIO-TECHNOLOGY-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }   
     public function exportcsv_pgt_acco() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='ACCOUNTS'");
       $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ACCOUNTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-ACCOUNTS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }  
       public function exportcsv_pgt_bsn_stud() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='BUSINESS_STUDIES'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BUSINESS_STUDIES' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-BUSINESS-STUDIES-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
      public function exportcsv_pgt_eco() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='PGT' AND pgt_teaching='ECONOMICS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ECONOMICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PGT-ECONOMICS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->pgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }  

        public function exportcsv_tgt_eng() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='ENGLISH'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-ENGLISH-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_tgt_hin() {
           
      //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='HINDI'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-HINDI-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
    //  public function exportcsv_tgt_sciI() {
           
    //   //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='HINDI'");
    //     $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.tgt_prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
    //     $filename = "TGT-SCIENCE-" . date('Ymd') . ".csv";
    //     header('Content-Type: text/csv');
    //     header('Content-Disposition: attachment;filename=' . $filename);
    //     $colnames = array();       
    //     $colnames[] = 'CATEGORY';
    //     $colnames[] = 'POST';
    //     $colnames[] = 'SUBJECT';
    //     $colnames[] = 'FORM NO';
    //     $colnames[] = 'NAME';
    //     $colnames[] = 'FATHER NAME';
    //     $colnames[] = 'EMAIL';
    //     $colnames[] = 'Contact';
    //     $colnames[] = 'DOB';       
    //     $out = fopen('php://output', 'w');
    //     fputcsv($out, $colnames);
    //     foreach ($records as $rec) {
    //         $recarr = array();           
    //         $recarr[] = $rec->teaching_cat;
    //         $recarr[] = $rec->teaching_post;
    //         $recarr[] = $rec->tgt_teaching;
    //         $recarr[] = $rec->form_no;
    //         $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
    //         $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
    //         $recarr[] = $rec->email;
    //         $recarr[] = $rec->mobile;
    //         $recarr[] = $rec->dob;            
    //         fputcsv($out, $recarr);
    //     }
    //     fclose($out);
    // } 
     public function exportcsv_tgt_mth() {
           
      //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='MATHS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-MATHS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_tgt_sanskrit() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='SANSKRIT'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGTT' AND application_form_zoned.tgt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-SANSKRIT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
      public function exportcsv_tgt_gen_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='GENERAL_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='GENERAL_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-GENERAL-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_tgt_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='GENERAL_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    
    public function exportcsv_tgt_scial_sci() {
      
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SOCIAL_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-SOCIAL-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
        public function exportcsv_tgt_cmp_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='COMPUTER_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='COMPUTER_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-COMPUTER-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_tgt_musics() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='MUSICS'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-MUSICS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
      public function exportcsv_tgt_fin_arts() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='FINE_ARTS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='FINE-ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-FINE-ARTS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_tgt_phy_edu() {
           
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='PHYSICAL_EDUCATION'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='PHYSICAL-EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "TGT-PHYSICAL-EDUCATION-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->tgt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }

    public function exportcsv_prt_eng() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='ENGLISH'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-ENGLISH-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_prt_hin() {
           
      //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='HINDI'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-HINDI-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
     public function exportcsv_prt_mth() {
           
      //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='MATHS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-MATHS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_prt_sanskrit() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='SANSKRIT'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-SANSKRIT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
      public function exportcsv_prt_gen_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='GENERAL_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='GENERAL_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-GENERAL-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_prt_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='GENERAL_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    
    public function exportcsv_prt_scial_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='SOCIAL_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SOCIAL_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-SOCIAL-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
        public function exportcsv_prt_cmp_sci() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='COMPUTER_SCIENCE'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='COMPUTER_SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-COMPUTER-SCIENCE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_prt_musics() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='MUSICS'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-MUSICS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
      public function exportcsv_prt_fin_arts() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='FINE_ARTS'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='FINE_ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-FINE-ARTS-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
     public function exportcsv_prt_phy_edu() {
           
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT' AND tgt_prt_teaching='PHYSICAL_EDUCATION'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "PRT-PHYSICAL-EDUCATION-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';
        $colnames[] = 'POST';
        $colnames[] = 'SUBJECT';
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;
            $recarr[] = $rec->teaching_post;
            $recarr[] = $rec->prt_teaching;
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
	
    public function exportcsv_non_teaching() {
           
      //  $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'");
      $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING'  and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON-TEACHING-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 

    public function exportcsv_non_teaching_ldc() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='LDC'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-LDC-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
        public function exportcsv_non_teaching_udc() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='UDC'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='UDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-UDC-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    public function exportcsv_non_teaching_assist() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='ASSISTANT'");
          $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-ASSISTANT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
       public function exportcsv_non_teaching_off_sup() {
           
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='OFFICE SUPERINTENDENT'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='OFFICE SUPERINTENDENT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-OFFICE-SUPERINTENDENT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    } 
    public function exportcsv_non_teaching_nurse() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='NURSE'");
          $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='NURSE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-NURSE-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
       public function exportcsv_non_teaching_recept() {
           
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='RECEPTIONIST'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='RECEPTIONIST' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-RECEPTIONIST-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }    
       public function exportcsv_non_teaching_librarian() {
           
     //   $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='LIBRARIAN'");
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARIAN' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-LIBRARIAN-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }

        public function exportcsv_non_teaching_lib_assist() {
           
       // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='LIBRARY ASSISTANT'");
           $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARY ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-LIBRARY_ASSISTANT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }  
     public function exportcsv_non_teaching_lab_assistant() {
           
        //$records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='NON-TEACHING'  AND non_teaching='LAB ASSISTANT'");
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LAB ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id ")->result();
        $filename = "NON/TEACHING-LAB_ASSISTANT-" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $colnames = array();       
        $colnames[] = 'CATEGORY';       
        $colnames[] = 'POST';       
        $colnames[] = 'FORM NO';
        $colnames[] = 'NAME';
        $colnames[] = 'FATHER NAME';
        $colnames[] = 'EMAIL';
        $colnames[] = 'Contact';
        $colnames[] = 'DOB';       
        $out = fopen('php://output', 'w');
        fputcsv($out, $colnames);
        foreach ($records as $rec) {
            $recarr = array();           
            $recarr[] = $rec->teaching_cat;           
            $recarr[] = $rec->non_teaching;           
            $recarr[] = $rec->form_no;
            $recarr[] = $rec->fname.' '.$rec->mname.' '.$rec->lname;
            $recarr[] = $rec->fathername.$rec->father_mname.' '.$rec->father_lname;
            $recarr[] = $rec->email;
            $recarr[] = $rec->mobile;
            $recarr[] = $rec->dob;            
            fputcsv($out, $recarr);
        }
        fclose($out);
    }
    

	public function total_user()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total User';	
		$register= $this->dbconnection->select("register_zoned","*","");
		$array = array('view'=>'total_user','page_title' => $page_title,'register' =>$register);
		$this->load->view('admin/template',$array);
	}

	public function add_form()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';	
		//$form_add= $this->dbconnection->select("application_form_zoned","*","");
			$form_add = $this->db->query("SELECT DISTINCT(application_form_zoned.form_no), application_form_zoned.fname,application_form_zoned.reg_id,application_form_zoned.sub_form_no, application_form_zoned.date_app,  application_form_zoned.date_app, application_form_zoned.dob, application_form_zoned.teaching_cat, application_form_zoned.teaching_post,application_form_zoned.non_teaching,application_form_zoned.pgt_teaching,application_form_zoned.tgt_teaching,application_form_zoned.prt_teaching,
application_form_zoned.non_teaching_subject,application_form_zoned.fathername,application_form_zoned.mothername,application_form_zoned.hus_wife_name,application_form_zoned.email,application_form_zoned.aadhar,application_form_zoned.gender,application_form_zoned.mobile,application_form_zoned.job_center,application_form_zoned.nation,application_form_zoned.religion,application_form_zoned.cat,application_form_zoned.tongue,application_form_zoned.marital,application_form_zoned.permanent_address,application_form_zoned.permanent_postoffice,application_form_zoned.permanent_state,application_form_zoned.permanent_district,application_form_zoned.permanent_city,application_form_zoned.permanent_pin,application_form_zoned.present_address,application_form_zoned.present_postoffice,application_form_zoned.present_state,application_form_zoned.present_district,application_form_zoned.present_city,application_form_zoned.present_pin,application_form_zoned.mat_year,application_form_zoned.mat_board,application_form_zoned.mat_division,application_form_zoned.mat_percentage,
application_form_zoned.mat_subject,application_form_zoned.inter_year,application_form_zoned.inter_board,application_form_zoned.inter_division,application_form_zoned.inter_percentage,application_form_zoned.inter_subject,application_form_zoned.grad_year,application_form_zoned.grad_board,application_form_zoned.grad_division,application_form_zoned.grad_percentage,application_form_zoned.grad_subject,application_form_zoned.post_grad_year,application_form_zoned.post_grad_board,application_form_zoned.post_grad_division,application_form_zoned.post_grad_percentage,application_form_zoned.post_grad_subject,application_form_zoned.bed_year,application_form_zoned.bed_board,application_form_zoned.bed_division,application_form_zoned.bed_percentage,application_form_zoned.bed_subject,application_form_zoned.ctet_year,application_form_zoned.ctet_board,application_form_zoned.ctet_division,application_form_zoned.ctet_percentage,application_form_zoned.ctet_subject,application_form_zoned.other_year,application_form_zoned.other_board,application_form_zoned.other_division,
application_form_zoned.other_percentage,application_form_zoned.other_subject,application_form_zoned.comp,application_form_zoned.present_emp,application_form_zoned.place_work,application_form_zoned.exp_name,application_form_zoned.exp_months,application_form_zoned.last_pay,application_form_zoned.ctc,application_form_zoned.uploads,application_form_zoned.date_created,application_form_zoned.ip,application_form_zoned.status,application_form_zoned.matric_marsheet_name,application_form_zoned.matric_final,application_form_zoned.bed_final,application_form_zoned.other_final_sec,application_form_zoned.job_center1,application_form_zoned.job_center2,application_form_zoned.experience_school,application_form_zoned.experience_school_place, adm_transaction_zoned.transaction_id from application_form_zoned INNER JOIN adm_transaction_zoned ON application_form_zoned.form_no = adm_transaction_zoned.form_no WHERE adm_transaction_zoned.paid_status='1' ")->result();
		$array = array('view'=>'add_form','page_title' => $page_title,'form_add' =>$form_add);

		$this->load->view('admin/template',$array);

		

	}
	public function pending_form()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';	
		//$form_add= $this->dbconnection->select("application_form_zoned","*","");
			$form_add = $this->db->query("SELECT DISTINCT(application_form_zoned.form_no), application_form_zoned.fname,application_form_zoned.reg_id,application_form_zoned.sub_form_no, application_form_zoned.date_app, application_form_zoned.date_app, application_form_zoned.dob, application_form_zoned.teaching_cat, application_form_zoned.teaching_post,application_form_zoned.non_teaching,application_form_zoned.pgt_teaching,application_form_zoned.tgt_prt_teaching,application_form_zoned.non_teaching_subject,application_form_zoned.fathername,application_form_zoned.mothername,application_form_zoned.hus_wife_name,
application_form_zoned.email,application_form_zoned.aadhar,application_form_zoned.gender,application_form_zoned.mobile,application_form_zoned.job_center,application_form_zoned.nation,application_form_zoned.religion,application_form_zoned.cat,application_form_zoned.tongue,application_form_zoned.marital,application_form_zoned.permanent_address,application_form_zoned.permanent_postoffice,application_form_zoned.permanent_state,application_form_zoned.permanent_district,application_form_zoned.permanent_city,application_form_zoned.permanent_pin,application_form_zoned.present_address,application_form_zoned.present_postoffice,application_form_zoned.present_state,application_form_zoned.present_district,application_form_zoned.present_city,application_form_zoned.present_pin,application_form_zoned.mat_year,application_form_zoned.mat_board,application_form_zoned.mat_division,application_form_zoned.mat_percentage,application_form_zoned.mat_subject,application_form_zoned.inter_year,application_form_zoned.inter_board,application_form_zoned.inter_division,application_form_zoned.inter_percentage,application_form_zoned.inter_subject,application_form_zoned.grad_year,application_form_zoned.grad_board,application_form_zoned.grad_division,application_form_zoned.grad_percentage,application_form_zoned.grad_subject,application_form_zoned.post_grad_year,application_form_zoned.post_grad_board,application_form_zoned.post_grad_division,application_form_zoned.post_grad_percentage,application_form_zoned.post_grad_subject,application_form_zoned.bed_year,application_form_zoned.bed_board,application_form_zoned.bed_division,application_form_zoned.bed_percentage,application_form_zoned.bed_subject,application_form_zoned.ctet_year,application_form_zoned.ctet_board,application_form_zoned.ctet_division,application_form_zoned.ctet_percentage,application_form_zoned.ctet_subject,application_form_zoned.other_year,application_form_zoned.other_board,application_form_zoned.other_division,
application_form_zoned.other_percentage,application_form_zoned.other_subject,application_form_zoned.comp,application_form_zoned.present_emp,application_form_zoned.place_work,application_form_zoned.exp_name,application_form_zoned.exp_months,application_form_zoned.last_pay,application_form_zoned.ctc,application_form_zoned.uploads,application_form_zoned.date_created,application_form_zoned.ip,application_form_zoned.status,application_form_zoned.application_status,application_form_zoned.matric_marsheet_name,application_form_zoned.matric_final,application_form_zoned.inter_final,application_form_zoned.graduate_final,application_form_zoned.post_graduate_final,application_form_zoned.bed_final,application_form_zoned.ctet_final,application_form_zoned.other_final, adm_transaction_zoned.transaction_id from application_form_zoned INNER JOIN adm_transaction_zoned ON application_form_zoned.form_no = adm_transaction_zoned.form_no WHERE adm_transaction_zoned.paid_status='1' and application_form_zoned.application_status='Pending'")->result();
		$array = array('view'=>'pending_form','page_title' => $page_title,'form_add' =>$form_add);

		$this->load->view('admin/template',$array);
		
	}
	public function rejected_form()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';	
		//$form_add= $this->dbconnection->select("application_form_zoned","*","");
			$form_add = $this->db->query("SELECT DISTINCT(application_form_zoned.form_no), application_form_zoned.fname,application_form_zoned.reg_id,
 application_form_zoned.date_app, application_form_zoned.date_app, application_form_zoned.dob, application_form_zoned.teaching_cat, application_form_zoned.teaching_post,application_form_zoned.non_teaching,application_form_zoned.pgt_teaching,application_form_zoned.tgt_prt_teaching,
application_form_zoned.non_teaching_subject,application_form_zoned.fathername,application_form_zoned.mothername,application_form_zoned.hus_wife_name,
application_form_zoned.email,application_form_zoned.aadhar,application_form_zoned.gender,application_form_zoned.mobile,application_form_zoned.job_center,
application_form_zoned.nation,application_form_zoned.religion,application_form_zoned.cat,application_form_zoned.tongue,application_form_zoned.marital,application_form_zoned.permanent_address,application_form_zoned.permanent_postoffice,application_form_zoned.permanent_state,application_form_zoned.permanent_district,application_form_zoned.permanent_city,application_form_zoned.permanent_pin,application_form_zoned.present_address,application_form_zoned.present_postoffice,application_form_zoned.present_state,application_form_zoned.present_district,application_form_zoned.present_city,application_form_zoned.present_pin,application_form_zoned.mat_year,application_form_zoned.mat_board,application_form_zoned.mat_division,application_form_zoned.mat_percentage,
application_form_zoned.mat_subject,application_form_zoned.inter_year,application_form_zoned.inter_board,application_form_zoned.inter_division,application_form_zoned.inter_percentage,application_form_zoned.inter_subject,application_form_zoned.grad_year,application_form_zoned.grad_board,application_form_zoned.grad_division,application_form_zoned.grad_percentage,application_form_zoned.grad_subject,application_form_zoned.post_grad_year,application_form_zoned.post_grad_board,application_form_zoned.post_grad_division,application_form_zoned.post_grad_percentage,application_form_zoned.post_grad_subject,
application_form_zoned.bed_year,application_form_zoned.bed_board,application_form_zoned.bed_division,application_form_zoned.bed_percentage,application_form_zoned.bed_subject,application_form_zoned.ctet_year,application_form_zoned.ctet_board,application_form_zoned.ctet_division,application_form_zoned.ctet_percentage,application_form_zoned.ctet_subject,application_form_zoned.other_year,application_form_zoned.other_board,application_form_zoned.other_division,
application_form_zoned.other_percentage,application_form_zoned.other_subject,application_form_zoned.comp,application_form_zoned.present_emp,application_form_zoned.place_work,application_form_zoned.exp_name,application_form_zoned.exp_months,application_form_zoned.last_pay,application_form_zoned.ctc,application_form_zoned.uploads,application_form_zoned.date_created,application_form_zoned.ip,application_form_zoned.status,application_form_zoned.application_status,application_form_zoned.matric_marsheet_name,application_form_zoned.matric_final,application_form_zoned.inter_final,application_form_zoned.graduate_final,application_form_zoned.post_graduate_final,application_form_zoned.bed_final,application_form_zoned.ctet_final,application_form_zoned.other_final,
 adm_transaction_zoned.transaction_id from application_form_zoned INNER JOIN adm_transaction_zoned ON application_form_zoned.form_no = adm_transaction_zoned.form_no WHERE adm_transaction_zoned.paid_status='1' and application_form_zoned.application_status='R'")->result();
		$array = array('view'=>'rejected_form','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template',$array);
	}

		public function retrive_form_data()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$id = $this->uri->segment(3);
		$page_title = 'Total application';	
		$form_data= $this->dbconnection->select("application_form_zoned","*",'reg_id='.$id);
		//print_r($form_data);
		$array = array('view'=>'retrive_form_data','page_title' => $page_title,'form_add' =>$form_data);
		$this->load->view('admin/template',$array);
		
	}

	public function total_transaction()
{
	if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'total_transaction';	
		$total_transaction= $this->dbconnection->select("adm_transaction_zoned","*","paid_status=1 ");
		$array = array('view'=>'total_transaction','page_title' => $page_title,'total_transaction' =>$total_transaction);
		$this->load->view('admin/template',$array);
	
}

function adminform_pdf(){
		
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

	 function adminadmit_pdf(){
		
		$id = $this->uri->segment(2);
		$row=$this->dbconnection->select('application_form_zoned','*','reg_id='.$id);	
		$job_CC = $row[0]->job_center;
		$job_c = unserialize($job_CC);
		$array = array('data'=>$row,'job_c' => $job_c);
		//$array = array('data'=>$row);
		$this->load->view('user/admit_card_pdf',$array);
		$html = $this->output->get_output();
		// Load library
		$this->load->library('pdf');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("admit_card.pdf");
	 }
	 	 function adminpaymentslip_pdf(){
		
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

        function mypdfteach()
        {
       	$category=$this->uri->segment(3);       		
        // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_cat='TEACHING'","","","","300","");
        $records = $this->db->query("SELECT application_form_zoned.teaching_cat,application_form_zoned.sub_form_no,application_form_zoned.form_no,application_form_zoned.fname,application_form_zoned.sub_form_no,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$category);
        $this->load->view('admin/mypdf',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
         $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("$category.pdf");
   }

   function mypdfteach_tgt_prt()
   {
   		$postt=$this->uri->segment(3);
   		$post='TGT/PRT';
   		 $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='$post' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
         // $records = $this->dbconnection->select("application_form_zoned", "*", "teaching_post='TGT/PRT'","","","","20","");
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$post);
        $this->load->view('admin/mypdf_post',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
         $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$post.pdf");
   }

   function mypdfteach_post()
   {
   		$post=$this->uri->segment(3);
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='$post' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$post);
        $this->load->view('admin/mypdf_post',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$post.pdf");
   }

   function mypdfteach_nursery()
   {

        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='NURSERY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records);
        $this->load->view('admin/mypdf_nursery',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("NURSERY.pdf");
   }

   function mypdfteach_pgt_sub()
   {
   		$subject=$this->uri->segment('3');   		
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');
        $array = array('records'=>$records,'page_title'=>$subject);
        $this->load->view('admin/mypdf_pgt_sub',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$subject.pdf");
   } 

    function mypdfteach_prt_sub()
   {
   		$subject=$this->uri->segment('3');   		
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');
        $array = array('records'=>$records,'page_title'=>$subject);
        $this->load->view('admin/mypdf_tgt_prt_sub',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$subject.pdf");
   }
    

    function mypdfteach_tgt_sub()
   {
   		$subject=$this->uri->segment('3');   		
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');
        $array = array('records'=>$records,'page_title'=>$subject);
        $this->load->view('admin/mypdf_tgt_prt_sub',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$subject.pdf");
   }
   
    
    function mypdfteach_nonteach_post()
   {
   		$category=$this->uri->segment(3);
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$category);
        $this->load->view('admin/mypdf_nonteach',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$category.pdf");
   }



  

    function mypdfteach_nonteach_ofc()
   {
   		$category='OFFICE SUPERINTENDENT';
       $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$category);
        $this->load->view('admin/mypdf_nonteach',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$category.pdf");
   }
    

   function mypdfteach_nonteach_libass()
   {

   	$category='LIBRARY ASSISTANT';
        $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$category);
        $this->load->view('admin/mypdf_nonteach',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$category.pdf");
   }

   function mypdfteach_nonteach_labass()
   {
   		$category='LIBRARY ASSISTANT';
         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();
        $this->load->library('pdf');

        $array = array('records'=>$records,'page_title'=>$category);
        $this->load->view('admin/mypdf_nonteach',$array);
        $html = $this->output->get_output();

        $this->dompdf->load_html($html);
         $this->dompdf->set_paper('a4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("$category.pdf");
   }

public function app_status_update()
{
	 $getvalue=$this->input->post('getvalue');	
	 $getreg=$this->input->post('getreg');
	 $data=array(
	 	'application_status'=>$getvalue,
	 );
	 $row=$this->dbconnection->update('application_form_zoned',$data,"reg_id='$getreg'");
	 $this->session->set_flashdata('update','update Successfully.');
	 redirect('admin/pending_form');

}

   
	

}

