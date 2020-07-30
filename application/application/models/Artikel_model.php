<?php 
defined('BASEPATH') or exit;

class Artikel_model extends MY_Model
{
    public $table = 'artikel';

    public function getDefaultValues()
    {
        return [
            'judul' => '',
            'tanggal' => date('Y-m-d'),
            'isi' => '',
            'cover' => '',           
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'isi',
                'label' => 'Isi',
                'rules' => 'required'
            ],
            

        ]; 

        return $validation_rules;
    }

    
}