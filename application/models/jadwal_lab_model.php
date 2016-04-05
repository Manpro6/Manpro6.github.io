<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_lab_model extends CI_Model
{
  	public function __construct()
  	{
    	$this->load->database();
  	}

    public function getAllJadwalLab($where = "")
    {
      $data = $this->db->query("SELECT * FROM jadwal_lab " . $where);
      return $data->result_array();
    }

    public function updateJadwal()
    {
      $update_jadwal_lab = array(
      'nama_matkul' => $this->input->post('matkul'),    
      'prodi' => $this->input->post('prodi'));

      $lab = $this->input->post('lab');
      $hari = $this->input->post('hari');
      $sesi = $this->input->post('sesi');

      $array = array('lab' => $lab, 'hari' => $hari, 'sesi' => $sesi);

      $this->db->where($array); 
      $result = $this->db->update('jadwal_lab', $update_jadwal_lab);
      if($result == 1) {
        $this->session->set_flashdata('sukses', 1);
      } else {
        $this->session->set_flashdata('sukses', 2);
      }
    }
}
?>
