<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kursus extends CI_Controller
{
	public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('captcha', 'url'));
	}
	
	public function index()
	{
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
		$data_ses = array('captcha_str' => $str);
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
		$this->load->view('template/header');
		$this->load->view('kursus/index');
		$this->load->view('template/footer', $data);
	}
}
?>