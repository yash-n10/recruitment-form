<?php 
$this->load->view('user/include/header');
$this->load->view('user/include/menubar');
if(isset($view))
    {
		
        $this->load->view('user/'.$view);
    } 
$this->load->view('user/include/footer');
?>

