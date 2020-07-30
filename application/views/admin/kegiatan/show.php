<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-center mb-3">
                            <?php if($kegiatan->foto != null || $kegiatan->foto != '') : ?>
                                <img src="<?= base_url('foto/'.$kegiatan->foto) ?>" alt="<?= $kegiatan->foto ?>" class="img-fluid">
                            <?php else : ?>
                                <img src="<?= base_url('foto/no-image.png') ?>" alt="no-photo" class="img-fluid img-thumbnail">
                            <?php endif ?>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?= $kegiatan->tanggal ?></td>
                            </tr>
                            <tr>
                                <td>deskripsi</td>
                                <td>:</td>
                                <td><?= $kegiatan->deskripsi ?></td>
                            </tr>
                            
                           
                        </table>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <a href="<?= base_url('kegiatan/edit/'.$kegiatan->id_kegiatan) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fa fa-cog"></i> Edit </a>
               
            </div>
        </div>
    </div>
</div>