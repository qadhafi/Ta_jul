<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_model extends MY_Model
{
    public $table = 'inventaris';

    public function getDefaultValues()
    {
        return [
            'nama_barang' => '',
            'jumlah_bagus' => '',
            'jumlah_rusak' => '',
            'status_barang' => '',
            'ruangan' => ''           
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'nama_barang',
                'label' => 'Nama Barang',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jumlah_bagus',
                'label' => 'Jumlah Bagus',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'jumlah_rusak',
                'label' => 'Jumlah Rusak',
                'rules' => 'required|numeric'
            ],
            

        ]; 

        return $validation_rules;
    }
}