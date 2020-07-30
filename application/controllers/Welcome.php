<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function index()
	{
		$this->load->model('artikel_model', 'artikel');
		$this->load->model('kegiatan_model', 'kegiatan');
		$data['title'] = 'Selamat Datang';
		$data['content'] = 'jemaat/home';
		$data['articles'] = $this->artikel->orderBy('tanggal', 'desc')->limit(3)->getAll();
		$data['events'] = $this->kegiatan->where('tanggal >=', date('Y-m-d'))->orderBy('tanggal')->limit(3)->getAll();
		$this->load->view('jemaat/app', $data);
	}
}
