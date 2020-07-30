<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_model extends MY_Model
{
    public $table = 'inventaris';

    public function getDefaultValues()
    {
        return [
            'nama_barang' => '',
            'jumlah' => '',
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
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'status_barang',
                'label' => 'Status Barang',
                'rules' => 'required'
            ],

        ]; 

        return $validation_rules;
    }
}