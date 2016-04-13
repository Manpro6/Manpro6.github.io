<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->helper( array('captcha', 'url') );
	}

	public function index()
	{
		$path = './images/captcha/';
		if (!file_exists($path) )
		{
			$create = mkdir($path, 0777);
			if (!$create)
			return;
		}
		$word = array_merge(range('0', '9'), range('A', 'Z'));
		$acak = shuffle($word);
		$str  = substr(implode($word), 0, 5);
		$data_ses = array('captcha_str' => $str	);
		$this->session->set_userdata($data_ses);
		$vals = array(
		    'word'	=> $str, 
		    'img_path'	=> $path, 
		    'img_url'	=> base_url().'images/captcha/', 
		    'img_width'	=> '150', 
		    'img_height' => 40, 
		    'expiration' => 7200
		);
		$cap = create_captcha($vals);
		$data2['captcha_image'] = $cap['image'];
		$this->load->view('template/header');
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->getAllJadwalLab();
		$jadwal = $this->jadwal_lab_model->getAllLab("Lab A");		
		$this->load->view('lab/index', array('data' => $data, 'lab' => $jadwal));
		$this->load->view('template/footer', $data2);
	}

	public function insert()
	{
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->insertJadwal();
		redirect('lab');
	}

	public function delete($id) 
	{
		$this->load->model('jadwal_lab_model');
		$where = array('id_jadwal_lab' => $id);
		$res = $this->jadwal_lab_model->deleteJadwal($where);
		redirect('lab');
	}
}
?>