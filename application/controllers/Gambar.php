<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller
{
	public function index()
	{
        if(isset($_GET['msg']))
        {
            if(($_GET['msg']) == 1)
            {
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Sukses!</strong> Gambar Berhasil Diubah.</div>";
            }
		}
        $this->load->view('template/header');
		$this->load->model('gambar_model');
		$data['gambar'] = $this->gambar_model->getGambar();
		$this->load->view('admin/gambar/index', $data);
		$this->load->view('template/footer');
	}

	/*public function tambah()
	{
		$this->load->view('template/header');
		$this->load->model('gambar_model');
		$data['gambar'] = $this->gambar_model->getGambar();
		$this->load->view('admin/gambar/insert', $data);
		$this->load->view('template/footer');
	}

	public function upload()
	{
        $url = $this->do_upload();
        $this->load->model('gambar_model');
        $this->gambar_model->insert($url);
        redirect('gambar');
    }*/

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
        }
        $this->load->view('template/header');
		$this->load->model('gambar_model');
		$data['gambar'] = $this->gambar_model->getById($id_gambar);
		$this->load->view('admin/gambar/edit', $data);
		$this->load->view('template/footer');  
    }

    public function update()
    {
    	$id = $this->input->post('id_gambar');
        $path = $this->input->post('path');
        if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name']))
        {
            if(unlink($path))
            {
                $url = $this->do_upload();
                $this->load->model('gambar_model');
                $this->gambar_model->update($url);
                redirect('gambar?msg=1');
            }   
        }
        else
        {
             redirect('gambar/ubah/'.$id.'?msg=1');       
        }
    }
}
