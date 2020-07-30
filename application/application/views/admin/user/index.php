<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('user/create/'. $type) ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1 ; foreach($data as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  $row->nama ?></td>
                                    <td><?=  $row->jenis_kelamin ?></td>
                                    <td><?=  $row->no_telp ?></td>
                                    <td><?=  $row->email ?></td>
                                    <td>
                                        <form action="<?= base_url('user/delete/'.$row->id_user) ?>" method="post">
                                            <ul class="d-flex justify-content-center"> 
                                                <li class="mr-3"><a href="<?= base_url('user/profile/'.$row->id_user.'/'.$type) ?>" class="text-info" title="Detail data"><i class="fa fa-eye"></i></a></li>                                                  
                                                <li class="mr-3"><a href="<?= base_url('user/edit/'.$row->id_user.'/'.$type) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
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
