<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Kegiatan extends MY_Controller 
{
    public function index()
    {
        $data['kegiatan'] = $this->kegiatan->orderBy('tanggal', 'desc')->getAll();
        $data['title'] = "Data Kegiatan";
        $data['content'] = 'admin/kegiatan/index';
        $this->load->view('admin/app', $data);
    }

    public function create()
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        if (!$_POST) {
            $data['input'] = (object) $this->kegiatan->getDefaultValues();
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

        if(!$this->kegiatan->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/kegiatan/form';
            $data['title'] = 'Tambah Data kegiatan';       
            $data['form_action'] = 'kegiatan/create/';
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->kegiatan->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data kegiatan berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data kegiatan gagal disimpan.');
        }

        redirect('kegiatan');
    }

    public function show($id)
    {
        $this->isLogin();
        $data['kegiatan'] = $this->kegiatan->where('id_kegiatan', $id)->get();
        $data['content'] = 'admin/kegiatan/show';
        $data['title'] = $data['kegiatan']->nama_kegiatan;
        $this->load->view('admin/app', $data);
    }

    public function edit($id)
    {
        $this->isLogin();
        $this->load->model('user_model', 'user');

        $kegiatan = $this->kegiatan->where('id_kegiatan', $id)->get();
        if(!$kegiatan) {
            $this->session->set_flashdata('warning', 'Data tidak ada!');
        }

        if(!$_POST){
            $data['input'] = (object) $kegiatan;
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
                if ($kegiatan->foto) {
                    $this->user->deletefoto($kegiatan->foto, 'foto');
                }
            }

        }

        if(!$this->kegiatan->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/kegiatan/form';
            $data['title'] = 'Edit Data kegiatan';       
            $data['form_action'] = 'kegiatan/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->kegiatan->where('id_kegiatan', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data kegiatan berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data kegiatan gagal diubah.');
        }

        redirect('kegiatan');
        
    }

    public function delete($id)
    {
        $this->isLogin();
        $this->load->model('User_model', 'user');

        $kegiatan = $this->kegiatan->where('id_kegiatan', $id)->get();
        if (!$kegiatan) {
            $this->session->set_flashdata('warning', 'Data kegiatan tidak ada.');
            redirect('kegiatan');
        }

        if ($this->kegiatan->where('id_kegiatan', $id)->delete()) {
            // Delete foto.
            $this->user->deletefoto($kegiatan->foto, 'foto');
            $this->session->set_flashdata('success', 'Data kegiatan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data kegiatan gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function kehadiran($id)
    {
        $kegiatan = $this->kegiatan->where('id_kegiatan', $id)->get();
        if (!$kegiatan) {
            $this->session->set_flashdata('warning', 'Data kegiatan tidak ada.');
            redirect('kegiatan');
        }

        $kehadiran = $this->db->join('user', 'user.id_user = kehadiran.id_user')->where('id_kegiatan', $id)->order_by('nama', 'asc')->get('kehadiran')->result();    
        $data['kehadiran'] = $kehadiran;
        $data['kegiatan'] = $kegiatan;
        $data['title'] = 'Kehadiran Pada Kegiatan '.$kegiatan->nama_kegiatan;
        $data['content'] = 'admin/kegiatan/kehadiran';
        $this->load->view('admin/app', $data);
    }


}