<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_lab_model extends CI_Model
{
    public function __construct()
    {
      $this->load->database();
    }

    public function getAllJadwalLabs($where = "")
    {
      $query = "SELECT jadwal_lab.id_lab AS id_lab, nama_matkul, prodi, hari, sesi, lab FROM lab, jadwal_lab WHERE (curdate() BETWEEN jadwal_lab.tanggal_mulai AND jadwal_lab.tanggal_selesai) AND lab.id_lab = jadwal_lab.id_lab";
      $data = $this->db->query($query . $where);
      return $data->result_array(); 
    }

    public function getAllJadwalLab()
    { 
      if ( isset( $_GET['tanggal'] ) && !empty( $_GET['tanggal'] ) ){
        $tanggal = $this->input->get('tanggal');
      }
      else {
        $tanggal = date('Y-m-d'); 
      }
      $where = "";
      if ( isset( $_GET['prodi'] ) && !empty( $_GET['prodi'] ) ){
        if($this->input->get('prodi') == "Semua Program Studi") {

        } else {
          $where = "AND jadwal_lab.prodi = '" . $this->input->get('prodi') ."'";
        }
      }
      else {
        $where = ""; 
      }
      $query = "SELECT jadwal_lab.id_lab AS id_lab, nama_matkul, prodi, hari, sesi, lab, status FROM lab, jadwal_lab WHERE ('". $tanggal ."' BETWEEN jadwal_lab.tanggal_mulai AND jadwal_lab.tanggal_selesai) AND lab.id_lab = jadwal_lab.id_lab ". $where; 
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


      //QUERY UPDATE
      $update_jadwal_lab = array(
        'id_lab' => $id_lab,   
        'nama_matkul' => $this->input->post('matkul_edit'),
        'prodi' => $this->input->post('prodi_edit'),
        'status' => $this->input->post('status_edit'),
        'tanggal_mulai' => substr($tanggal, 0, 10),
        'tanggal_selesai' => substr($tanggal, 13)
      );

      // $cekDatabase = "SELECT * FROM jadwal_lab WHERE id_lab = '".$id_lab."' AND '". substr($tanggal, 0, 10). "' <> tanggal_mulai AND '". substr($tanggal, 13) ."' <> tanggal_selesai AND (tanggal_mulai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."') OR (tanggal_selesai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."' )";
      
      $cekDatabase = "SELECT * FROM jadwal_lab WHERE id_jadwal_lab = '" . $this->input->post('id_edit') . "'";

      $cek = $this->db->query($cekDatabase);
      foreach($cek->result_array() as $res){
        if ($res['id_lab'] == $id_lab) {
          //apabila ID LAB nya sama (Tidak berubah hari, sesi, lab)
          //cek tanggalnya saja
          // $this->session->set_flashdata('out', substr($tanggal, 0, 10) . " and " . $res['tanggal_mulai'] . " <br> " . substr($tanggal, 13) . " AND " . $res['tanggal_selesai']);
          if((substr($tanggal, 0, 10) == $res['tanggal_mulai']) && (substr($tanggal, 13) == $res['tanggal_selesai'])){
            $this->db->where('id_jadwal_lab', $this->input->post('id_edit')); 
            $result = $this->db->update('jadwal_lab', $update_jadwal_lab);
            if($result == 1) {
              $this->session->set_flashdata('edit', 1);
            }
            else {
              $this->session->set_flashdata('edit', 2);
            }
          }
          else {
            $cekDatabase2 = "SELECT * FROM jadwal_lab WHERE id_lab = '".$id_lab."' AND '". substr($tanggal, 0, 10). "' <> tanggal_mulai AND '". substr($tanggal, 13) ."' <> tanggal_selesai AND (tanggal_mulai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."') OR (tanggal_selesai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."' )";
            $cek2 = $this->db->query($cekDatabase2);
            if ($cek2->num_rows() > 0) {
              $this->session->set_flashdata('edit', 3);
            }
            else {
              $this->db->where('id_jadwal_lab', $this->input->post('id_edit')); 
              $result = $this->db->update('jadwal_lab', $update_jadwal_lab);
              if($result == 1) {
                $this->session->set_flashdata('edit', 1);
              }
              else {
                $this->session->set_flashdata('edit', 2);
              }
            }
          }
        }
        else {
          $cekDatabase2 = "SELECT * FROM jadwal_lab WHERE id_lab = '".$id_lab."' AND '". substr($tanggal, 0, 10). "' <> tanggal_mulai AND '". substr($tanggal, 13) ."' <> tanggal_selesai AND (tanggal_mulai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."') OR (tanggal_selesai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."' AND id_jadwal_lab <> '". $this->input->post('id_edit')."')";
          $cek2 = $this->db->query($cekDatabase2);
          if ($cek2->num_rows() > 0) {
            $this->session->set_flashdata('edit', 3);
          }
          else {
            $this->db->where('id_jadwal_lab', $this->input->post('id_edit')); 
            $result = $this->db->update('jadwal_lab', $update_jadwal_lab);
            if($result == 1) {
              $this->session->set_flashdata('edit', 1);
            }
            else {
              $this->session->set_flashdata('edit', 2);
            }
          }
        }   
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

      $cekDatabase = "SELECT * FROM jadwal_lab WHERE id_lab = '".$id_lab."' AND (tanggal_mulai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."' OR tanggal_selesai BETWEEN '".substr($tanggal, 0, 10)."' AND '".substr($tanggal, 13)."')";
      $cek = $this->db->query($cekDatabase);
      if ($cek->num_rows() > 0) {
        $this->session->set_flashdata('sukses', 3);
      }
      else {
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