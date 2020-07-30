<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Inventaris extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogin();

    }
    public function index()
    {
        $data['inventaris'] = $this->inventaris->getAll();
        $data['title'] = "Data Inventaris";
        $data['content'] = 'admin/inventaris/index';
        $this->load->view('admin/app', $data);
    }

    public function create()
    {
        if (!$_POST) {
            $data['input'] = (object) $this->inventaris->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if(!$this->inventaris->validate()){
            $data['content'] = 'admin/inventaris/form';
            $data['title'] = 'Tambah Data Inventaris';    
            $data['form_action'] = 'inventaris/create/';
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->inventaris->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal disimpan.');
        }

        redirect('inventaris');
    }

    public function edit($id) 
    {
        $inventaris = $this->inventaris->where('id_inventaris', $id)->get();
        if(!$_POST){
            $data['input'] = (object) $inventaris;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if(!$this->inventaris->validate()){
            $data['content'] = 'admin/inventaris/form';
            $data['title'] = 'Edit Data Inventaris';    
            $data['form_action'] = 'inventaris/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->inventaris->where('id_inventaris', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal diubah.');
        }

        redirect('inventaris');

    }

    public function delete($id)
    {
        $inventaris = $this->inventaris->where('id_inventaris', $id)->get();
        if (!$inventaris) {
            $this->session->set_flashdata('warning', 'Data inventaris tidak ada.');
            redirect('inventaris');
        }

        if ($this->inventaris->where('id_inventaris', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}
