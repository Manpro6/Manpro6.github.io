<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->helper( array('captcha', 'url') );
		$this->load->library('pagination');
	}

	public function index($page=0)
	{
		$path = './images/captcha/'; //posisi folder untuk menyimpan gambar captcha
		if (!file_exists($path) ) //membuat folder apabila folder captcha tidak ada
		{
			$create = mkdir($path, 0777);
			if (!$create)
			return;
		}
		$word = array_merge(range('0', '9'), range('A', 'Z')); //Menampilkan huruf acak untuk dijadikan captcha
		$acak = shuffle($word);
		$str  = substr(implode($word), 0, 5);
		$data_ses = array('captcha_str' => $str	); //Menyimpan huruf acak tersebut kedalam session
		$this->session->set_userdata($data_ses);
		$vals = array( //array untuk menampilkan gambar captcha
		    'word'	=> $str, //huruf acak yang telah dibuat diatas
		    'img_path'	=> $path, //path untuk menyimpan gambar captcha
		    'img_url'	=> base_url().'images/captcha/', //url untuk menampilkan gambar captcha
		    'img_width'	=> '150', //lebar gambar captcha
		    'img_height' => 40, //tinggi gambar captcha
		    'expiration' => 7200 //expired time per captcha
		);
		$cap = create_captcha($vals);
		$data['captcha_image'] = $cap['image']; //variable array untuk menampilkan captcha pada view
		if(isset($_GET['msg']))
        {
            if($_GET['msg'] == 1)
            {
                echo "<script>alert('Kritik dan Saran sukses ditambahkan');window.location.href='welcome';</script>";
            }    
        }
		$this->load->view('template/header');
		$this->load->model('gambar_model');
		$this->load->model('berita_model');
		$data['count'] = $this->gambar_model->count();
		$data['gambar'] = $this->gambar_model->getGambar();
		$data['berita'] = $this->berita_model->getTerbaru();




		$config['base_url'] = base_url().'welcome_message';
        $config['total_rows'] = $this->berita_model->count();
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
        $data['berita'] = $this->berita_model->user_limit($config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('welcome_message', $data);
		$this->load->view('template/footer-index', $data);
	}
}
