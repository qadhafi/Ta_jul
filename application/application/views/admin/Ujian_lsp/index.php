<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <div class="row">
                    <div class="d-inline mr-2">
                        <a href="<?= base_url('Ujian_lsp/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                    </div>
                </div>
                <hr>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1;
                            foreach ($Ujian_lsp as $key => $row) : ?>

                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->keterangan ?></td>

                                    <td>
                                        <form action="<?= base_url('Ujian_lsp/delete/' . $row->id) ?>" method="post">
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="<?= base_url('Ujian_lsp/edit/' . $row->id) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
                                                <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')"><i class="fa fa-trash"></i></button></li>
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