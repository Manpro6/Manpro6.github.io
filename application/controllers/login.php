<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller
	{
		public function index()
		{
			if(isset($_GET['msg']))
            {
                if($_GET['msg'] == 1)
                {
                    echo "<script>alert('Login berhasil');window.location.href='login';</script>";
                }
                elseif($_GET['msg'] == 2)
                {
                    echo "<script>alert('Login Gagal');window.location.href='login';</script>";
                }         
            }
			$this->load->view('template/header');
			$this->load->view('login/index');
			$this->load->view('template/footer');
		}

		public function cek()
		{
			$this->load->model('login_model');
			$lihat = $this->login_model->search();
			if($lihat == true)
			{
				redirect('gambar');
			}
			else
			{
				redirect('login?msg=2');
			}
		}
	}
?>
