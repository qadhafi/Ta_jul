<?php 
defined('BASEPATH') or exit;

class User_model extends MY_Model
{
    public $table = 'user';

    public function getDefaultValues()
    {
        return [
            'nama' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'no_telp' => '',
            'alamat' => '',
            'username' => '',
            'password' => '',
            'level' => '',
            'foto' => '',
            'email' => '',
            'pekerjaan' => '',
            'suku' => '',
            'pendidikan' => ''
        ];
    }

    public function getValidationRules()
    {
        $validation_rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_telp',
                'label' => 'No. Telp',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[6]|max_length[12]|callback_username_unik'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|callback_email_unik'
            ],           
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]'
            ],
            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'required'
            ]

        ];
        if(isset($_POST['id_user'])){
            unset($validation_rules[8]);
            unset($validation_rules[9]);
        }


        return $validation_rules;
    }

    public function uploadFoto($fieldname, $filename, $path)
    {
        $config = [
            'upload_path'      => './'.$path.'/',
            'file_name'        => $filename,
            'allowed_types'    => 'jpg|png|jpeg',  
            'max_size'         => 5000,     // 5MB        
            'overwrite'        => true,
            'file_ext_tolower' => true,
        ];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function fotoResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $source_path,
            'maintain_ratio' => true,
            'width'          => $width,
            'height'         => $height,
            'new_image'      => $fieldname.'/small/',
        ];

        $this->load->library('image_lib', $config);

        if ($this->image_lib->resize()) {
            return true;
        } else {
            $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('', ''));
            return false;
        }
    }

    public function deletefoto($imgFile, $path)
    {
        if (file_exists("./$path/$imgFile")) {
            unlink("./$path/$imgFile");
            if (file_exists("./$path/small/$imgFile")) {
                unlink("./$path/small/$imgFile");
            }
        }
    }
}