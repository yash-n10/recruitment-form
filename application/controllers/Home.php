<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(E_ALL & ~E_NOTICE);
	}


	public function index()
	{			
		
		$page_title = 'Home';		
	 	$array = array('view'=>'home_content','page_title' => $page_title);
	 	$this->load->view('frontend/template_website',$array);

	}
	public function instruction()
	{	
		
		
		$page_title = 'Instruction';		
	 	$array = array('view'=>'instruction','page_title' => $page_title);
	 	$this->load->view('frontend/template_website',$array);
	 	
	}

		public function instructionold()
	{	
		
		
		$page_title = 'Instruction';		
	 	$array = array('view'=>'instructionold','page_title' => $page_title);
	 	$this->load->view('frontend/template_website',$array);
	 	
	}

	
}
