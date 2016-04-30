<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }

	public function index($page = 0)
	{
        $this->load->model('gambar_model');
        $session_id = $this->session->userdata('is_logged_in');
        $data['sesi'] = 0;
        if($session_id == TRUE)
        {
            $this->load->view('template/header');        
            $config['base_url'] = base_url().'gambar/index';
            $config['total_rows'] = $this->gambar_model->count();
            $config['per_page'] = "3";
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
            $data['gambar'] = $this->gambar_model->user_limit($config['per_page'], $data['page']);
            $data['pagination'] = $this->pagination->create_links();
    		$this->load->view('gambar/index', $data);
    		$this->load->view('template/footer');
        }
        else
        {
            redirect('login');
        }
	}

    private function do_upload()
    {
    	$type = explode('.', $_FILES["pic"]["name"]);
    	$type = $type[count($type)-1];
    	$url = "./images/".uniqid(rand()).'.'.$type;
    	if(in_array($type, array("jpg", "jpeg", "gif", "png")))
    	if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
    		if(move_uploaded_file($_FILES["pic"]["tmp_name"], $url))
    			return $url;
    	return "";
    }

    public function insert()
    {
        $url = $this->do_upload();
        if($url == null)
        {
            $this->session->set_flashdata('index', 3); 
        }
        else
        {
            $this->load->model('gambar_model');
            $this->gambar_model->insert($url);
            $this->session->set_flashdata('index', 1);
        }
        redirect('gambar');
    }

    public function update()
    {
    	$id = $this->input->post('id_gambar');
        $path = $this->input->post('path');
        if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name']))
        {
            $url = $this->do_upload();
            if($url == null)
            {
                $this->session->set_flashdata('index', 3); 
            }
            else
            {
                if(unlink($path))
                {    
                    $this->load->model('gambar_model');
                    $this->gambar_model->update($id, $url);
                    $this->session->set_flashdata('index', 2); 
                } 
            }  
            redirect('gambar');        
        }
    }

    public function delete($id_gambar)
    {
        $this->load->model('gambar_model');
        $getPath = $this->gambar_model->getById($id_gambar);
        if(unlink($getPath['nama_gambar']))
        {
            $this->gambar_model->delete($id_gambar);
        }
        $this->session->set_flashdata('index', 4);
        redirect('gambar'); 
    }

    public function showGambar($id_gambar)
    {
        $this->load->model('gambar_model');
        $data['gambar'] = $this->gambar_model->getById($id_gambar);
        $this->load->view('gambar/tampilGambar', $data);
    }
}
?>