<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class krisan extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('krisan/index');
		$this->load->view('template/footer');
	}

	public function update()
	{
		// $this->load->model('jadwal_lab_model');
		// $data = $this->jadwal_lab_model->updateJadwal();
		// redirect('krisan');
	}
}
?>