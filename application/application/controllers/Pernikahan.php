<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Pernikahan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
	$this->load->model('user_model', 'user');
	$this->load->model('Pernikahan_model', 'pernikahan');
    }

    public function index()
    {
        $this->isLogin();
        $data['title'] = "Data Pernikahan";
        $data['content'] = "admin/pernikahan/index";
        $data['pernikahan'] = $this->pernikahan->join('user', 'left', 'id_pendeta')->getAll();
        $this->load->view("admin/app", $data);
    }

    public function create()
    {
        $this->isLogin();
        if (!$_POST) {
            $data['input'] = (object) $this->pernikahan->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if($this->pernikahan->validate() == false){
            $data['title'] = "Tambah Pernikahan";
            $data['content'] = 'admin/pernikahan/form';
            $data['form_action'] = 'pernikahan/create';
            $data['jemaat'] = $this->user->where('level', 'jemaat')->getAll();
            $data['pendeta'] = $this->user->where('level', 'pendeta')->getAll();
            $this->load->view('admin/app', $data);
            return;
        }

        $insert = $this->pernikahan->insert($data['input']);
        if ($insert) {
            $this->session->set_flashdata('success', 'Data pernikahan berhasil disimpan, sekarang masukan mempelai.');
            redirect('pernikahan/mempelai/create/'.$insert);
            
        } else {
            $this->session->set_flashdata('error', 'Data pernikahan gagal disimpan.');
            redirect($_SERVER['HTTP_REFERER']);
        }         
    }

    public function edit($id)
    {
        $pernikahan = $this->pernikahan->where('id_pernikahan', $id)->get();
        if(!$_POST){
            $data['input'] = (object) $pernikahan;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if(!$this->pernikahan->validate()){
            $data['content'] = 'admin/pernikahan/form';
            $data['pendeta'] = $this->user->where('level', 'pendeta')->getAll();
            $data['title'] = 'Edit Data pernikahan';    
            $data['form_action'] = 'pernikahan/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->pernikahan->where('id_pernikahan', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data pernikahan berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data pernikahan gagal diubah.');
        }

        redirect('pernikahan');
    }

    public function delete($id)
    {
        $this->load->model('mempelai_model', 'mempelai');
        $pernikahan = $this->pernikahan->where('id_pernikahan', $id)->get();
        if (!$pernikahan) {
            $this->session->set_flashdata('warning', 'Data pernikahan tidak ada.');
            redirect('pernikahan');
        }

        if ($this->pernikahan->where('id_pernikahan', $id)->delete()) {
            $this->mempelai->where('id_pernikahan', $id)->delete();
            $this->session->set_flashdata('success', 'Data pernikahan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data pernikahan gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function mempelai($method, $pernikahan_id)
    {
        $this->isLogin();
        $this->load->model('mempelai_model', 'mempelai');
        $pernikahan = $this->pernikahan->where('id_pernikahan', $pernikahan_id)->get();
        $get_mempelai = $this->mempelai->getMempelai($pernikahan_id);

        if (!$_POST) {
            //jika mempelai pria dan wanita tidak ditemukan
            if($get_mempelai['mempelai_pria'][0] == null && $get_mempelai['mempelai_wanita'][0] == null){
                $data['input'] = (object) $this->pernikahan->getDefaultValues();
            } else {
                //jika mempelai pria dan wanita ditemukan
                $data['input'] = (object) $this->mempelai->getDefaultWithMempelai($get_mempelai);
                $data['type'] = 'edit';
            }
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }
        

        if($this->mempelai->validate() == false){
            $data['pernikahan'] = $pernikahan;
            $data['title'] = 'Form mempelai '.$pernikahan->nama_pernikahan;
            $data['content'] = 'admin/pernikahan/form_mempelai';
            $data['form_action'] = 'pernikahan/mempelai/create/'.$pernikahan_id;
            $data['jemaat_pria'] = $this->user->where('level', 'jemaat')->where('jenis_kelamin', 'Laki - Laki')->getAll();
            $data['jemaat_wanita'] = $this->user->where('level', 'jemaat')->where('jenis_kelamin', 'Perempuan')->getAll();
            $this->load->view('admin/app', $data);
            return;
        } else {
            $mempelai_pria = [
                'id_pernikahan' => $pernikahan_id,
                'id_user' => $data['input']->id_user,
                'tipe_mempelai' => 'pria'
            ];
            $mempelai_wanita = [
                'id_pernikahan' => $pernikahan_id,
                'id_user' => $data['input']->id_user_wanita,
                'tipe_mempelai' => 'wanita'
            ];

            $orangtua_pria = [
                'nama_ayah' => $data['input']->nama_ayah,
                'nama_ibu' => $data['input']->nama_ibu,
                'id_user' => $data['input']->id_user,
            ];

            $orangtua_wanita = [
                'nama_ayah' => $data['input']->nama_ayah_wanita,
                'nama_ibu' => $data['input']->nama_ibu_wanita,
                'id_user' => $data['input']->id_user_wanita,
            ];

            //jika mempelai pria dan wanita tidak ditemukan
            if($get_mempelai['mempelai_pria'][0] == null && $get_mempelai['mempelai_wanita'][0] == null){
                //insert mempelai pria
                $this->mempelai->insert($mempelai_pria);

                //insert mempelai wanita
                $this->mempelai->insert($mempelai_wanita);

            } else {
                //update mempelai pria
                $this->mempelai->where('id_user', $get_mempelai['mempelai_pria'][0]->id_user)->update($mempelai_pria);

                //update mempelai wanita
                $this->mempelai->where('id_user', $get_mempelai['mempelai_wanita'][0]->id_user)->update($mempelai_wanita);
            }

            //update or insert orang tua pria
            if($data['input']->id_orangtua != null){
                $this->db->where('id_orangtua', $data['input']->id_orangtua)->update('orangtua', $orangtua_pria);
            } else {
                $this->db->insert('orangtua', $orangtua_pria);
            }

            
            //update or insert orang tua wanita
            if($data['input']->id_orangtua_wanita != null){
                $this->db->where('id_orangtua', $data['input']->id_orangtua_wanita)->update('orangtua', $orangtua_wanita);
            } else {
                $this->db->insert('orangtua', $orangtua_wanita);
            }

            $this->session->set_flashdata('success', 'Data pernikahan dan mempelai berhasil disimpan.');
            redirect(base_url('pernikahan/detail/'.$pernikahan_id));

        }
    }

    public function detail($pernikahan_id)
    {
        $this->load->model('mempelai_model', 'mempelai');
        $data['pernikahan'] = $this->pernikahan->where('id_pernikahan', $pernikahan_id)->get();
        
        $get_mempelai_pria = $this->mempelai->where('id_pernikahan', $pernikahan_id)->where('tipe_mempelai', 'pria')->get();
        if($get_mempelai_pria) {
            $data['mempelai_pria'] = $this->user->where('id_user', $get_mempelai_pria->id_user)->get();
            $data['orangtua_pria'] = $this->mempelai->getOrtu($get_mempelai_pria->id_user);
        } else {
            $data['mempelai_pria'] = null;
        }

        $get_mempelai_wanita = $this->mempelai->where('id_pernikahan', $pernikahan_id)->where('tipe_mempelai', 'wanita')->get();
       
        if($get_mempelai_wanita) {
            $data['mempelai_wanita'] = $this->user->where('id_user', $get_mempelai_wanita->id_user)->get();
            $data['orangtua_wanita'] = $this->mempelai->getOrtu($get_mempelai_wanita->id_user);
        } else {
            $data['mempelai_wanita'] = null;
        }
    
        $data['content'] = 'admin/pernikahan/detail';
        $data['title'] = 'Rincian Pernikahan';
      
        $this->load->view('admin/app', $data);
    }

    public function print()
    {
        $this->load->library('pdf');
        $data['pernikahan'] = $this->pernikahan->join('user', 'left', 'id_pendeta')->getAll();
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-pernikahan.pdf";

        $this->pdf->load_view('admin/laporan/print_pernikahan.php', $data);
    }
}
