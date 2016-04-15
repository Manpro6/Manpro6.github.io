<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{
	public function index($offset = 0){
		$this->load->model('jadwal_lab_model');
//        load library pagination
        $this->load->library('pagination');
        
//        configurasi pagination
        $config['base_url'] = base_url().'/lab/index/';
        $config['total_rows'] = $this->jadwal_lab_model->total_record();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 10;
        $config['reuse_query_string'] = TRUE;
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
        $this->pagination->initialize($config); 
        
//        menentukan offset record dari uri segment
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
        // $start = $this->uri->segment(2,0);
//        ubah data menjadi tampilan per limit
        $rows = $this->jadwal_lab_model->user_limit($config['per_page'], $offset);

        $data = $this->jadwal_lab_model->getAllJadwalLab();

//		echo 'ini adalah controller user';	
		$this->load->view('template/header');
		$this->load->view('lab/index', array('data' => $data, 'lab' => $rows, 'pagination' => $this->pagination->create_links()));
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