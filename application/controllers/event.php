<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event extends CI_Controller
{
	public function index()
	{
		$session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
        	if(isset($_GET['msg']))
            {
                if(($_GET['msg']) == 1)
                {
                    echo "<script>alert('Inputan tanggal mulai dan tanggal selesai Anda tidak tepat');window.location.href='event';</script>";
                }
                elseif(($_GET['msg']) == 2)
                {
                    echo "<script>alert('Jadwal berhasil ditambahkan');window.location.href='event';</script>";
                }
    		}
			$this->load->view('template/header');
			$this->load->view('event/index');
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

	public function update()
	{
		$this->load->model('event_model');
		$data = $this->event_model->updateEvent();
		redirect('event');
	}
}
?>