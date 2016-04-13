<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class krisan extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->library('email');
		$this->load->helper( array('captcha', 'url') );
	}

	public function index()
	{
		$session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
			$this->load->view('template/header');
			$this->load->view('krisan/index');
			$this->load->view('template/footer');
		}
	}

	public function insert()
	{
		if($this->input->post('input_captcha') != $this->session->userdata('captcha_str'))
		{
			echo "<script>
					alert('Huruf Captcha yang Anda masukkan tidak sama. Silahkan coba sekali lagi');
					window.location.href='../../';
				</script>";
		}
		else
		{
			$this->load->model('krisan_model');
			$lihat = $this->krisan_model->input();

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'monxanbel@gmail.com',
			    'smtp_pass' => 'youngjojoee',
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");   

	        $this->email->from('monxanbel@gmail.com', $this->input->post('nama'));
	        $this->email->to('pplk.ukdw@gmail.com'); 
	        $this->email->subject('Kritik & Saran PPLK');
	        $this->email->message($this->input->post('pesan'));  	        
	        if($this->email->send())
	        {
	        	echo $this->email->print_debugger();
	        }
	        else
	        {
	        	show_error($this->email->print_debugger());
	        }	
			//redirect('welcome?msg=1');
		}	
	}
}
?>