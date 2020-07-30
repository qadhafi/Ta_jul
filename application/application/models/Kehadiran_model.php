<?php
defined('BASEPATH') or exit('No direct script access allowed!');


class Kehadiran_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'status' => '',
            'id_kegiatan' => '',
            'id_user' => '',
            'tanggal_daftar' => '',
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ],
            [
                'field' => 'id_kegiatan',
                'label' => 'ID Kegiatan',
                'rules' => 'required'
            ],
            [
                'field' => 'id_user',
                'label' => 'Jemaat',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_daftar',
                'label' => 'Tanggal Daftar',
                'rules' => 'required'
            ],
    
        ];
        return $validation_rules;
    }
}