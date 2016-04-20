<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->helper( array('captcha', 'url') );
	}

	public function index()
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
                echo "<script>alert('Kritik dan Saran sukses ditambahkan');window.location.href='../';</script>";
            }    
        }
		$this->load->view('template/header');
		$this->load->model('gambar_model');
		$this->load->model('berita_model');
		$data['count'] = $this->gambar_model->count();
		$data['gambar'] = $this->gambar_model->getGambar();
		$data['berita'] = $this->berita_model->getTerbaru();
		$this->load->view('welcome_message', $data);
		$this->load->view('template/footer-index', $data);
	}
}
