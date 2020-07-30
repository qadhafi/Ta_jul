<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Artikel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'artikel';
    }

    public function index()
    {
        $this->isLogin();
        $data['content'] = 'admin/artikel/index';
        $data['title'] = 'Data Artikel';
        $data['artikel'] = $this->artikel->getAll();
        $this->load->view('admin/app', $data);
    }

    public function create()
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        if (!$_POST) {
            $data['input'] = (object) $this->artikel->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['cover']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('cover', $fotoFileName, 'cover');
            $path = $_FILES['cover']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);            

            if ($upload) {
                $data['input']->cover =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('cover', "./cover/$fotoFileName.$ext", 500, 250, 'cover');
            }

        }

        if(!$this->artikel->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/artikel/form';
            $data['title'] = 'Tambah Data Artikel';       
            $data['form_action'] = 'artikel/create/';
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->artikel->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data artikel berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data artikel gagal disimpan.');
        }

        redirect('artikel');
    }

    public function show($id)
    {
        $this->isLogin();
        $data['artikel'] = $this->artikel->where('id_artikel', $id)->get();
        $data['content'] = 'admin/artikel/show';
        $data['title'] = $data['artikel']->judul;
        $this->load->view('admin/app', $data);
    }

    public function edit($id)
    {
        $this->isLogin();
        $this->load->model('user_model', 'user');

        $artikel = $this->artikel->where('id_artikel', $id)->get();
        if(!$artikel) {
            $this->session->set_flashdata('warning', 'Data tidak ada!');
        }

        if(!$_POST){
            $data['input'] = (object) $artikel;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['cover']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('cover', $fotoFileName, 'cover');
            $path = $_FILES['cover']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);            

            if ($upload) {
                $data['input']->cover =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('cover', "./cover/$fotoFileName.$ext", 500, 250, 'cover');

                // Delete old foto
                if ($artikel->cover) {
                    $this->user->deletefoto($artikel->cover, 'cover');
                }
            }

        }

        if(!$this->artikel->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/artikel/form';
            $data['title'] = 'Edit Data Artikel';       
            $data['form_action'] = 'artikel/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->artikel->where('id_artikel', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data artikel berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data artikel gagal diubah.');
        }

        redirect('artikel');
        
    }

    public function delete($id)
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        $artikel = $this->artikel->where('id_artikel', $id)->get();
        if (!$artikel) {
            $this->session->set_flashdata('warning', 'Data artikel tidak ada.');
            redirect('artikel');
        }

        if ($this->artikel->where('id_artikel', $id)->delete()) {
            // Delete foto.
            $this->user->deletefoto($artikel->cover, 'cover');
            $this->session->set_flashdata('success', 'Data artikel berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data artikel gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}