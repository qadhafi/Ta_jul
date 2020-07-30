<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Keuangan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
	$this->isLogin();
	$this->load->model('Keuangan_model', 'keuangan');

    }

    public function index()
    {
        
        if(isset($_GET['cari'])){
            $year = $this->input->get('year');
            $month = $this->input->get('month');
            $tgl = $year.'-'.$month;
            $data['keuangan'] = $this->keuangan->orLike('tanggal', $tgl)->orderBy('tanggal', 'desc')->getAll();

            if($month == 'all' && $year == 'all'){
                $data['keuangan'] = $this->keuangan->orderBy('tanggal', 'desc')->getAll();
            }

            if($month == 'all' && $year != 'all'){
                $data['keuangan'] = $this->keuangan->orLike('tanggal', $year)->orderBy('tanggal', 'desc')->getAll();
            }

            if($month != 'all' && $year == 'all'){
                $data['keuangan'] = $this->keuangan->orLike('tanggal', '-'.$month.'-')->orderBy('tanggal', 'desc')->getAll();
            }

        } else {
            //date today as default show data
            $data['keuangan'] = $this->keuangan->orLike('tanggal', date('Y-m'))->orderBy('tanggal', 'desc')->getAll();
        }

        if(!isset($_GET['type'])){
            $data['years'] = $this->keuangan->getAvailableYear();
            $data['title'] = 'Data Keuangan';
            $data['content'] = 'admin/keuangan/index';
            $pemasukan = $this->keuangan->sum('jumlah_uang')->where('tipe', 'pemasukan')->get();
            $pengeluaran = $this->keuangan->sum('jumlah_uang')->where('tipe', 'pengeluaran')->get();
            $data['saldo_akhir'] = $pemasukan->jumlah_uang - $pengeluaran->jumlah_uang;
                
            $this->load->view('admin/app', $data);
        } else {

            $this->load->library('pdf');      
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-keuangan.pdf";

            $this->pdf->load_view('admin/laporan/print_keuangan.php', $data);
        }
    }


    public function create()
    {
        if (!$_POST) {
            $data['input'] = (object) $this->keuangan->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if(!$this->keuangan->validate()){
            $data['content'] = 'admin/keuangan/form';
            $data['title'] = 'Tambah Data keuangan';    
            $data['form_action'] = 'keuangan/create/';
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->keuangan->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data keuangan berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data keuangan gagal disimpan.');
        }

        redirect('keuangan');
    }

    public function edit($id)
    {
        $keuangan = $this->keuangan->where('id_keuangan', $id)->get();
        if(!$_POST){
            $data['input'] = (object) $keuangan;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if(!$this->keuangan->validate()){
            $data['content'] = 'admin/keuangan/form';
            $data['title'] = 'Edit Data keuangan';    
            $data['form_action'] = 'keuangan/edit/'.$id;
            $this->load->view('admin/app', $data);
            return;
        }

        if ($this->keuangan->where('id_keuangan', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data keuangan berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Data keuangan gagal diubah.');
        }

        redirect('keuangan');
    }

    public function delete($id)
    {
        $keuangan = $this->keuangan->where('id_keuangan', $id)->get();
        if (!$keuangan) {
            $this->session->set_flashdata('warning', 'Data keuangan tidak ada.');
            redirect('keuangan');
        }

        if ($this->keuangan->where('id_keuangan', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data keuangan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data keuangan gagal dihapus.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

}
