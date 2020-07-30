<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Pernikahan_model extends MY_Model 
{
    public $table = 'pernikahan';

    public function getDefaultValues()
    {
        return [
            'nama_pernikahan' => '',
            'tanggal_pernikahan' => '',
            'id_pendeta' => '',
            'lokasi_pernikahan' => '',
            'status' => '',
            'keterangan' => '',
            'id_user' => '',
            'id_orangtua' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'id_user_wanita' => '',
            'id_orangtua_wanita' => '',
            'nama_ayah_wanita' => '',
            'nama_ibu_wanita' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'nama_pernikahan',
                'label' => 'Nama Pernikahan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal_pernikahan',
                'label' => 'Tanggal Pernikahan',
                'rules' => 'required'
            ],
            [
                'field' => 'id_pendeta',
                'label' => 'Pendeta',
                'rules' => 'required'
            ],
            [
                'field' => 'lokasi_pernikahan',
                'label' => 'Lokasi Pernikahan',
                'rules' => 'required'
            ],       
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ],
            

        ]; 

        return $validation_rules;
    } 
}