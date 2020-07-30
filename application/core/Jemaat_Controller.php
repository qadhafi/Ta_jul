<?php 

defined('BASEPATH') or exit('No direct script access allowed!');

class Jemaat_Controller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $model = strtolower(get_class($this));
        if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
            $this->load->model($model . '_model', $model, true);
        }
        
    }

    public function checkSession()
    {
        $user = $this->session->id_user;
        if(!$user) {
            $this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function isLogin()
    {
        $is_login = $this->session->userdata('is_login');
        if(!$is_login){
            redirect(base_url());
        }
    }
}