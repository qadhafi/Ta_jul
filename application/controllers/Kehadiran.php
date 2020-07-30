<?php 
defined("BASEPATH") or exit('No direct script access allowed!');

class Kehadiran extends MY_Controller
{
    public function create($id)
    {
        $this->load->model('user_model', 'user');
        $this->load->model('kegiatan_model', 'kegiatan');
        
        if (!$_POST) {
            $data['input'] = (object) $this->kehadiran->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if(!$this->kehadiran->validate()){
            $data['content'] = 'admin/kehadiran/form';
            $data['title'] = 'Tambah Data kehadiran';    
            $data['form_action'] = 'kehadiran/create/'.$id;
            $data['kegiatan'] = $this->kegiatan->where('id_kegiatan', $id)->get();
            $data['jemaat'] = $this->user->where('level', 'jemaat')->orderBy('nama', 'asc')->getAll();
            $this->load->view('admin/app', $data);
            return;
        }

        $cek_kehadiran = $this->kehadiran->where('id_user', $data['input']->id_user)->where('id_kegiatan', $data['input']->id_kegiatan)->get();
     
        if(!$cek_kehadiran){
            $insert = $this->kehadiran->insert([
                'status' => $data['input']->status,
                'id_kegiatan' => $data['input']->id_kegiatan,
                'id_user' => $data['input']->id_user,
                'tanggal_daftar' => $data['input']->tanggal_daftar
            ]);
    
            if ($insert) {
                $this->session->set_flashdata('success', 'Data kehadiran berhasil disimpan.');
            } else {
                $this->session->set_flashdata('error', 'Data kehadiran gagal disimpan.');
            }
        } else {
            $this->session->set_flashdata('error', 'Jemaat tersebut telah terdaftar pada kegiatan.');
        }


        redirect('kegiatan/kehadiran/'.$data['input']->id_kegiatan);

    }
    public function update($id)
    {
        $kegiatan = $this->kehadiran->where('id_kehadiran', $id)->get();
        if (!$kegiatan) {
            $this->session->set_flashdata('warning', 'Data kehadiran tidak ada.');
            redirect('kegiatan');
        }

        if($kegiatan->status == 0){
            $this->kehadiran->where('id_kehadiran', $id)->update([
                'status' => '1'
            ]);
            $this->session->set_flashdata('success', 'Data kehadiran telah dikonfirmasi.');
        } else {
            $this->kehadiran->where('id_kehadiran', $id)->update([
                'status' => '0'
            ]);
            $this->session->set_flashdata('warning', 'Data kehadiran tidak dikonfirmasi.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $kehadiran = $this->kehadiran->where('id_kehadiran', $id)->get();
        if (!$kehadiran) {
            $this->session->set_flashdata('warning', 'Data kehadiran tidak ada.');
            redirect('kehadiran');
        }

        if ($this->kehadiran->where('id_kehadiran', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data kehadiran berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data kehadiran gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}