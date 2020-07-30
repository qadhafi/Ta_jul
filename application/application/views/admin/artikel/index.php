<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('artikel/create/') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Artikel</a>
                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th width="160">Judul</th>
                                <th width="78">Tanggal</th>
                                <th>Isi</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1 ; foreach($artikel as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  $row->judul ?></td>
                                    <td><?=  $row->tanggal ?></td>
                                    <td>
                                        <?php if(strlen($row->isi) > 240) : ?>
                                                <?= strip_tags(substr($row->isi, 0, 240)) ?> <a href="<?= base_url('artikel/show/'.$row->id_artikel) ?>">Read More...</a>
                                            <?php else : ?>
                                                <?= strip_tags($row->isi) ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="image-td">
                                    <?php if($row->cover != null | $row->cover != ''): ?>
                                        <img src="<?=  base_url('cover/small/'.$row->cover) ?>">
                                    <?php else : ?>
                                        <img src="<?=  base_url('foto/small/no-image.png') ?>">
                                    <?php endif ?>
                                     </td>
                
                                    <td>
                                        <form action="<?= base_url('artikel/delete/'.$row->id_artikel) ?>" method="post">
                                            <ul class="d-flex justify-content-center"> 
                                                <li class="mr-3"><a href="<?= base_url('artikel/show/'.$row->id_artikel) ?>" class="text-info" title="Detail Artikel"><i class="fa fa-eye"></i></a></li>                                                  
                                                <li class="mr-3"><a href="<?= base_url('artikel/edit/'.$row->id_artikel) ?>" class="text-secondary" title="Edit Artikel"><i class="fa fa-edit"></i></a></li>
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