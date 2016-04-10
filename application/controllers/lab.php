<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function index()
	{
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->getAllJadwalLab();
		$jadwal = $this->jadwal_lab_model->getAllLab("Lab A");
		$this->load->view('template/header');
		$this->load->view('lab/index', array('data' => $data, 'lab' => $jadwal));
		$this->load->view('template/footer');
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