<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/menubar');
if(isset($view))
    {
		
        $this->load->view('admin/'.$view);
    } 
$this->load->view('admin/include/footer');
?>

