<?php 
defined('BASEPATH') or exit('No direct script access allowed!');


class Listing extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model', 'artikel');
        $this->load->model('galeri_model', 'galeri');
        $this->load->model('kegiatan_model', 'kegiatan');
    }
    
    public function artikel()
    {       
	
		$data['title'] = 'Artikel';
		$data['content'] = 'jemaat/artikel/index';
		$data['articles'] = $this->artikel->orderBy('tanggal', 'desc')->getAll();
		$this->load->view('jemaat/app', $data);	
    }

    public function read($id)
    {
        $data['artikel'] = $this->artikel->where('id_artikel', $id)->get();
        $data['content'] = 'jemaat/artikel/read';
        $data['title'] = $data['artikel']->judul;
        $data['random_artikel'] = $this->artikel->orderBy('judul', 'RANDOM')->limit(10)->getAll();
        $this->load->view('jemaat/app', $data);
    }


    public function gallery()
    {
        $data['content'] = 'jemaat/listing/gallery';
        $data['galleries'] = $this->galeri->getAll();
        $data['title'] = 'Gallery Foto';
        $this->load->view('jemaat/app', $data);
    }

    public function detail_kegiatan($id){
        $data['data'] = $this->kegiatan->where('id_kegiatan', $id)->get();
        
        $this->load->view('jemaat/listing/kegiatan_modal', $data);
    }

    public function kegiatan()
    {
        $data['title'] = 'Kegiatan';
		$data['content'] = 'jemaat/listing/kegiatan';
		$data['events'] = $this->kegiatan->orderBy('tanggal', 'desc')->getAll();
		$this->load->view('jemaat/app', $data);	
    }

    public function contact()
    {
        $data['title'] = "Contact";
        $data['content'] = 'jemaat/listing/contact';
        $this->load->view('jemaat/app', $data);
    }
}