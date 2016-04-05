<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function index()
	{
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->getAllJadwalLab();
		$this->load->view('template/header');
		$this->load->view('lab/index', array('data' => $data));
		$this->load->view('template/footer');
	}

	public function update()
	{
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->updateJadwal();
		redirect('lab');
	}
}
?>