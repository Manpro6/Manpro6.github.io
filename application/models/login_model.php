<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class login_model extends CI_Model
	{

		public function __construct()
  	{
      $this->load->database();
  	}

  	public function search()
  	{
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $password2 = md5($password);
    	$this->db->Where('username', $username);
      $this->db->Where('password', md5($password));
      $query = $this->db->get('admin');
      if($query->num_rows == 1)
      {
        return true;
      }
  	}
  }
?>