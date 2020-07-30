<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Konseling_model extends MY_Model 
{
    public function getDefaultValues()
    {
        return [
            'subjek' => '',
            'pembahasan' => '',
            'tanggal_posting' => '',
            'respon' => '',
            'tanggal_respon' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'subjek',
                'label' => 'Subject',
                'rules' => 'required'
            ],
            [
                'field' => 'pembahasan',
                'label' => 'Pembahasan',
                'rules' => 'required'
            ],
    
        ];
        return $validation_rules;
    }
}