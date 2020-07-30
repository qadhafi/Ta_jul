<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Jumlah_kehadiran_jemaat extends MY_Controller
{
    public function index()
    {
        $data['kehadiran_jemaat'] = $this->db->order_by('tahun', 'desc')->order_by('bulan', 'desc')->get('jumlah_kehadiran_ibadah')->result();        
        $data['content'] = 'admin/jumlah_kehadiran_jemaat/index';
        $data['title'] = 'Jumlah Kehadiran Jemaat';
        $this->load->view('admin/app', $data);

    }

    public function create()
    {
        $this->load->model('default_model');
        if (!$_POST) {
            $data['input'] = (object) $this->default_model->getDefaultValuesKehadiranJemaat();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
            $cek = $this->db->where('bulan', $data['input']->bulan)->where('tahun', $data['input']->tahun)->get('jumlah_kehadiran_ibadah')->row();
            if(!$cek){
                $this->default_model->insertKehadiranJemaat($data['input']);
                $this->session->set_flashdata('success', 'Data Jumlah Kehadiran Jemaat berhasil disimpan.');
                redirect('jumlah_kehadiran_jemaat');
            } else {
                $this->session->set_flashdata('error', 'Data Jumlah Kehadiran Jemaat sudah ada.');
                redirect('jumlah_kehadiran_jemaat');
            }
        }

        if(!$this->default_model->validateKehadiranJemaat()){
            $data['content'] = 'admin/jumlah_kehadiran_jemaat/form';
            $data['title'] = 'Tambah Data Jumlah Kehadiran Ibadah Jemaat';    
            $data['form_action'] = 'jumlah_kehadiran_jemaat/create/';
            $this->load->view('admin/app', $data);
            return;
        }       
    }

    public function edit($id) 
    {
        $this->load->model('default_model');
        if (!$_POST) {
            $data['input'] = (object) $this->db->where('id', $id)->get('jumlah_kehadiran_ibadah')->row();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        
            $this->default_model->updateKehadiranJemaat($data['input']);
            $this->session->set_flashdata('success', 'Data Jumlah Kehadiran Jemaat berhasil disimpan.');
            redirect('jumlah_kehadiran_jemaat');
        }

        if(!$this->default_model->validateKehadiranJemaat()){
            $data['content'] = 'admin/jumlah_kehadiran_jemaat/form';
            $data['title'] = 'Edit Data Jumlah Kehadiran Ibadah Jemaat';    
            $data['form_action'] = 'jumlah_kehadiran_jemaat/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }  
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('jumlah_kehadiran_ibadah');
        $this->session->set_flashdata('success', 'Data Jumlah Kehadiran Jemaat berhasil dihapus.');
        redirect('jumlah_kehadiran_jemaat');
    }
}