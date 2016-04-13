<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class krisan_model extends CI_Model
	{
  		public function __construct()
  		{
    		$this->load->database();
  		}
  		
  		public function input()
	  	{
	    	$insert_kritik = array(
	    	'email' => $this->input->post('email'),
	        'nama' => $this->input->post('nama'),
	        'pesan' => $this->input->post('pesan'),
	        'tanggal' => date("Y-m-d H:i:s", strtotime('+5 hours')));
	        $this->db->insert('kritik', $insert_kritik);

	  	}
  	}
 ?>