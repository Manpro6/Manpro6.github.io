<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller
{
	public function index()
	{
        $session_id = $this->session->userdata('is_logged_in');
        $data['sesi'] = 0;
        if($session_id == TRUE)
        {
            $this->load->view('template/header');
            if(isset($_GET['msg']))
            {
                if(($_GET['msg']) == 1)
                {
                    $data['sesi'] = 1;
                }
    		}           
    		$this->load->model('gambar_model');
    		$data['gambar'] = $this->gambar_model->getGambar();
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

    public function ubah($id_gambar)
	{
        $data['sesi'] = 0;
        if(isset($_GET['msg']))
        {
            if(($_GET['msg']) == 1)
            {
                $data['sesi'] = 1;
            }
            elseif(($_GET['msg']) == 2)
            {
                $data['sesi'] = 2;
            }
        }
        $this->load->view('template/header');
		$this->load->model('gambar_model');
		$data['gambar'] = $this->gambar_model->getById($id_gambar);
		$this->load->view('gambar/edit', $data);
		$this->load->view('template/footer');  
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
                redirect('gambar/ubah/'.$id.'?msg=2'); 
            }
            else
            {
                if(unlink($path))
                {    
                    $this->load->model('gambar_model');
                    $this->gambar_model->update($id, $url);
                    redirect('gambar?msg=1');
                } 
            }          
        }
        else
        {
             redirect('gambar/ubah/'.$id.'?msg=1');       
        }
    }
}
