<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Aktivitas extends Jemaat_Controller 
{
    public function register_kegiatan($id_kegiatan)
    {
        $this->checkSession();

        $user = $this->session->id_user;

        //cek apakah jemaat tersebut pernah mendaftar sebelumnya
        $cek = $this->db->where('id_kegiatan', $id_kegiatan)->where('id_user', $user)->get('kehadiran')->row();

        if(!$cek){
            //jika tidak insert ke tabel kehadiran
            $insert = $this->db->insert('kehadiran', [
                'status' => '0',
                'id_kegiatan' => $id_kegiatan,
                'id_user' => $user,
                'tanggal_daftar' => date('Y-m-d')
            ]);

            //jika sudah, redirect
            if($insert) {
                $this->session->set_flashdata('success', 'Anda telah berhasil mendaftar pada kegiatan tersebut!');
                redirect($_SERVER['HTTP_REFERER']);
            }
    
        } else {
            $this->session->set_flashdata('error', 'Anda tidak dapat mendaftar pada kegiatan yang sama!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }

    public function kegiatan_anda()
    {
        $this->checkSession();

        $id_user = $this->session->id_user;

        $kehadiran = $this->db->select('*, kegiatan.tanggal as "tanggal_kegiatan"')
            ->join('kegiatan', 'kegiatan.id_kegiatan = kehadiran.id_kegiatan')                    
            ->where('id_user', $id_user)
            ->get('kehadiran')
            ->result();

        $data['title'] = 'Data kegiatan yang anda ikuti';
        $data['content'] = 'jemaat/listing/kehadiran_kegiatan';
        $data['kehadiran'] = $kehadiran;

        $this->load->view('jemaat/app', $data);        
    }

    public function undo_register($id_kehadiran)
    {
        $kehadiran = $this->db->where('id_kehadiran', $id_kehadiran)->get('kehadiran')->row();
        if (!$kehadiran) {
            $this->session->set_flashdata('warning', 'Data kehadiran tidak ada.');
            redirect('kehadiran');
        }

        if($kehadiran->status == 0){
            if ($this->db->where('id_kehadiran', $id_kehadiran)->delete('kehadiran')) {
                $this->session->set_flashdata('success', 'Data pendaftaran kegiatan berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Data kehadiran gagal dihapus.');
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kehadiran karena anda telah dikonfirmasi hadir.');
        }



        redirect($_SERVER['HTTP_REFERER']);
    }

    public function konseling()
    {
        $this->load->model('konseling_model', 'konseling');
        $data['title'] = "Konseling";
        $data['content'] = 'jemaat/listing/konseling';
        $data['konseling'] = $this->konseling->where('id_user', $this->session->id_user)->orderBy('tanggal_posting', 'desc')->getAll();
        
        $this->load->view('jemaat/app', $data);
    }

    public function tambah_konseling()
    {
        $this->isLogin();
        $this->load->model("konseling_model", "konseling");

        if (!$_POST) {
            $data['input'] = (object) $this->konseling->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if(!$this->konseling->validate()){
            $data['title'] = 'Tambah Konseling';
            $data['content'] = 'jemaat/form_konseling';
            $this->load->view('jemaat/app', $data);
            return;
        }

        $insert = $this->konseling->insert([
            'subjek' => $data['input']->subjek,
            'pembahasan' => $data['input']->pembahasan,
            'tanggal_posting' => $data['input']->tanggal_posting,
            'id_user' => $this->session->id_user
        ]);

        if($insert){
            $this->session->set_flashdata('success', 'Pesan konseling berhasil dikirim. Mohon menunggu hingga pendeta membalas pesan anda.');
            redirect('aktivitas/konseling');
        }

    }

}