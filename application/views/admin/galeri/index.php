<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <a href="<?= base_url('galeri/create/') ?>" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> Tambah galeri Foto</a>
                <hr>
                <div class="row">
                    <?php foreach($galeri as $row) : ?>
                    <div class="col-md-4 mb-4 bordered">
                        <p class="mb-3"><?= $row->judul ?></p>
                        
                        
                        <div class="popup-gallery image-gallery">
                            <a href="<?= base_url('foto/'. $row->foto ) ?>" title="<?= $row->judul ?>"><img src="<?= base_url('foto/small/'. $row->foto ) ?>"></a>
                        </div>
                        <div class="button-image">
                            <form action="<?= base_url('galeri/delete/'.$row->id_galeri) ?>" method="post">
                                <ul class="d-flex justify-content-center">
                                    <li class="mr-3"><a href="<?= base_url('galeri/edit/'.$row->id_galeri) ?>" class="text-dark"><i class="fa fa-edit"></i> Edit </a></li>
                                    
                                    <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')" ><i class="fa fa-trash"></i> Hapus</button></li>
                                </ul>
                            </form>
                        </div>                                                                                 
                        
                    </div>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
    </div>
</div>