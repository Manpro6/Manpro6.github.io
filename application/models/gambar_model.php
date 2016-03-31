<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class Gambar_model extends CI_Model
	{
  	public function __construct()
  	{
    	$this->load->database();
  	}

  	public function getGambar()
  	{
    	$query = $this->db->get('gambar');
    	return $query->result_array();
  	}

    public function getById($id_gambar)
    {
      $query = $this->db->query("SELECT * FROM `gambar` WHERE id_gambar = '$id_gambar'");
      $hasil = $query->row_array();
      return $hasil;
    }

    // public function insert($url)
    // {
    //   $insert_gambar = array(
    //     'nama_gambar' =>$url);
    //   $this->db->insert('gambar', $insert_gambar);
    // }

    public function update($id, $url)
    {
      $update_gambar = array(
      'id_gambar' => $id,
      'nama_gambar' => $url);

      $this->db->where('id_gambar', $id);
      $this->db->update('gambar', $update_gambar);
    }
  }
?>