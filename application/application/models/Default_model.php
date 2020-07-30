<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Default_model extends MY_Model 
{

    public function getPendeta($id_user)
    {
        $pendeta = $this->db->where('id_user', $id_user)->get('user')->row();
        return $pendeta->nama;
    }

    public function getMempelai($id_pernikahan, $type_mempelai){
        $this->load->model('user_model', 'user');
        $this->load->model('mempelai_model', 'mempelai');
        $get_mempelai = $this->mempelai->where('id_pernikahan', $id_pernikahan)->where('tipe_mempelai', $type_mempelai)->get();
        $mempelai = $this->user->where('id_user', $get_mempelai->id_user)->get();

        return $mempelai->nama;
    }

    public function getAllResponse($id_konseling){
        return $this->db->where('id_konseling', $id_konseling)->get('respon')->result();
    }


    public function getDefaultValuesKehadiranJemaat()
    {
        return [
            'bulan' => '',
            'tahun' => '',
            'jumlah' => ''
        ];
    }

    public function getValidationRulesKehadiranJemaat()
    {    
        $validation_rules = [
            [
                'field' => 'bulan',
                'label' => 'Bulan',
                'rules' => 'required'
            ],
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules' => 'required'
            ],
            [
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required'
            ],
        ];        
    }


    public function validateKehadiranJemaat()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $validationRules = $this->getValidationRulesKehadiranJemaat();
        $this->form_validation->set_rules($validationRules);
        return $this->form_validation->run();
    }

    public function insertKehadiranJemaat($data){
        $this->db->insert('jumlah_kehadiran_ibadah', $data);     
        return $this->db->insert_id();
    }

    public function updateKehadiranJemaat($data)
    {
        $data = (array) $data;
        return $this->db->where('id', $data['id'])->update('jumlah_kehadiran_ibadah', [
            'bulan' => $data['bulan'],
            'tahun' => $data['tahun'],
            'jumlah' => $data['jumlah']
        ]);
    }


    public function getAvailableKeuanganYear()
    {
        $date = $this->db->select('YEAR(tanggal) as year')->group_by('YEAR(tanggal)')->order_by('tanggal', 'desc')->get('keuangan')->result();        
        return $date;
    }

    public function getAvailableYearOfIbadah()
    {
        $data = $this->db->select('tahun')->group_by('tahun')->order_by('tahun', 'desc')->get('jumlah_kehadiran_ibadah')->result();
        return $data;
    }

}