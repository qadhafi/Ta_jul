<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Ujian_lsp extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ujian_lsp_model');
        $this->isLogin();
    }

    public function index()
    {
        //date today as default show data
        $data['Ujian_lsp'] = $this->Ujian_lsp_model->getAll();
        $data['content'] = 'admin/Ujian_lsp/index';
        $data['title'] = 'Ujian_lsp';
        $this->load->view('admin/app', $data);
    }


    public function create()
    {
        if (!$_POST) {
            $data['input'] = (object) $this->Ujian_lsp_model->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if (!$this->Ujian_lsp_model->validate()) {
            $data['content'] = 'admin/Ujian_lsp/form';
            $data['title'] = 'Tambah Data Peserta Ujian LSP';
            $data['form_action'] = 'Ujian_lsp/create/';
            print_r($data);
            // die();
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->Ujian_lsp_model->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data Ujian berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data Ujian gagal disimpan.');
        }

        redirect('Ujian_lsp');
    }

    public function edit($id) //ini merupakan salah satu function
    {
        $Ujian_lsp = $this->Ujian_lsp_model->where('id', $id)->get();
        if (!$_POST) {
            $data['input'] = (object) $Ujian_lsp;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->Ujian_lsp_model->validate()) {
            $data['content'] = 'admin/Ujian_lsp/form';
            $data['title'] = 'Edit Data Ujian';
            $data['form_action'] = 'Ujian_lsp/edit/' . $id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->Ujian_lsp_model->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data Ujian berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data Ujian gagal diubah.');
        }

        redirect('Ujian_lsp');
    }

    public function delete($id)
    {
        $Ujian_lsp = $this->Ujian_lsp_model->where('id', $id)->get();
        if (!$Ujian_lsp) {
            $this->session->set_flashdata('warning', 'Data Ujian tidak ada.');
            redirect('Ujian_lsp');
        }

        if ($this->Ujian_lsp_model->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data Ujian berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data Ujian gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}
