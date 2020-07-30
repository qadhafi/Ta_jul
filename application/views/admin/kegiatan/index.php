<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('kegiatan/create/') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah kegiatan</a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th width="78">Tanggal</th>
                                <th width="160">Nama Kegiatan</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1 ; foreach($kegiatan as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  $row->tanggal ?></td>
                                    <td><?=  $row->nama_kegiatan ?></td>
                                    <td>
                                        <?php if(strlen($row->deskripsi) > 240) : ?>
                                            <?= strip_tags(substr($row->deskripsi, 0, 240)) ?> <a href="<?= base_url('kegiatan/show/'.$row->id_kegiatan) ?>">Read More...</a>
                                        <?php else : ?>
                                            <?= strip_tags($row->deskripsi) ?>
                                        <?php endif ?>
                                    </td>
                                    
                                    <td class="image-td">
                                    <?php if($row->foto != null | $row->foto != ''): ?>
                                        <img src="<?=  base_url('foto/small/'.$row->foto) ?>">
                                    <?php else : ?>
                                        <img src="<?=  base_url('foto/small/no-image.png') ?>">
                                    <?php endif ?>
                                     </td>
                
                                    <td>
                                        <form action="<?= base_url('kegiatan/delete/'.$row->id_kegiatan) ?>" method="post">
                                            <ul class="d-flex justify-content-center"> 
                                                <li class="mr-3"><a href="<?= base_url('kegiatan/kehadiran/'. $row->id_kegiatan) ?>" class="text-success" title="Peserta Hadir"><i class="fa fa-users"></i></a></li>
                                                <li class="mr-3"><a href="<?= base_url('kegiatan/show/'.$row->id_kegiatan) ?>" class="text-info" title="Detail kegiatan"><i class="fa fa-eye"></i></a></li>                                                  
                                                <li class="mr-3"><a href="<?= base_url('kegiatan/edit/'.$row->id_kegiatan) ?>" class="text-secondary" title="Edit kegiatan"><i class="fa fa-edit"></i></a></li>
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