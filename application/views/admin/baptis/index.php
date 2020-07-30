<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <div class="row">
                    <div class="d-inline mr-2">
                        <a href="<?= base_url('baptis/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                    </div>
                    <div class="d-inline">
                        <a href="<?= base_url('baptis/print') ?>" target="_blank" class="btn btn-outline-primary btn-sm"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama Jemaat</th>
                                <th>Tanggal</th>
                                <th>Jenis Baptis</th>
                                <th>Pendeta</th>
                                <th>Status</th>
                                <td>Aksi</td>
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
                                    <td>
                                        <form action="<?= base_url('baptis/delete/'.$row->id_baptis) ?>" method="post">
                                            <ul class="d-flex justify-content-center">                                                  
                                                <li class="mr-3"><a href="<?= base_url('baptis/edit/'.$row->id_baptis) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
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