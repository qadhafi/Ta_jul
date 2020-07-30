<?php
class MY_Controller extends CI_Controller
{
    protected $halaman = '';

    public function __construct()
    {
        parent::__construct();

        $model = strtolower(get_class($this));
        if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
            $this->load->model($model . '_model', $model, true);
        }

        if($this->session->level == 'jemaat'){
            $this->session->set_flashdata('warning', 'Anda tidak dapat mengakses halaman tersebut!');
            redirect(base_url());
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
