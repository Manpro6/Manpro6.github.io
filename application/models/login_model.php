<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model
	{

		public function __construct()
  	{
      $this->load->database();
  	}

  	public function search()
  	{
      $username = $this->input->post('username');
      $password = $this->input->post('password');
    	$query = $this->db->query("SELECT * FROM `admin` WHERE username='$username' AND password='$password'");
    	$cek = $query->result_array();
      if($cek == null)
      {
        return false;
      }
      else
      {
        return true;
      }
  	}
  }
?>