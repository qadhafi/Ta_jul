<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Kegiatan_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'nama_kegiatan' => '',
            'tanggal' => '',
            'deskripsi' => '',
            'cover' => '',           
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'nama_kegiatan',
                'label' => 'Judul',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'deskripsi',
                'label' => 'Isi',
                'rules' => 'required'
            ],
            

        ]; 

        return $validation_rules;
    }

}
