<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class krisan_model extends CI_Model
	{
  		public function __construct()
  		{
    		$this->load->database();
  		}

  		public function getKrisan()
	    {
	      $query = $this->db->query("SELECT * FROM `kritik` ORDER BY tanggal desc");
	      return $query->result_array();
	    }

	    public function user_limit($limit, $start = 0)
	    {    	
	    	$this->db->select('*');
        	$this->db->from('kritik');
	        $this->db->order_by('tanggal', 'DESC'); 
	        $this->db->limit($limit, $start);       
	        return $this->db->get()->result_array();
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

	  	public function detail($id_kritik)
	  	{
	  		$query = $this->db->query("SELECT * FROM `kritik` WHERE id_kritik = '$id_kritik'");
	        $hasil = $query->row_array();
	        return $hasil;
	  	}

	  	public function delete($id_kritik)
	  	{
	  		$this->db->where('id_kritik', $id_kritik);
          	$this->db->delete('kritik');
	  	}

	  	public function tot_num_rows()
	  	{
	  		return $this->db->get('kritik')->num_rows();
	  	}
  	}
 ?>