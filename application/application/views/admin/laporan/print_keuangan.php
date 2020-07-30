<style>

* {
    font-family: "Arial";
}
/* .print-header {
    display: flex;
    align-items: center;
    font-family: "Arial";
} */

.print-header .left,
.print-header .right {
    display:inline-block;
}
.print-header p{
    line-height:1.1em;
    font-family: "Arial";
}

.img-box {
    padding: 0 40px;
}

table {
    width:100%;
}

table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}

</style>

<div class="container">
    <div class="print-header">
        <div class="left">
            <div class="img-box">

                <img src="<?php echo FCPATH . '/assets/img/gky-logo.png' ?>" alt="gky-logo" width="100">
            </div>
        </div>
        <div class="right">
            <h4>Gereja Kristus Yesus Kuta Bali</h4>
            <p>Jl. Dewi Sri II No.22b, Legian, Kuta, Kabupaten Badung, Bali 80361</p>
            <p>No. Telp: 0819-1657-0789 | Email: kuta-bali@gky.or.id</p>
        </div>
    </div>
    <hr>
    <div class="print-content">
        <h4>Data Keuangan Jemaat GKY Kuta</h4>
    </div>
    <table id="dataTable" class="text-center table">
        <thead class="bg-light text-capitalize">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Tipe</th>
                <th>Keterangan</th>          
            </tr>
        </thead>
        <tbody>
            <?php $pemasukan = 0; $pengeluaran = 0; ?>
            <?php $i = 1; foreach($keuangan as $key => $row) : ?>
            
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?=  $row->tanggal ?></td>
                    <td>Rp. <?=  number_format($row->jumlah_uang) ?></td>
                    <td><span class="badge <?= ($row->tipe == 'pemasukan') ? 'badge-success' : 'badge-danger' ?>"><?= $row->tipe ?></span></td>                                   
                    <?php if($row->tipe == 'pemasukan') {
                        $pemasukan += $row->jumlah_uang;
                    } else {
                        $pengeluaran += $row->jumlah_uang;
                    } ?>
                    <td><?=  $row->keterangan ?></td>                    
                </tr>
            
            <?php endforeach; ?>                        
            
        </tbody>
    </table>
    <p>Total Pemasukan = Rp. <?= number_format($pemasukan) ?></p>
    <p>Total Pengeluaran = Rp. <?= number_format($pengeluaran) ?></p>
    <p>Saldo Akhir Bulan <?= (isset($_GET['month'])) ? getMonthName($_GET['month']) .' '. $_GET['year'] : date('F') . ' ' . date('Y')  ?>  = <?= number_format($pemasukan - $pengeluaran) ?> </p>
</div>