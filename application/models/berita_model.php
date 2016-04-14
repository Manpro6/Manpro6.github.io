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
    function character_limiter($str, $n = 500, $end_char = '&#8230;')
    {
    if (strlen($str) < $n)
    {
        return $str;
    }

    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

    if (strlen($str) <= $n)
    {
        return $str;
    }

    $out = "";
    foreach (explode(' ', trim($str)) as $val)
    {
        $out .= $val.' ';

        if (strlen($out) >= $n)
        {
            $out = trim($out);
            return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
        }
    }
 }
  }
?>