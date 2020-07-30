<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Keuangan_model extends MY_Model 
{
    public function getDefaultValues()
    {
        return [
            'tanggal' => date('Y-m-d'),
            'jumlah_uang' => '',
            'tipe' => '',
            'keterangan' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'jumlah_uang',
                'label' => 'Jumlah uang',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'tipe',
                'label' => 'Tipe',
                'rules' => 'required'
            ],
    
        ];
        return $validation_rules;
    }

    public function getAvailableYear()
    {
        $date = $this->db->select('YEAR(tanggal) as year')->group_by('YEAR(tanggal)')->order_by('tanggal', 'desc')->get('keuangan')->result();        
        return $date;
    }

}