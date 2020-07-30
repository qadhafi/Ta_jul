<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Mempelai_model extends MY_Model 
{
    public function getDefaultValues()
    {
        return [            
            'id_user' => '',
            'id_orangtua' => '',
            'nama_ayah' => '',
            'nama_ibu' => '',
            'id_user_wanita' => '',
            'id_orangtua_wanita' => '',
            'nama_ayah_wanita' => '',
            'nama_ibu_wanita' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'id_user',
                'label' => 'Mempelai Pria',
                'rules' => 'trim|required'
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
            [
                'field' => 'id_user_wanita',
                'label' => 'Mempelai Wanita',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nama_ayah_wanita',
                'label' => 'nama Ayah Wanita',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_ibu_wanita',
                'label' => 'Nama Ibu Wanita',
                'rules' => 'required'
            ],
            
        ]; 

        return $validation_rules;
    }

    public function getMempelai($pernikahan_id)
    {
        $pria = $this->db->where('id_pernikahan', $pernikahan_id)->where('tipe_mempelai', 'pria')->get('mempelai')->row();
        $wanita = $this->db->where('id_pernikahan', $pernikahan_id)->where('tipe_mempelai', 'wanita')->get('mempelai')->row();
        $arr = [
            'mempelai_pria' => [
                $pria
            ],
            'mempelai_wanita' => [
                $wanita
            ]
        ];

        //print_r($arr['mempelai_wanita'][0]->id_user);
        //die();
        return $arr;
    }

    public function getDefaultWithMempelai($data)
    {
        $orangtua = $this->getOrtu($data['mempelai_pria'][0]->id_user);
        $orangtua_wanita = $this->getOrtu($data['mempelai_wanita'][0]->id_user);
        return [
            'id_user' => $data['mempelai_pria'][0]->id_user,
            'id_orangtua' => $orangtua->id_orangtua,
            'nama_ayah' => $orangtua->nama_ayah,
            'nama_ibu' => $orangtua->nama_ibu,
            'id_user_wanita' => $data['mempelai_wanita'][0]->id_user,
            'id_orangtua_wanita' => $orangtua_wanita->id_orangtua,
            'nama_ayah_wanita' => $orangtua_wanita->nama_ayah,
            'nama_ibu_wanita' => $orangtua_wanita->nama_ibu,        
        ];

    }
}