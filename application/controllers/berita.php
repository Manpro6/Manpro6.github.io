<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller
{
	public function index()
	{
        $session_id = $this->session->userdata('is_logged_in');
        if($session_id == TRUE)
        {
            if(isset($_GET['msg']))
            {
                if(($_GET['msg']) == 1)
                {
                    echo "<script>alert('Berita berhasil diubah');window.location.href='berita';</script>";
                }
    		}
            $this->load->view('template/header');
    		$this->load->model('berita_model');
    		$this->load->view('berita/index', $data);
    		$this->load->view('template/footer');
        }
        else
        {
            echo "<script>alert('Anda harus melakukan login');window.location.href='login';</script>";
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
        if(isset($_GET['msg']))
        {
            if(($_GET['msg']) == 1)
            {
                echo "<script>alert('Pilih Gambar Perubahannya');window.location.href='".$id_gambar."';</script>";
            }
            elseif(($_GET['msg']) == 2)
            {
                echo "<script>alert('Tidak menerima format file selain .jpg, .jpeg, .gif dan .png');window.location.href='".$id_gambar."';</script>";
            }
        }
        $this->load->view('template/header');
		$this->load->model('berita_model');
		$data['berita'] = $this->berita_model->getById($id_gambar);
		$this->load->view('berita/edit', $data);
		$this->load->view('template/footer');  
    }

    public function update()
    {
    	$id = $this->input->post('id_berita');
        $path = $this->input->post('path');
        if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name']))
        {
            $url = $this->do_upload();
            if($url == null)
            {
                redirect('berita/ubah/'.$id.'?msg=2'); 
            }
            else
            {
                if(unlink($path))
                {    
                    $this->load->model('berita_model');
                    $this->gambar_model->update($id, $url);
                    redirect('berita?msg=1');
                    $this->load->model('berita_model');
        $data = $this->event_model->updateEvent();
        redirect('berita');
                } 
            }          
        }
        else
        {
             redirect('berita/ubah/'.$id.'?msg=1');       
        }
    }
        public function insert()
    {
        $this->load->model('berita_model');
        $data = $this->event_model->insertBerita();
        redirect('berita');
    }

    }

