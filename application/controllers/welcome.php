<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		if(isset($_GET['respond']))
        {
            if($_GET['respond'] == 1)
            {
                echo "<script>alert('Kritik dan Saran sukses ditambahkan');window.location.href='../';</script>";
            }    
        }
		$this->load->view('template/header');
		$this->load->model('gambar_model');
		$data['gambar'] = $this->gambar_model->getGambar();
		$this->load->view('welcome_message', $data);
		$this->load->view('template/footer');
	}

	public function krisan()
	{
		$this->load->model('krisan');
		$lihat = $this->krisan->input();
		redirect('welcome?respond=1');
	}
}