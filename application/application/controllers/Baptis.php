<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Baptis extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
	$this->load->model('user_model', 'user');
	$this->load->model('Baptis_model','baptis');
    }
    public function index()
    {
        $this->isLogin();
        $data['baptis'] = $this->baptis->join('user')->getAll();

        $data['title'] = "Data Baptis";
        $data['content'] = 'admin/baptis/index';
        $this->load->view('admin/app', $data);
    }

    public function create()
    {
        $this->isLogin();

        if (!$_POST) {
            $data['input'] = (object) $this->baptis->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if($this->baptis->validate() == false) {
            $data['title'] = "Tambah Baptis";
            $data['content'] = 'admin/baptis/form';
            $data['form_action'] = 'baptis/create';
            $data['jemaat'] = $this->user->where('level', 'jemaat')->getAll();
            $data['pendeta'] = $this->user->where('level', 'pendeta')->getAll();
            $this->load->view('admin/app', $data);
            return;
        } else {
            //do input
            $this->baptis->insert([
                'jenis_baptis' => $data['input']->jenis_baptis,
                'tanggal' => $data['input']->tanggal,
                'id_pendeta' => $data['input']->id_pendeta,
                'id_user' => $data['input']->id_user,
                'status' => $data['input']->status 
            ]);

            $orangtua = [
                'nama_ayah' => $data['input']->nama_ayah,
                'nama_ibu' => $data['input']->nama_ibu,
                'id_user' => $data['input']->id_user,
            ];

            if($data['input']->id_orangtua != null){
                $this->db->where('id_orangtua', $data['input']->id_orangtua)->update('orangtua', $orangtua);
            } else {
                $this->db->insert('orangtua', $orangtua);
            }
        }

        $this->session->set_flashdata('success', 'Data baptis berhasil disimpan.');
        redirect('baptis');

    }

    public function edit($id_baptis)
    {
        $this->isLogin();
        $baptis = $this->baptis->where('id_baptis', $id_baptis)->get();
        $orangtua = $this->db->where('id_user', $baptis->id_user)->get('orangtua')->row();
        
        $obj_merged = (object) array_merge((array) $baptis, (array) $orangtua);

        if(!$_POST){
            $data['input'] = $obj_merged;          
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if($this->baptis->validate() == false){
            $data['title'] = 'Ubah Baptis';
            $data['content'] = 'admin/baptis/form';
            $data['form_action'] = 'baptis/edit/'.$id_baptis;
            $data['jemaat'] = $this->user->where('level', 'jemaat')->getAll();
            $data['pendeta'] = $this->user->where('level', 'pendeta')->getAll();
            $data['type'] = 'edit';
            $this->load->view('admin/app', $data);
            return;
        } else {
            //do input
            $this->baptis->where('id_baptis', $id_baptis)->update([
                'jenis_baptis' => $data['input']->jenis_baptis,
                'tanggal' => $data['input']->tanggal,
                'id_pendeta' => $data['input']->id_pendeta,
                'id_user' => $data['input']->id_user,
                'status' => $data['input']->status 
            ]);

            $orangtua = [
                'nama_ayah' => $data['input']->nama_ayah,
                'nama_ibu' => $data['input']->nama_ibu,
                'id_user' => $data['input']->id_user,
            ];

            if($data['input']->id_orangtua != null){
                $this->db->where('id_orangtua', $data['input']->id_orangtua)->update('orangtua', $orangtua);
            } else {
                $this->db->insert('orangtua', $orangtua);
            }
        }

        $this->session->set_flashdata('success', 'Data baptis berhasil diubah.');
        redirect('baptis');


    }

    public function delete($id)
    {


        $baptis = $this->baptis->where('id_baptis', $id)->get();
        if (!$baptis) {
            $this->session->set_flashdata('warning', 'Data baptis tidak ada.');
            redirect('baptis');
        }

        if ($this->baptis->where('id_baptis', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data baptis berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data baptis gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function orangtua($user_id)
    {
        $orangtua = $this->db->where('id_user', $user_id)->get('orangtua')->result();
        if(count($orangtua) == 0){
            echo "null";
        } else {
            echo json_encode($orangtua);
        }
    }

    public function print()
    {
        $this->load->library('pdf');
        $data['baptis'] = $this->baptis->join('user')->getAll();
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-baptis.pdf";

        $this->pdf->load_view('admin/laporan/print_baptis.php', $data);
    }
}
