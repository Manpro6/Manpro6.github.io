<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tentang extends CI_Controller
	{
		public function index()
		{
	        $this->load->view('template/header');
			$this->load->view('tentang/index');
			$this->load->view('template/footer');
		}
	}