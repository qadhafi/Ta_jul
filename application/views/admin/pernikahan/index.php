<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>         
                <div class="row">
                    <div class="d-inline mr-2">
                        <a href="<?= base_url('pernikahan/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                    </div>                
                    <div class="d-inline">
                        <a href="<?= base_url('pernikahan/print') ?>" target="_blank" class="btn btn-outline-primary btn-sm"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>     
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama Pernikahan</th>
                                <th width="65">Tanggal</th>
                                <th>Lokasi</th>
                                <th>Pendeta</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($pernikahan as $key => $row) : ?>                            
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->nama_pernikahan ?></td>
                                    <td><?= $row->tanggal_pernikahan ?></td>
                                    <td><?= $row->lokasi_pernikahan ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><span class="badge <?= ($row->status == '1') ? 'badge-success' : 'badge-danger' ?>"><?= ($row->status == '1') ? 'Sukses' : 'Belum Terlaksana' ?></span></td>                                                                   
                                    <td><?= $row->keterangan ?></td>         
                                    <td>
                                        <form action="<?= base_url('pernikahan/delete/'.$row->id_pernikahan) ?>" method="post">
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="<?= base_url('pernikahan/detail/'.$row->id_pernikahan) ?>" class="text-info" title="Detail data"><i class="fa fa-ring"></i></a></li>
                                                <li class="mr-3"><a href="<?= base_url('pernikahan/edit/'.$row->id_pernikahan) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
                                                <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')" ><i class="fa fa-trash"></i></button></li>
                                            </ul>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>