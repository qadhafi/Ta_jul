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
        <h4>Data Pernikahan Jemaat GKY Kuta</h4>
    </div>
    
    
        <?php $i = 1; foreach($pernikahan as $key => $row) : ?>   
        <table style="margin-bottom:30px">
            <tr>
                <th>No</th>
                <td>:</td>
                <td><?= $i++ ?></td>
            </tr>
            <tr>
                <th>Nama Pernikahan</th>
                <td>:</td>
                <td><?= $row->nama_pernikahan ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>:</td>
                <td><?= $row->tanggal_pernikahan ?></td>
            </tr>
            <tr>
                <th>Mempelai Pria</th>
                <td>:</td>
                <td><?= $this->default_model->getMempelai($row->id_pernikahan, 'pria'); ?></td>
            </tr>
            <tr>
                <th>Mempelai Wanita</th>
                <td>:</td>
                <td><?= $this->default_model->getMempelai($row->id_pernikahan, 'wanita'); ?></td>
            </tr>
            <tr>        
                <th>Lokasi</th>
                <td>:</td>
                <td><?= $row->lokasi_pernikahan ?></td>
            </tr>
            <tr>        
                <th>Pendeta</th>
                <td>:</td>
                <td><?= $row->nama ?></td>
            </tr>
            <tr>        
                <th>Status</th>
                <td>:</td>
                <td><?= ($row->status == '1') ? 'Sukses' : 'Belum Terlaksana' ?></td>
            </tr>
            <tr>        
                <th>Keterangan</th>
                <td>:</td>
                <td><?= $row->keterangan ?></td>
            </tr>   
        </table>            
        <?php endforeach ?>
        
    
</div>