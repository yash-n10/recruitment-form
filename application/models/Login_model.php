<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model{

	public function MatchUsername($data)
	{
		$this->db->select('*');
		$this->db->from('register_zoned');
		$this->db->where($data);
		$query = $this->db->get();
		$row =  $query->result_array();
		return $row;	
	}	
}
?>