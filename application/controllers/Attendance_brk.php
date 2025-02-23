<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_brk extends CI_Controller {

	public function __construct()

	{		

		parent::__construct();		

		error_reporting(0);

		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)

		{

			@set_time_limit(0);

		}

	}

	

	public function dashboard()

	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {

			redirect('login', 'refresh');

		}

		$page_title = 'Dashboard';

		$registercount = $this->db->query("SELECT COUNT(*) cnt FROM register_zoned")->result();

		$query = $this->db->query("SELECT COUNT(*) cnt FROM application_form_zoned")->result();

	
		
		$paymentquery = $this->db->query("SELECT Sum(adm.total_amount) ,app.reg_id,adm.registered_id FROM adm_transaction_zoned adm,application_form_zoned app where adm.paid_status='1' AND adm.status='Y' and adm.registered_id=app.reg_id and  app.job_center1!='KARANPURA TANDWA'")->result();

		

		$paymentapplication = $this->db->query("SELECT count(Distinct adm.id) cnt,app.reg_id,adm.registered_id FROM adm_transaction_zoned adm,application_form_zoned app where adm.paid_status='1' AND adm.status='Y' and adm.response_message='Success' and adm.registered_id=app.reg_id and  app.job_center1!='KARANPURA TANDWA'")->result();



		$teachingcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='TEACHING' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$teachingTGTcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$teachingPRTcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$teachingPGTcount =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$teachingNurserycount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='NURSERY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$pgt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_phy_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$pgt_chm_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='CHEMISTRY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$pgt_mth_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_comm_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMMERCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_cse_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$pgt_bio_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_his_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='HISTORY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_biotech_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BIO-TECHNOLOGY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_acc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ACCOUNTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_bus_stu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='BUSINESS-STUDIES' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_eco_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='ECONOMICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$pgt_phy_edu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		

		$tgt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$tgt_hin_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$tgt_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		

		$tgt_mat_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$tgt_sans_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();		



		$tgt_gensci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='GENERAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$tgt_socsci_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='SOCIAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		

		$tgt_comp_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		

		$tgt_mus_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$tgt_finearts_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='FINE-ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$tgt_phyedu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



//prt



		$prt_eng_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='ENGLISH' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$prt_hin_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='HINDI' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		

		$prt_mat_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MATHS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();







		$prt_sans_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SANSKRIT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		



		$prt_gensci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		

		$prt_socsci_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='SOCIAL-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		

		$prt_comp_sci_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='COMPUTER-SCIENCE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();







		

		$prt_mus_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='MUSICS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();







		$prt_finearts_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='FINE-ARTS' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$prt_phyedu_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='PHYSICAL_EDUCATION' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		// $nonteachingcount = $this->db->query("SELECT COUNT(*) cnt FROM application_form_zoned where teaching_cat='NON-TEACHING'")->result();

		$nonteachingcount = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING'and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_ldc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_udc_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='UDC' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_assis_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_off_super_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='OFFICE SUPERINTENDENT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_nur_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='NURSE' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_recp_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='RECEPTIONIST' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_lib_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARIAN' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$nonteaching_lib_assis_count =$this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LIBRARY ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();





		$nonteaching_lab_assist_count = $this->db->query("SELECT COUNT(application_form_zoned.form_no) cnt FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='LAB-ASSISTANT' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		







		//print_r($sub);

		$array = array('view'=>'brk_dashboard_attendance','page_title' => $page_title,'queryy'=>$query,'registercount'=>$registercount,'paymentquery'=>$paymentquery,'paymentapplication'=>$paymentapplication,'teachingcount'=>$teachingcount,'teachingTGTcount'=>$teachingTGTcount,'teachingPRTcount'=>$teachingPRTcount,'teachingPGTcount'=>$teachingPGTcount,'teachingNurserycount'=>$teachingNurserycount,



			'pgt_eng_count'=>$pgt_eng_count,'pgt_phy_count'=>$pgt_phy_count,'pgt_chm_count'=>$pgt_chm_count,'pgt_mth_count'=>$pgt_mth_count,'pgt_cse_count'=>$pgt_cse_count,'pgt_bio_count'=>$pgt_bio_count,'pgt_biotech_count'=>$pgt_biotech_count,'pgt_acc_count'=>$pgt_acc_count,'pgt_bus_stu_count'=>$pgt_bus_stu_count,'pgt_eco_count'=>$pgt_eco_count,'pgt_phy_edu_count'=>$pgt_phy_edu_count,



			'tgt_eng_count'=>$tgt_eng_count,'tgt_hin_count'=>$tgt_hin_count,'tgt_mat_count'=>$tgt_mat_count,'tgt_sans_count'=>$tgt_sans_count,'tgt_gensci_count'=>$tgt_gensci_count,'tgt_sci_count'=>$tgt_sci_count,'tgt_socsci_count'=>$tgt_socsci_count,'tgt_comp_sci_count'=>$tgt_comp_sci_count,'tgt_mus_count'=>$tgt_mus_count,'tgt_finearts_count'=>$tgt_finearts_count,'tgt_phyedu_count'=>$tgt_phyedu_count,



			'prt_eng_count'=>$prt_eng_count,'prt_hin_count'=>$prt_hin_count,'prt_mat_count'=>$prt_mat_count,'prt_sans_count'=>$prt_sans_count,'prt_gensci_count'=>$prt_gensci_count,'prt_sci_count'=>$prt_sci_count,'prt_socsci_count'=>$prt_socsci_count,'prt_comp_sci_count'=>$prt_comp_sci_count,'prt_mus_count'=>$prt_mus_count,'prt_finearts_count'=>$prt_finearts_count,'prt_phyedu_count'=>$prt_phyedu_count,





			'nonteachingcount'=>$nonteachingcount,'nonteaching_ldc_count'=>$nonteaching_ldc_count,'nonteaching_udc_count'=>$nonteaching_udc_count,'nonteaching_assis_count'=>$nonteaching_assis_count,'nonteaching_off_super_count'=>$nonteaching_off_super_count,'nonteaching_nur_count'=>$nonteaching_nur_count,'nonteaching_recp_count'=>$nonteaching_recp_count,'nonteaching_lib_count'=>$nonteaching_lib_count,'nonteaching_lib_assis_count'=>$nonteaching_lib_assis_count,'nonteaching_lab_assist_count'=>$nonteaching_lab_assist_count,'pgt_comm_count'=>$pgt_comm_count,'pgt_his_count'=>$pgt_his_count);

		$this->load->view('admin/template',$array);	

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

	

	

	



	public function total_transaction()

	{

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {

			redirect('login', 'refresh');

		}

		$page_title = 'total_transaction';	

		$total_transaction= $this->dbconnection->select("adm_transaction_zoned","*","status='Y' ");

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

		$records = $this->db->query("SELECT application_form_zoned.teaching_cat,application_form_zoned.sub_form_no,application_form_zoned.form_no,application_form_zoned.fname,application_form_zoned.sub_form_no,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();



		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$category);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS  </center>

			<center> JHARKHAND ZONE - D </center>

		 <center style="text-transform:uppercase">VENUE- D.A.V. PUBLIC SCHOOL, HAZARIBAG</center>

			</div>



			<div>			

			<center style="text-align:left;"><b>POST : </b> NURSERY</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="" style="margin-top:-52px; width:50%; font-size:12px!important;text-align:left; float:left">

	<c style="float:left">Invigilator1</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

	</div>

	<div class="" style="width:50%;font-size:12px!important;text-align:left;float:left">

	<c style="float:left">Invigilator2</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

</div>



<div class="footer">

    	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

    	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

52,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	}



	function mypdfteach_tgt_prt()

	{

		$postt=$this->uri->segment(3);

		$post='TGT/PRT';

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='$post' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

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

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='$post' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('pdf');



		$array = array('records'=>$records,'page_title'=>$post);

		$this->load->view('admin/mypdf_post',$array);

		$html = $this->output->get_output();



		$this->dompdf->load_html($html);

		$this->dompdf->set_paper('a4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream("$post.pdf");

	}





	function mypdfteach_post_sheet()

	{

		$post=$this->uri->segment(3);

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='$post' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS  </center>

			<center> JHARKHAND ZONE - D </center>

		 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>			

			<center style="text-align:left;"><b>POST : </b>EEDP</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="" style="margin-top:-52px; width:50%; font-size:12px!important;text-align:left; float:left">

	<c style="float:left">Invigilator1</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

	</div>

	<div class="" style="width:50%;font-size:12px!important;text-align:left;float:left">

	<c style="float:left">Invigilator2</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

</div>



<div class="footer">

    	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

    	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

52,//maargin top5

42,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_post_sheet',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	}







	function mypdfteach_nursery()

	{



		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='NURSERY' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

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

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('pdf');

		$array = array('records'=>$records,'page_title'=>$subject);

		$this->load->view('admin/mypdf_pgt_sub',$array);

		$html = $this->output->get_output();



		$this->dompdf->load_html($html);

		$this->dompdf->set_paper('a4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream("$subject.pdf");

	} 

	function mypdfteach_pgt_sub_room()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and  application_form_zoned.job_center1!='KARANPURA TANDWA' and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS  </center>

			<center> JHARKHAND ZONE - D </center>

			</div>



			<div>

			<center style="text-align:left"><u><b>ROOM NO :</b><u></center>

			<center style="text-align:left;"><b>POST : </b> PGT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="footer">

			<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

			<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('P','','','','',

14,//margin_left

16,//margin right

46,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_pgt_sub_room',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 

	function mypdfteach_pgt_sub_sheet()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.pgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PGT' AND application_form_zoned.pgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA' ORDER BY application_form_zoned.sub_form_no+0")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS  </center>

			<center> JHARKHAND ZONE - D </center>

		 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>			

			<center style="text-align:left;"><b>POST : </b> PGT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="" style="margin-top:-52px; width:50%; font-size:12px!important;text-align:left; float:left">

	<c style="float:left">Invigilator1</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

	</div>

	<div class="" style="width:50%;font-size:12px!important;text-align:left;float:left">

	<c style="float:left">Invigilator2</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

</div>



<div class="footer">

    	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

    	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

52,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_pgt_sub_sheet',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 

	function mypdfteach_prt_sub()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('pdf');

		$array = array('records'=>$records,'page_title'=>$subject);

		$this->load->view('admin/mypdf_tgt_prt_sub',$array);

		$html = $this->output->get_output();



		$this->dompdf->load_html($html);

		$this->dompdf->set_paper('a4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream("$subject.pdf");

	}



	function mypdfteach_prt_sub_room()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>		

			<center> JHARKHAND ZONE - D </center>

			 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>

			<center style="text-align:left"><u><b>ROOM NO :</b><u></center>

			<center style="text-align:left;"><b>POST : </b> PRT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="footer">

			<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

			<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('P','','','','',

14,//margin_left

16,//margin right

46,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_tgt_prt_sub_room',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 



		function mypdfteach_prt_sub_sheet()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.prt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='PRT' AND application_form_zoned.prt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and  application_form_zoned.job_center1!='KARANPURA TANDWA' and  adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>		

			<center> JHARKHAND ZONE - D </center>

			 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>

			

			<center style="text-align:left;"><b>POST : </b> PRT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="footer">

			<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

			<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

52,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_tgt_prt_sub_sheet',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 



	function mypdfteach_tgt_sub()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('pdf');

		$array = array('records'=>$records,'page_title'=>$subject);

		$this->load->view('admin/mypdf_tgt_prt_sub',$array);

		$html = $this->output->get_output();



		$this->dompdf->load_html($html);

		$this->dompdf->set_paper('a4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream("$subject.pdf");

	}



	function mypdfteach_tgt_sub_room()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='$subject' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>



			<center> JHARKHAND ZONE - D </center>

			</div>



			<div>

			<center style="text-align:left"><u><b>ROOM NO :</b><u></center>

			<center style="text-align:left;"><b>POST : </b> TGT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 23-02-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="footer">

			<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

			<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

46,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_tgt_prt_sub_room',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	}

	 function mypdfteach_tgt_sub_sheet()

	{

		$subject=$this->uri->segment('3');   		

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.tgt_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_post='TGT' AND application_form_zoned.tgt_teaching='$subject' and  application_form_zoned.job_center1!='KARANPURA TANDWA' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();

		$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>



			<center> JHARKHAND ZONE - D </center>

			 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>

			

			<center style="text-align:left;"><b>POST : </b> TGT</center>

			<center style="text-align:left;"><b>SUBJECT : </b>'.$subject.'</center>

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="" style="margin-top:-52px; width:50%; font-size:12px!important;text-align:left; float:left">

	<c style="float:left">Invigilator1</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

	</div>

	<div class="" style="width:50%;font-size:12px!important;text-align:left;float:left">

	<c style="float:left">Invigilator2</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

</div>



<div class="footer">

    	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

    	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

46,//maargin top5

42,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_tgt_prt_sub_sheet',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 





	function mypdfteach_nonteach_post()

	{

		$category=$this->uri->segment(3);

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

		$this->load->library('pdf');



		$array = array('records'=>$records,'page_title'=>$category);

		$this->load->view('admin/mypdf_nonteach',$array);

		$html = $this->output->get_output();



		$this->dompdf->load_html($html);

		$this->dompdf->set_paper('a4', 'landscape');

		$this->dompdf->render();

		$this->dompdf->stream("$category.pdf");

	}



//     function mypdfteach_nonteach_post_room()

//    {

//    		$category=$this->uri->segment('3');   		

//         $records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id")->result();

//         $this->load->library('M_pdf');

//         $array = array('records'=>$records,'page_title'=>$subject);



//     	$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

// 		<center><img src="assets/images/LOGO.png" style="width:8%"></center>

// 		<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>



// 		<center> JHARKHAND ZONE - D </center>

// 	</div>

	

// <div>

// 	<center style="text-align:left"><u><b>ROOM NO :</b><u></center>

// 	<center style="text-align:left;"><b>POST : </b> category</center>

// </div>



// <div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

//       Date : 16-02-2020 <br><br>

// </div> ');

//     	$this->m_pdf->pdf->SetFooter('<div class="footer">

//     	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

//     	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



//         $this->m_pdf->pdf->AddPage('P','','','','',

// 14,//margin_left

// 16,//margin right

// 46,//maargin top5

// 62,//margin bootm

// 5,

// 3 );



//         $html=$this->load->view('admin/mypdf_tgt_prt_sub_room',$array,true);

//         $this->m_pdf->pdf->WriteHtml($html);

//         $this->m_pdf->pdf->Output();

//    }

  







function mypdfteach_nonteach_post_sheet()

	{

		$category=$this->uri->segment(3);

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob,application_form_zoned.uploads,application_form_zoned.other_final_sec FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id  and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

	$this->load->library('M_pdf');

		$array = array('records'=>$records,'page_title'=>$subject);



		$this->m_pdf->pdf->SetHeader('<div style="text-align:center;margin-top:56px!important;">

			<center><img src="assets/images/LOGO.png" style="width:8%"></center>

			<center style="margin-top:10px;">D.A.V PUBLIC SCHOOLS </center>



			<center> JHARKHAND ZONE - D </center>

			 <center style="text-transform:uppercase">VENUE- Agrasen D.A.V. PUBLIC SCHOOL, Bharechnagar</center>

			</div>



			<div>

			

			<center style="text-align:left;"><b>POST : </b> '.$category.'</center>

			

			</div>



			<div id="company" class="clearfix pull-right" style="margin-top:-40px!important;">

			Date : 01-03-2020 <br><br>

			</div> ');

		$this->m_pdf->pdf->SetFooter('<div class="" style="margin-top:-52px; width:50%; font-size:12px!important;text-align:left; float:left">

	<c style="float:left">Invigilator1</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

	</div>

	<div class="" style="width:50%;font-size:12px!important;text-align:left;float:left">

	<c style="float:left">Invigilator2</c><br>

	<c style="text-align:left">Name </c><br>

	<c style="text-align:left">Signature</c>

</div>



<div class="footer">

    	<c style="float:left">powered by <b style="color:#ff4410">FEESCLUB</b></c>

    	<c style="text-align:right;float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page No.:<b>{PAGENO}/{nbpg}</b></c></div>');



		$this->m_pdf->pdf->AddPage('L','','','','',

14,//margin_left

16,//margin right

46,//maargin top5

62,//margin bootm

5,

3 );



		$html=$this->load->view('admin/mypdf_nonteach_sheet',$array,true);

		$this->m_pdf->pdf->WriteHtml($html);

		$this->m_pdf->pdf->Output();

	} 

	function mypdfteach_nonteach_ofc()

	{

		$category='OFFICE SUPERINTENDENT';

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

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

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

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

		$records = $this->db->query("SELECT application_form_zoned.teaching_post,application_form_zoned.teaching_cat,application_form_zoned.form_no,application_form_zoned.sub_form_no,application_form_zoned.non_teaching,application_form_zoned.fname,application_form_zoned.mname,application_form_zoned.lname,application_form_zoned.fathername,application_form_zoned.father_mname,application_form_zoned.father_lname,application_form_zoned.email,application_form_zoned.mobile,application_form_zoned.dob FROM application_form_zoned,adm_transaction_zoned where application_form_zoned.teaching_cat='NON-TEACHING' AND application_form_zoned.non_teaching='$category' and adm_transaction_zoned.paid_status=1 and adm_transaction_zoned.registered_id=application_form_zoned.reg_id and  application_form_zoned.job_center1!='KARANPURA TANDWA'")->result();

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



