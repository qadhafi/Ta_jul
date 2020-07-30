<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('kehadiran/create/'.$kegiatan->id_kegiatan) ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Peserta Kegiatan</a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Tanggal Daftar</th>
                                <th>Status Kehadiran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($kehadiran as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  $row->nama ?></td>
                                    <td><?=  $row->tanggal_daftar ?></td>
                                    <td><span class="badge <?= ($row->status == '1') ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == '1') ? 'Dikonfirmasi' : 'Belum dikonfirmasi' ?></span></td>                                   
                                    <td>
                                        <form action="<?= base_url('kehadiran/delete/'.$row->id_kehadiran) ?>" method="post">
                                            <ul class="d-flex justify-content-center">
                                                <?php if($row->status == 0) : ?>                                            
                                                    <li class="mr-3"><a href="<?= base_url('kehadiran/update/'.$row->id_kehadiran) ?>" class="text-success" title="Konfirmasi Hadir" onclick="return confirm('Yakin akan melakukan konfirmasi hadir?')"><i class="fa fa-check"></i></a></li>
                                                <?php else : ?>
                                                    <li class="mr-3"><a href="<?= base_url('kehadiran/update/'.$row->id_kehadiran) ?>" class="text-danger" title="Konfirmasi Tidak Hadir" onclick="return confirm('Yakin akan melakukan membatalkan konfirmasi hadir?')"><i class="fa fa-times"></i></a></li>
                                                <?php endif ?>
                                                <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')" ><i class="fa fa-trash"></i></button></li>
                                            </ul>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>