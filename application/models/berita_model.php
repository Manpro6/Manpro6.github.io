<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

  class berita_model extends CI_Model
  {
    public function __construct()
    {
      $this->load->database();
    }

    public function getBerita()
    {
      $query = $this->db->get('berita');
      return $query->result_array();
    }
     public function delete($id)
    {
      $this->db->where('id_berita', $id);
      $this->db->delete('berita');
    }

    public function getById($id_berita)
    {
      $query = $this->db->query("SELECT * FROM `berita` WHERE id_berita = '$id_berita'");
      $hasil = $query->row_array();
      return $hasil;
    }
     public function getTerbaru()
    {
      $query = $this->db->query("SELECT * FROM `berita` where id_berita >=0 order by id_berita DESC LIMIT 0,5");
      return $query->result_array();
    }

    public function insertBerita($url)
    {
    $date = date('Y-m-d h:i:s');

        $insert_berita = array(
        'judul' => $this->input->post('judul'),
        'tanggal' => $date,
        'penulis' => $this->input->post('penulis'),
        'isi' => $this->input->post('isi'),
        'gambar' => $url);
         $this->db->insert('berita', $insert_berita);
        redirect('berita?msg=2');
      }
    public function update($id, $url)
    {
      $update_berita = array(
      'judul' => $this->input->post('judul'),
      'penulis' => $this->input->post('penulis'),
      'isi' => $this->input->post('isi'),
      'gambar' => $url);

      $this->db->where('id_berita', $id);
      $this->db->update('berita', $update_berita);
    }
    
  }
?>