<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event extends CI_Controller
{
	public function index()
	{
		$data['sesi'] = 0;
		$session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
        	if(isset($_GET['msg']))
            {
                if(($_GET['msg']) == 1)
                {;
                    $data['sesi'] = 1;
                }
                elseif(($_GET['msg']) == 2)
                {
                    $data['sesi'] = 2;
                }
                elseif(($_GET['msg']) == 3)
                {
                    $data['sesi'] = 3;
                }
                elseif(($_GET['msg']) == 4)
                {
                    $data['sesi'] = 4;
                }
    		}
			$this->load->view('template/header');
			$this->load->view('event/index', $data);
			$this->load->view('template/footer');
		}
		else
        {
            redirect('login');
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
	}

    public function bacaStart($id)
    {
        $this->load->model('event_model');
        $data['eve'] = $this->event_model->baca($id);
        $this->load->view('event/start', $data);
    }

    public function bacaEnd($id)
    {
        $this->load->model('event_model');
        $data['eve'] = $this->event_model->baca($id);
        $this->load->view('event/end', $data);
    }
}
?>