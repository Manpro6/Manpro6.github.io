<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kursus extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('kursus/index');
		$this->load->view('template/footer');
	}
}
?>