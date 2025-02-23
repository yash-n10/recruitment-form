<?php 
$this->load->view('frontend/include/header_website');
// $this->load->view('frontend/include/menubar');
if(isset($view))
    {
		
        $this->load->view('frontend/'.$view);
    } 
$this->load->view('frontend/include/footer_website');
?>

