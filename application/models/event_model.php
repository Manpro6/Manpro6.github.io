<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class event_model extends CI_Model
{
  	public function __construct()
  	{
    	$this->load->database();
  	}

    public function insertEvent()
    {
      $insert_event = array(
      'title' => $this->input->post('title'),
      'pengajar' => $this->input->post('pengajar'),
      'deskripsi' => $this->input->post('deskripsi'),
      'color' => $this->input->post('color'),
      'start' => $this->input->post('start'),                   
      'end' => $this->input->post('end'));
      $this->db->insert('events', $insert_event);
    }
}
?>
