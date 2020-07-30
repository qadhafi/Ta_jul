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
        <h4>Data Baptis Jemaat GKY Kuta</h4>
    </div>
    <table id="dataTable" class="text-center table">
        <thead class="bg-light text-capitalize">
            <tr>
                <th>No</th>
                <th>Nama Jemaat</th>
                <th>Tgl Baptis</th>
                <th>Jenis Baptis</th>
                <th>Pendeta</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($baptis as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->jenis_baptis ?></td>
                    <td><?= $this->default_model->getPendeta($row->id_pendeta) ?></td>
                    <td><span class="badge <?= ($row->status == '1') ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == '1') ? 'Berhasil' : 'Batal' ?></span></td>            
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>