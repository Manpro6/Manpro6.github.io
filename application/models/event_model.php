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
        $this->session->set_flashdata('index', 1); 
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
        $this->session->set_flashdata('index', 2); 
      }
      redirect('event');
    }

    public function updateEvent()
    {
      $cek = $this->input->post('delete');
      if($cek == null)
      {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        if($start >= $end)
        {
          $this->session->set_flashdata('index', 1); 
        }
        else
        {
          $update_event = array(
          'title' => $this->input->post('title'),
          'pengajar' => $this->input->post('pengajar'),
          'deskripsi' => $this->input->post('deskripsi'),
          'color' => $this->input->post('color'),
          'start' => $start,               
          'end' => $end);     

          $this->db->where('id', $this->input->post('id'));
          $this->db->update('events', $update_event);
          $this->session->set_flashdata('index', 3); 
        }
      }
      else
      {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('events');
        $this->session->set_flashdata('index', 4); 
      }
      redirect('event');
    }

    public function baca($id)
    {
      $query = $this->db->query("SELECT * FROM `events` WHERE id = '$id'");
      $hasil = $query->row_array();
      return $hasil;
    }
}
?>
