<?php 
defined('BASEPATH') OR exit('No direct script access allowed!');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'dashboard';
    }



    public function index()
    {
        $this->isLogin();
        $data['total_jemaat'] = $this->db->select('count(*) as total_jemaat')->where('level', 'jemaat')->get('user')->row();
        $data['total_pendeta'] = $this->db->select('count(*) as total_pendeta')->where('level', 'pendeta')->get('user')->row();
        $data['keuangan_grafik'] = $this->keuangan_grafik('', 'controller');
        $data['jemaat_grafik_1'] = $this->jemaat_grafik('2020', 'controller');
        $data['jemaat_grafik_2'] = $this->jemaat_grafik('2019', 'controller');
        $data['title'] = "Dashboard";
        $data['content'] = 'admin/dashboard';
        $data['dashboard'] = 'true';
        $this->load->view('admin/app', $data);
    }

    public function keuangan_grafik($year = null, $from = null){
        //$this->output->enable_profiler(TRUE);
        if($year == null){
            $year = '2020';
        }

        $pengeluaran = $this->db->query("SELECT SUM(jumlah_uang) as total_uang, MONTH(tanggal) AS bulan, YEAR(tanggal) as tahun, tipe from keuangan where YEAR(tanggal) = '$year' and tipe = 'pengeluaran' GROUP by MONTH(tanggal) ORDER BY tanggal ASC")->result();
        $pemasukan = $this->db->query("SELECT SUM(jumlah_uang) as total_uang, MONTH(tanggal) AS bulan, YEAR(tanggal) as tahun, tipe from keuangan where YEAR(tanggal) = '$year' and tipe = 'pemasukan' GROUP by MONTH(tanggal) ORDER BY tanggal ASC")->result();

        $data = [
            'pengeluaran' => [
                'total_uang' => [
                    
                ],
                'bulan' => [
                    
                ]
            ],
            'pemasukan' => [
                'total_uang' => [
                    
                ],
                'bulan' => [
                    
                ]
            ]
        ];

        //nice
        // array_push($data['pengeluaran']['bulan'], 'apr');
        // print_r($data['pengeluaran']['bulan']);
        
        foreach($pengeluaran as $bulan){
            array_push($data['pengeluaran']['bulan'], $bulan->bulan);
        }
        foreach($pemasukan as $bulan){
            array_push($data['pemasukan']['bulan'], $bulan->bulan);
        }
        foreach($pengeluaran as $nominal){
            array_push($data['pengeluaran']['total_uang'], $nominal->total_uang);
        }
        foreach($pemasukan as $nominal){
            array_push($data['pemasukan']['total_uang'], $nominal->total_uang);
        }
   
        if($from == null){
            echo json_encode($data);
        } else {
            return json_encode($data);
        }
    }

    public function jemaat_grafik($year, $from = null)
    {
        $data = $this->db->where('tahun', $year)->order_by('bulan', 'asc')->get('jumlah_kehadiran_ibadah')->result();
        $array = [];

        for($i = 0; $i <= 11; $i++){
            if(!isset($i, $data[$i]->jumlah)){
                array_push($array, 0);
            } else {
                array_push($array, $data[$i]->jumlah);
            }
        }
        // foreach($data as $row){
        //     array_push($array, $row->jumlah);
        // }

        if($from == null){
            echo json_encode($array);
        } else {
            return json_encode($array);
        }


    }
}