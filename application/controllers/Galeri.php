<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Galeri extends MY_Controller
{
    public function index()
    {
        $data['content'] = 'admin/galeri/index';
        $data['galeri'] = $this->galeri->getAll();
        $data['title'] = 'Data Gallery';
        $this->load->view('admin/app', $data);
    }

    public function create()
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        if (!$_POST) {
            $data['input'] = (object) $this->galeri->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('foto', $fotoFileName, 'foto');
            $path = $_FILES['foto']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);            

            if ($upload) {
                $data['input']->foto =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('foto', "./foto/$fotoFileName.$ext", 500, 250, 'foto');
            }

        }

        if(!$this->galeri->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/galeri/form';
            $data['title'] = 'Tambah Data galeri';       
            $data['form_action'] = 'galeri/create/';
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->galeri->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data galeri berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data galeri gagal disimpan.');
        }

        redirect('galeri');
    }

    public function edit($id)
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');
        $galeri = $this->galeri->where('id_galeri', $id)->get();

        if (!$_POST) {
            $data['input'] = (object) $galeri;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('foto', $fotoFileName, 'foto');
            $path = $_FILES['foto']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);            

            if ($upload) {
                $data['input']->foto =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('foto', "./foto/$fotoFileName.$ext", 500, 250, 'foto');

                 // Delete old foto
                 if ($galeri->foto) {
                    $this->user->deletefoto($galeri->foto, 'foto');
                }
            }

        }

        if(!$this->galeri->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/galeri/form';
            $data['title'] = 'Edit Data galeri';       
            $data['form_action'] = 'galeri/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->galeri->where('id_galeri', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data galeri berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data galeri gagal diubah.');
        }

        redirect('galeri');
    }

    public function delete($id) 
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        $galeri = $this->galeri->where('id_galeri', $id)->get();
        if (!$galeri) {
            $this->session->set_flashdata('warning', 'Data galeri tidak ada.');
            redirect('galeri');
        }

        if ($this->galeri->where('id_galeri', $id)->delete()) {
            // Delete foto.
            $this->user->deletefoto($galeri->foto, 'foto');
            $this->session->set_flashdata('success', 'Data galeri berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data galeri gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}