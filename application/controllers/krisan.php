<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class krisan extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper( array('captcha', 'url') );
	}

	public function index($page = 0)
	{		
		$this->load->model('krisan_model');
		$session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
			$config['base_url'] = base_url().'krisan/index';
			$config['total_rows'] = $this->krisan_model->tot_num_rows();
			$config['per_page'] = "5";
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '&laquo';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '&raquo';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			$data['page'] = $page;
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['krisan'] = $this->krisan_model->user_limit($config['per_page'], $data['page']);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('template/header');		
			$this->load->view('krisan/index', $data);
			$this->load->view('template/footer');
		}
		else
		{
			redirect('login');
		}
	}

	public function insert()
	{
		print_r($this->input->post('input_captcha'));
		print_r($this->session->userdata('captcha_str'));
		if($this->input->post('input_captcha') != $this->session->userdata('captcha_str'))
		{
			echo "<script>
					alert('Huruf Captcha yang Anda masukkan tidak sama. Silahkan coba sekali lagi');
					window.location.href='../';
				</script>";
		}
		else
		{
			$this->load->model('krisan_model');
			$lihat = $this->krisan_model->input();
			$isi = "Email ".$this->input->post('email')." telah menambahkan kritik & saran, dengan pesan '".$this->input->post('pesan')."'";
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.gmail.com',
			    'smtp_port' => 25,
			    'smtp_user' => 'pplk@gmail.com',
			    'smtp_pass' => 'ukdw1986',
			    'mailtype' => 'text',
        		'validation' => TRUE, // bool whether to validate email or not
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");   

	        $this->email->from($this->input->post('email'), $this->input->post('nama'));
	        $this->email->to('pplk.ukdw@gmail.com'); 
	        $this->email->subject('Kritik & Saran PPLK');
	        $this->email->message($isi);  	        
	        if($this->email->send())
	        {
	        	echo $this->email->print_debugger();
	        }
	        else
	        {
	        	show_error($this->email->print_debugger());
	        }
			redirect('welcome?msg=1');
		}	
	}

	public function delete($id_kritik)
	{
		$this->load->model('krisan_model');
		$this->krisan_model->delete($id_kritik);
		$this->session->set_flashdata('index', 1); 
		redirect('krisan');
	}

	public function bacaPesan($id_kritik)
	{
		$this->load->model('krisan_model');
        $data['pesan'] = $this->krisan_model->detail($id_kritik);
        $this->load->view('krisan/pesan', $data);
	}
}
?>