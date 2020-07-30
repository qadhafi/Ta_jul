<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Baptis_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'jenis_baptis' => '',
            'tanggal' => '',
            'id_pendeta' => '',
            'id_user' => '',
            'status' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'id_orangtua' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'jenis_baptis',
                'label' => 'Jenis Baptis',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'id_pendeta',
                'label' => 'Pendeta',
                'rules' => 'required'
            ],
            [
                'field' => 'id_user',
                'label' => 'Jemaat',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_ayah',
                'label' => 'Nama Ayah',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_ibu',
                'label' => 'Nama Ibu',
                'rules' => 'required'
            ],
            

        ]; 

        return $validation_rules;
    } 
}