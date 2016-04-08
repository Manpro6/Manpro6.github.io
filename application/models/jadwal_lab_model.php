<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_lab_model extends CI_Model
{
    public function __construct()
    {
      $this->load->database();
    }

    public function getAllJadwalLab($where = "")
    {
      $query = "SELECT jadwal_lab.id_lab AS id_lab, nama_matkul, prodi, hari, sesi, lab FROM lab, jadwal_lab WHERE (curdate() BETWEEN jadwal_lab.tanggal_mulai AND jadwal_lab.tanggal_selesai) AND lab.id_lab = jadwal_lab.id_lab";
      $data = $this->db->query($query . $where);
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

    public function insertJadwal()
    {
      $lab = $this->input->post('lab');
      $hari = $this->input->post('hari');
      $sesi = $this->input->post('sesi');
    
      $query = "SELECT id_lab FROM lab WHERE lab = '".$lab."' AND hari = '".$hari."' AND sesi = '".$sesi."'";
      $data = $this->db->query($query);
      $id_lab = "";
      foreach ($data->result_array() as $row) {
        $id_lab = $row['id_lab'];
      }

      $insert_jadwal_lab = array(
      'id_lab' => $id_lab,   
      'nama_matkul' => $this->input->post('matkul'),
      'prodi' => $this->input->post('prodi'),
      'status' => $this->input->post('status'),
      'tanggal_mulai' => $this->input->post('daterangepicker_start'),
      'tanggal_selesai' => $this->input->post('daterangepicker_end'));
      $tanggal = $this->input->post('daterangepicker_start');
      if(isset($tanggal)){
        $this->session->set_flashdata('sukses', $tanggal);
      } else {
        $this->session->set_flashdata('sukses', "Tidak ketemu");
      }

      // $result = $this->db->insert('jadwal_lab', $insert_jadwal_lab);
      // if($result == 1) {
      //   $this->session->set_flashdata('sukses', 1);
      // } else {
      //   $this->session->set_flashdata('sukses', 2);
      // }
    }
  }
?>
