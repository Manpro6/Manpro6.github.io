<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->helper( array('captcha', 'url') );
	}

	public function index($offset = 0){
		$this->load->model('jadwal_lab_model');
		//load library pagination
        $this->load->library('pagination');

        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");

		//configurasi pagination
        $config['base_url'] = base_url().'/lab/index/';
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config['total_rows'] = $this->jadwal_lab_model->total_record();
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['enable_query_strings'] = TRUE;
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
        $this->pagination->initialize($config); 
        
		//menentukan offset record dari uri segment
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		//ubah data menjadi tampilan per limit
        $rows = $this->jadwal_lab_model->user_limit($config['per_page'], $offset);
		
		
        $data = $this->jadwal_lab_model->getAllJadwalLab();
	
		$this->load->view('template/header');
		$this->load->view('lab/index', array(
			'data' => $data, 
			'lab' => $rows, 
			'pagination' => $this->pagination->create_links(), 
			'count' => $this->jadwal_lab_model->total_record()
			));
		$path = './images/captcha/';
		if (!file_exists($path) )
		{
			$create = mkdir($path, 0777);
			if (!$create)
			return;
		}
		$word = array_merge(range('0', '9'), range('A', 'Z'));
		$acak = shuffle($word);
		$str  = substr(implode($word), 0, 5);
		$data_ses = array('captcha_str' => $str	);
		$this->session->set_userdata($data_ses);
		$vals = array(
		    'word'	=> $str, 
		    'img_path'	=> $path, 
		    'img_url'	=> base_url().'images/captcha/',
		    'img_width'	=> '150',
		    'img_height' => 40, 
		    'expiration' => 7200 
		);
		$cap = create_captcha($vals);
		$data['captcha_image'] = $cap['image'];
		$this->load->view('template/footer', $data);
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$this->load->model('jadwal_lab_model');
		$data = $this->jadwal_lab_model->insertJadwal();
		redirect('lab');
	}

	public function delete($id) 
	{
		$this->load->model('jadwal_lab_model');
		$where = array('id_jadwal_lab' => $id);
		$res = $this->jadwal_lab_model->deleteJadwal($where);
		redirect('lab');
	}

	public function update() 
	{
		$this->load->model('jadwal_lab_model');
		$res = $this->jadwal_lab_model->updateJadwal();
		redirect('lab');
	}

	public function showID($id)
	{
		$this->load->model('jadwal_lab_model');
	}
}