<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{		
		$state= $this->dbconnection->select("state","*","");		
		$array = array('view'=>'login','state' =>$state);
		$this->load->view('frontend/template',$array);
	}
	public function register()
	{		
		$state= $this->dbconnection->select("state","*","");
		$array = array('view'=>'register','state' =>$state);
		$this->load->view('frontend/template',$array);
	}

	public function get_district()
	{		
		$id = $this->input->post('state_id');
		$get = $this->dbconnection->select('district','*',"StCode=$id");
		?><option value="">Select</option><?php			
		foreach ($get as $key => $value) {
			?>
				<option value="<?php echo $value->DistrictName;?>"><?php echo $value->DistrictName;?></option>
			<?php	
		}	
	}
	public function forget()
	{		
		$array = array('view'=>'forget');		
		$this->load->view('frontend/template',$array);
	}

	public function login_user()
	{
		
		$adhar= $this->input->post('adhar');
		$password= md5($this->input->post('password'));
		$data=array(
				'adhar'=>$adhar,
				'password'=>$password,
			);
		
		$row = $this->Login_model->MatchUsername($data);

		if($row)
    	{
    		foreach($row as $userdata){}

    		if(($password)==$userdata['password'])
    		{

    			$id = $userdata['id'];
    			$contact = $userdata['contact'];
    			$name = $userdata['name'];
    			$email = $userdata['email'];
    			$adhar = $userdata['adhar'];    			
    			$created = $userdata['created_by'];
    			$role = $userdata['created_by'];
    			$this->session->set_userdata(array(
							'uid' 			=> 	$id,
							'contact'		=>	$contact,
							'email'			=>	$email,
							'name'			=>	$name,							
							'adhar'	    	=>	$adhar,							
							'loginstatus'	=> 	'1',
							'created_by'	=> 	$created,
							'created_by'	=> 	$role,
							
				));	
				if($role=='Admin')
				{			
					// redirect('admin/dashboard','refresh');
    			}
				else if($role=='User')
				{	
				
				redirect('user/dashboard','refresh');
    			}
    			else {
    				
    				redirect('','refresh');
    			}
    			
    		}
    		
		}
		else
    	{
    		
			$this->session->set_flashdata('unnotmatch','Login Details Is Wrong');
			redirect('login', 'refresh');

    	}
	}
    		

	public function logout()
	{
		$this->session->unset_userdata('uid');	
		$this->session->unset_userdata('email');	
		$this->session->unset_userdata('contact');	
		$this->session->unset_userdata('adhar');	
		$this->session->unset_userdata('name');	
		$this->session->unset_userdata('loginstatus');	
		$this->session->unset_userdata('created_by');
		$this->session->set_flashdata('logout','Logout Successfully');
		redirect('','refresh');
	}

	public function user_register()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');		
		$password=$this->input->post('contact');
		$adhar=$this->input->post('adhar');
		$data = array(
			'name'      => $name,		
			'email'     => $email,
			'contact'   => $contact,		
			'password'  => md5($password),
			'info_pass' => $password,
			'adhar'  	=> $adhar,
			'created_by'=>'User',
			'created_ip'=>$_SERVER['REMOTE_ADDR'],
			'status'    =>'Y',
			);

		$this->dbconnection->insert('register_zoned',$data);
		$this->session->set_flashdata('register',$name.' Successfully Registerd');
		redirect('login', 'refresh');
	}


	public function adminuser()
	{
		$username= $this->input->post('username');
		$password= md5($this->input->post('password'));
		$data=array(
				'username'=>$username,
				'password'=>$password,
			);

		$row = $this->Admin_model->MatchUsername($data);
		if($row)
    	{
    		foreach($row as $userdata){}
    		if(($password)==$userdata['password'])
    		{

    			$id = $userdata['id'];    			
    			$username = $userdata['username'];
    			$password = $userdata['password'];    			
    			$created = $userdata['created_by'];    			
    			$this->session->set_userdata(array(
							'uid' 			=> 	$id,							
							'username'		=>	$username,
							'password'		=>	$password,							
							'loginstatus'	=> 	'1',
							'created_by'	=> 	$created,
				));	
				
				if($created=='Admin')
				{			
					redirect('admin/admin_page','refresh');
    			}
    			else {
    				redirect('','refresh');
    			}
    			
    		}
    		else
    		{
    			$this->session->set_flashdata('pwdnotmatch','Password Is Not Correct');
				$page_title = 'Login';
				$array = array('page_title' => $page_title);
				 $this->load->view('admin/login',$array);
    		}
		}
		else
    	{
    		$this->session->set_flashdata('unnotmatch','Username Is Wrong');
			$page_title = 'Login';
			$array = array('page_title' => $page_title);
			 $this->load->view('admin/login',$array);

    	}
	}

	public function adminlogout()
	{
		$this->session->unset_userdata('uid');	
		$this->session->unset_userdata('username');	
		$this->session->unset_userdata('password');	
		$this->session->unset_userdata('loginstatus');	
		$this->session->unset_userdata('created_by');
		$this->session->set_flashdata('logout','Logout Successfully');
		redirect('admin','refresh');
	}
	public function chkmail()
		{
			$email=$this->input->post('email');
			$data= array(
				'email' =>$email , 
			);	
			$counts = $this->dbconnection->count('register_zoned',$data);
			echo $counts;
		}
	public function chkadhar()
		{
			$adhar=$this->input->post('adhar');
			$data= array(
				'adhar' =>$adhar , 
			);			
			$counts = $this->dbconnection->count('register_zoned',$data);
			echo $counts;
		}

		public function sendmail()
		{
			$email=$this->input->post('email');
			$rand=rand(100000,999999);
		    
		    $data = array(
			'otp' => $rand,			
			);

			//print_r($data);
			$this->dbconnection->update('register_zoned',$data,"email='$email'");
			$to =$email ;
			$subject = "Forget password";

			$message = "
			<html>
			<head>
			<title>Dav Application Form</title>
			</head>
			<body>
			<p>$rand is your one time password (OTP) for DAV Public School account.<u>Feesclub</u></p>
			
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: info@mildtrix.com' . "\r\n";
        	$headers .= 'bcc: akm9135@gmail.com' . "\r\n";

			mail($to,$subject,$message,$headers);
			echo 1;
			// echo "mesg send";
		}
		public function otpchk()
		{
		    $eemail=$this->input->post('eemail');
		    $cotp=$this->input->post('cotp');
			$data= array(
				'otp' =>$cotp ,
				'email'=>$eemail,
			);
			$counts = $this->dbconnection->count('register_zoned',$data,"email='$eemail'");
			echo $counts;
		}
		public function updatepass()
		{
		        $eemail=$this->input->post('eemail');
		    	$password= $this->input->post('password');
        		$data=array(
        				'password'=>md5($password),
        				'info_pass'=>$password,
        				'email'=>$eemail,
		    	);
		    	 $this->dbconnection->update('register_zoned',$data,"email='$eemail'");
                $this->session->set_flashdata('updatepass','Password successfully updated');
                echo 1;
        		redirect('login', 'refresh');
		}
		
}
