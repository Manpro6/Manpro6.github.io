<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sertifikasi extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('sertifikasi/index');
		$this->load->view('template/footer');
	}
}
?>