<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Konseling extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        if($this->session->level != 'pendeta') {
            $this->session->set_flashdata('warning', 'Anda tidak dapat mengakses fitur tersebut!');
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['konseling'] = $this->konseling->join('user')->orderBy('tanggal_posting', 'desc')->getAll();
        $data['title'] = "Data Konseling";
        $data['content'] = 'admin/konseling/index';
        $this->load->view('admin/app', $data);
    }

    public function create($id)
    {
        $this->load->model('user_model', 'user');
        $konseling = $this->konseling->where('id_konseling', $id)->get();
        $user = $this->user->where('id_user', $konseling->id_user)->get();

        if (!$_POST) {
            $data['input'] = (object) $this->konseling->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if(!$this->konseling->validate()){             
            $data['form_action'] = 'konseling/create/'.$id;
            $data['jemaat'] = $user->nama;
            $data['konseling'] = $konseling;
            $this->load->view('admin/konseling/modal_form', $data);
            return;
        }

        // $insert = $this->konseling->where('id_konseling', $id)->update([
        //     'respon' => $data['input']->respon,
        //     'tanggal_respon' => date('Y-m-d'),
        //     'id_pendeta' => $this->session->id_user,        
        // ]);

        $insert = $this->db->insert('respon', [
            'respon' => $data['input']->respon,
            'tanggal_respon' => date('Y-m-d'),
            'id_pendeta' => $this->session->id_user,
            'id_konseling' => $id
        ]);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data respon konseling berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data respon konseling gagal disimpan.');
        }


        redirect($_SERVER['HTTP_REFERER']);
    }
}