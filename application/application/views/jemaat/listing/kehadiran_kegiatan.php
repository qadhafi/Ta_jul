<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?= $title ?></h4>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <td>Nama Kegiatan</td>
                            <td>Tanggal Daftar</td>
                            <td>Tanggal Kegiatan</td>
                            <td>Status Kehadiran</td>
                            <td>Aksi</td>
                        </tr>
                        <?php $no = 1; foreach($kehadiran as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_kegiatan ?></td>
                                <td><?= $row->tanggal_daftar ?></td>
                                <td><?= $row->tanggal_kegiatan ?></td>
                                <td><span class="badge <?= ($row->status == '1') ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == '1') ? 'Dikonfirmasi' : 'Belum dikonfirmasi' ?></span></td>
                                <td>
                                    <form action="<?= base_url('aktivitas/undo_register/'.$row->id_kehadiran) ?>" method="post">
                                        <ul class="d-flex">                                             
                                            <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan membatalkan mengikuti kegiatan?')" ><i class="fa fa-trash"></i></button></li>
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>