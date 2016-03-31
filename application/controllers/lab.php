<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function index()
	{
		$session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
			$this->load->view('template/header');
			$this->load->view('lab/index');
			$this->load->view('template/footer');
		}
		else
        {
            echo "<script>alert('Anda harus melakukan login');window.location.href='login';</script>";
        }
	}

	public function insert()
	{
		$this->load->model('event_model');
		$data = $this->event_model->insertEvent();
		redirect('event');
	}
}
?>