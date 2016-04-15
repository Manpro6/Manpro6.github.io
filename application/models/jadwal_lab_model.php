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

    public function getAllLab($lab)
    {
      if ( isset( $_GET['lab'] ) && !empty( $_GET['lab'] ) ){
        $lab = $this->input->get('lab');
      }
      else {
        $lab = "Lab A";  
      }
      $query = "SELECT id_jadwal_lab, lab, hari, sesi, nama_matkul, prodi, status, tanggal_mulai, tanggal_selesai FROM lab, jadwal_lab WHERE lab.id_lab = jadwal_lab.id_lab AND lab = '".$lab."'";
      $data = $this->db->query($query);
      return $data->result_array();
    }

    public function updateJadwal()
    {
      $lab = $this->input->post('lab_edit');
      $hari = $this->input->post('hari_edit');
      $sesi = $this->input->post('sesi_edit');

      $query = "SELECT id_lab FROM lab WHERE lab = '".$lab."' AND hari = '".$hari."' AND sesi = '".$sesi."'";
      $data = $this->db->query($query);
      $id_lab = "";
      foreach ($data->result_array() as $row) {
        $id_lab = $row['id_lab'];
      }

      $tanggal = $this->input->post('daterange_edit');

      $update_jadwal_lab = array(
      'id_lab' => $id_lab,   
      'nama_matkul' => $this->input->post('matkul_edit'),
      'prodi' => $this->input->post('prodi_edit'),
      'status' => $this->input->post('status_edit'),
      'tanggal_mulai' => substr($tanggal, 0, 10),
      'tanggal_selesai' => substr($tanggal, 13));
      
      $this->db->where('id_jadwal_lab', $this->input->post('id_edit')); 
      $result = $this->db->update('jadwal_lab', $update_jadwal_lab);
      if($result == 1) {
        $this->session->set_flashdata('edit', 1);
      } else {
        $this->session->set_flashdata('edit', 2);
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

      $tanggal = $this->input->post('daterange');

      $insert_jadwal_lab = array(
      'id_lab' => $id_lab,   
      'nama_matkul' => $this->input->post('matkul'),
      'prodi' => $this->input->post('prodi'),
      'status' => $this->input->post('status'),
      'tanggal_mulai' => substr($tanggal, 0, 10),
      'tanggal_selesai' => substr($tanggal, 13));

      $result = $this->db->insert('jadwal_lab', $insert_jadwal_lab);
      if($result == 1) {
        $this->session->set_flashdata('sukses', 1);
      } else {
        $this->session->set_flashdata('sukses', 2);
      }
    }

    public function deleteJadwal($where)
    {
      $result = $this->db->delete('jadwal_lab', $where);
      if($result == 1) {
        $this->session->set_flashdata('hapus', 1);
      } else {
        $this->session->set_flashdata('hapus', 2);
      }
    }

    function total_record($lab="Lab A") {
      if ( isset( $_GET['lab'] ) && !empty( $_GET['lab'] ) ){
        $lab = $this->input->get('lab');
      }
      else {
        $lab = "Lab A";  
      }
      $this->db->select('id_jadwal_lab, lab, hari, sesi, nama_matkul, prodi, status, tanggal_mulai, tanggal_selesai');
      $this->db->from('lab');
      $this->db->join('jadwal_lab', 'lab.id_lab = jadwal_lab.id_lab');
      $this->db->where('lab', $lab);
      return $this->db->count_all_results();
    }

    function user_limit($limit, $start = 0, $lab="Lab A") {
      if ( isset( $_GET['lab'] ) && !empty( $_GET['lab'] ) ){
        $lab = $this->input->get('lab');
      }
      else {
        $lab = "Lab A";  
      }
      $this->db->limit($limit, $start);
      $this->db->select('id_jadwal_lab, lab, hari, sesi, nama_matkul, prodi, status, tanggal_mulai, tanggal_selesai');
      $this->db->from('lab');
      $this->db->join('jadwal_lab', 'lab.id_lab = jadwal_lab.id_lab');
      $this->db->where('lab', $lab);
      return $this->db->get()->result_array();
    }
  }
?>
