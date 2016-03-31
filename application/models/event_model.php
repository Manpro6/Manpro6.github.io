<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class event_model extends CI_Model
{
  	public function __construct()
  	{
    	$this->load->database();
  	}

    public function insertEvent()
    {
      $start = $this->input->post('start');
      $end = $this->input->post('end');
      if($start >= $end)
      {
        redirect('event?msg=1');
      }
      else
      {
         $insert_event = array(
        'title' => $this->input->post('title'),
        'pengajar' => $this->input->post('pengajar'),
        'deskripsi' => $this->input->post('deskripsi'),
        'color' => $this->input->post('color'),
        'start' => $start,               
        'end' => $end);
        $this->db->insert('events', $insert_event);
        redirect('event?msg=2');
      }
    }

    public function updateEvent()
    {
      $cek = $this->input->post('delete');
      if($cek == null)
      {
        $update_event = array(
        'title' => $this->input->post('title'),
        'pengajar' => $this->input->post('pengajar'),
        'deskripsi' => $this->input->post('deskripsi'),
        'color' => $this->input->post('color'));     

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('events', $update_event);
      }
      else
      {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('events');
      }
    }
}
?>
