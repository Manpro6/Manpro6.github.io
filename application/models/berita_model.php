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

    public function getById($id_berita)
    {
      $query = $this->db->query("SELECT * FROM `berita` WHERE id_berita = '$id_berita'");
      $hasil = $query->row_array();
      return $hasil;
    }
    public function insertBerita($url)
    {
    $date = date('m/d/Y h:i:s', time());

        $insert_berita = array(
        'judul' => $this->input->post('judul'),
        'tanggal' => $this->input->$date,
        'penulis' => $this->input->post('penulis'),
        'isi' => $this->input->post('isi'),
        'nama_gambar' => $url);
         $this->db->insert('berita', $insert_berita);
        redirect('berita?msg=2');
      }
    public function update($id, $url)
    {
      $update_gambar = array(
      'judul' => $this->input->post('judul'),
      'tanggal' => $this->input->$date,
      'penulis' => $this->input->post('penulis'),
      'isi' => $this->input->post('isi'),
      'nama_gambar' => $url);

      $this->db->where('id_berita', $id);
      $this->db->update('berita', $update_berita);
    }
  }
?>