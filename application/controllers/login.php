<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class login extends CI_Controller
	{
		public function index()
		{
			$this->load->view('login/index');
		}

		public function cek()
		{
			$this->load->model('login_model');
			$cek = $this->login_model->search();	
			if($cek == true) //klo user tervalidasi
			{
				$data = array (
					'username' => $this->input->post('username'),
					'is_logged_in' => true
				);

				$this->session->set_userdata($data);
				redirect('gambar');
			}
			else
			{
				$data['error']='Username atau Password Anda Salah. ';
				$this->load->view('login/index', $data);
			}
		}

		public function logout()
		{	
			$this->session->sess_destroy();
			$data['logout'] = 'Anda telah keluar dari sistem.';		
			$this->load->view('login/index', $data);
		}
	}
?>
