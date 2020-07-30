<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');    
    }

    public function index()
    {
        if(isset($this->session->is_login)){
            redirect(base_url('dashboard'));
        }
        if (!$_POST) {
            $data['input'] = (object) $this->login->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }
        $data['content'] = 'auth/login';
        $data['title'] = 'Login Form';

        if (!$this->login->validate()) {
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->login->login($data['input'])) {  
            
            if($this->session->level == 'jemaat'){
                redirect(base_url());
            } else {
                redirect(base_url('dashboard'));
            }
            
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah.');
        }

        redirect('login');
    }

    public function logout()
    {       
        $this->login->logout();
        redirect(base_url());
	
    }
}