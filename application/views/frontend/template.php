<?php 
$this->load->view('frontend/include/header');
// $this->load->view('frontend/include/menubar');
if(isset($view))
    {
		
        $this->load->view('frontend/'.$view);
    } 
$this->load->view('frontend/include/footer');
?>

