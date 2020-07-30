<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('jumlah_kehadiran_jemaat/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($kehadiran_jemaat as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  getMonthName($row->bulan) ?></td>
                                    <td><?=  $row->tahun ?></td>
                                    <td><?=  $row->jumlah ?></td>                                    
                                    <td>
                                        <form action="<?= base_url('jumlah_kehadiran_jemaat/delete/'.$row->id) ?>" method="post">
                                            <ul class="d-flex justify-content-center">                                                  
                                                <li class="mr-3"><a href="<?= base_url('jumlah_kehadiran_jemaat/edit/'.$row->id) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
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