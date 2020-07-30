<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Ujian_lsp_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'nama' => '',
            'keterangan' => ''
        ];
    }
    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'required'
            ],
        ];
        return $validation_rules;
    }
}
