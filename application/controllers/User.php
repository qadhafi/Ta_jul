<?php 
defined('BASEPATH') or exit('No Direct Script Access Allowed!');

class User extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'user';
    }

    

    public function index($type = null)
    {
       
        $this->isLogin();
        $data['type'] = $type;
        $data['title'] = 'Data '.$type;
        $data['content'] = 'admin/user/index';
        if($type == 'jemaat') {
            $data['data'] = $this->user->orLike('level','jemaat')->getAll();
        }

        if($type == 'pendeta') {
            $data['data'] = $this->user->where('level','pendeta')->getAll();
        }

        if($type == 'staff') {
            $data['data'] = $this->user->where('level','staff')->getAll();
        }

        $this->load->view('admin/app', $data);
    }

    public function create($type = null)
    {
        $this->isLogin();


        if (!$_POST) {
            $data['input'] = (object) $this->user->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('foto', $fotoFileName, 'foto');
            $path = $_FILES['foto']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);            

            if ($upload) {
                $data['input']->foto =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('foto', "./foto/$fotoFileName.$ext", 500, 250);
            }

        }

        if(!$this->user->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/user/form';
            $data['title'] = 'Tambah Data '. ucwords($type);
            $data['type'] = $type;        
            $data['form_action'] = 'user/create/'.$type;
            $this->load->view('admin/app', $data);
            return;
        }


        $data['input']->tanggal_daftar = date('Y-m-d');
        $data['input']->password = md5($data['input']->password);
        unset($data['input']->passconf);

        if ($this->user->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data '.$type.' berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data '.$type.' gagal disimpan.');
        }

        switch ($type) {
            case 'jemaat':
                redirect('user/index/jemaat');  
                break;

            case 'pendeta':
                redirect('user/index/pendeta');
                break;

            case 'staff':
                redirect('user/index/staff');
                break;
            
            default:
                # code...
                break;

        }
    }

    public function profile($id, $type)
    {
        $this->isLogin();
        $user = $this->user->where('id_user', $id)->get();
    
        $data['content'] = 'admin/user/profile';
        $data['title'] = 'Profile '.$user->nama;
        $data['user'] = $user;
        $data['type'] = $type;
        $this->load->view('admin/app', $data);
    }

    public function edit($id, $type = null)
    {
        $this->isLogin();

        $user = $this->user->where('id_user', $id)->get();
        if(!$user) {
            $this->session->set_flashdata('warning', 'Data tidak ada!');
        }

        if(!$_POST){
            $data['input'] = (object) $user;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }
        
        //upload new foto
        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $fotoFileName  = date('YmdHis'); // foto file name
            $upload = $this->user->uploadFoto('foto', $fotoFileName, 'foto');
            $path = $_FILES['foto']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION); 

            if ($upload) {
                $data['input']->foto =  "$fotoFileName.$ext"; // Data for column "foto".
                $this->user->fotoResize('foto', "./foto/$fotoFileName.$ext", 500, 250);

                // Delete old foto
                if ($user->foto) {
                    $this->user->deletefoto($user->foto, 'foto');
                }
            }

        }

        if(!$this->user->validate() || $this->form_validation->error_array()){
            $data['content'] = 'admin/user/form';
            $data['title'] = 'Ubah Data '. ucwords($type);
            $data['type'] = $type;        
            $data['form_action'] = 'user/edit/'.$id.'/'.$type;
            $this->load->view('admin/app', $data);
            return;
        }

        unset($data['input']->passconf);

        //update data
        if ($this->user->where('id_user', $id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah.');
        }

        switch ($type) {
            case 'jemaat':
                redirect('user/index/jemaat');  
                break;

            case 'pendeta':
                redirect('user/index/pendeta');
                break;

            case 'staff':
                redirect('user/index/staff');
                break;
            
            default:
                # code...
                break;
        }
    }

    public function delete($id) 
    {
        $this->isLogin();

        $user = $this->user->where('id_user', $id)->get();
        if (!$user) {
            $this->session->set_flashdata('warning', 'Data user tidak ada.');
            redirect('user');
        }

        if ($this->user->where('id_user', $id)->delete()) {
            // Delete foto.
            $this->user->deletefoto($user->foto, 'foto');
            $this->session->set_flashdata('success', 'Data user berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data user gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function email_unik()
    {
        $email     = $this->input->post('email', true);
        $id_user   = $this->input->post('id_user', true);

        $this->user->where('email', $email);
        !$id_user || $this->user->where('id_user !=', $id_user);
        $user = $this->user->get();

        if ($user) {
            $this->form_validation->set_message('email_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }

    public function username_unik()
    {
        $username     = $this->input->post('username', true);
        $id_user   = $this->input->post('id_user', true);

        $this->user->where('username', $username);
        !$id_user || $this->user->where('id_user !=', $id_user);
        $user = $this->user->get();

        if ($user) {
            $this->form_validation->set_message('username_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}