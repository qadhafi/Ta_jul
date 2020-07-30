<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Ubah_password extends Jemaat_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $this->isLogin();
        if($this->session->level == 'jemaat'){
            $this->session->set_flashdata('warning', 'Anda tidak dapat mengakses halaman tersebut!');
            redirect(base_url());
        }
        $data['title'] = 'Ubah Password';
        $data['content'] = 'admin/ubah_password';
        $this->load->view('admin/app', $data);
    }

    public function jemaat()
    {
        $data['title'] = 'Ubah Password';
        $data['content'] = 'jemaat/ubah_password';
        $this->load->view('jemaat/app', $data);
    }

    public function update()
    {
        $this->isLogin();
        $user = $this->user->where('id_user', $this->session->id_user)->get();
        $old_pass = $this->input->post('old_password');
        $new_pass = $this->input->post('password');
        $confirm_pass = $this->input->post('passconf'); 
     
        if($user->password == md5($old_pass)){
            
            if($new_pass != $confirm_pass) {
                $this->session->set_flashdata('error', 'Password baru tidak cocok');
            } else {
                $this->user->where('id_user', $this->session->id_user)->update(['password' => md5($new_pass)]);
                $this->session->set_flashdata('success', 'Password berhasil diubah');
            }

        } else {
            $this->session->set_flashdata('error', 'Password lama salah.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}