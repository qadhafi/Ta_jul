<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('inventaris/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Kondisi Bagus</th>
                                <th>Kondisi Rusak</th>
                                <th>Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($inventaris as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->nama_barang ?></td>
                                    <td>
                                        <?= $row->jumlah_bagus + $row->jumlah_rusak ?>
                                    </td>
                                    <td><?= $row->jumlah_bagus ?></td>
                                    <td><?= $row->jumlah_rusak ?></td>
                                    <td><?= $row->ruangan ?></td>
                                    <td>
                                        <form action="<?= base_url('inventaris/delete/' . $row->id_inventaris) ?>" method="post">
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="<?= base_url('inventaris/edit/' . $row->id_inventaris) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
                                                <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')"><i class="fa fa-trash"></i></button></li>
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