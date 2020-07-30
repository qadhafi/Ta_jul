<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Galeri_model extends MY_Model 
{
    public $table = 'galeri';
    
    public function getDefaultValues()
    {
        return [
            'judul' => '',
            'tanggal' => date('Y-m-d'),
            'foto' => '',           
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
           
            

        ]; 

        return $validation_rules;
    }
}