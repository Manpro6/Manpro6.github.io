<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class Krisan extends CI_Model
	{
  		public function __construct()
  		{
    		$this->load->database();
  		}
  		
  		public function input()
	  	{
	      	$nama = $this->input->post('nama');
	      	$pesan = $this->input->post('pesan');
	    	$insert_kritik = array(
	        'nama' => $nama,
	        'pesan' => $pesan,
	        'tanggal' => date('Y-m-d'));
	        $this->db->insert('kritik', $insert_kritik);

	  	}
  	}
 ?>