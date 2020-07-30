<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-center mb-3">
                            <?php if($artikel->cover != null || $artikel->cover != '') : ?>
                                <img src="<?= base_url('cover/'.$artikel->cover) ?>" alt="<?= $artikel->cover ?>" class="img-fluid">
                            <?php else : ?>
                                <img src="<?= base_url('foto/no-image.png') ?>" alt="no-photo" class="img-fluid img-thumbnail">
                            <?php endif ?>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?= $artikel->tanggal ?></td>
                            </tr>
                            <tr>
                                <td>Isi</td>
                                <td>:</td>
                                <td><?= $artikel->isi ?></td>
                            </tr>
                            
                           
                        </table>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <a href="<?= base_url('artikel/edit/'.$artikel->id_artikel) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fa fa-cog"></i> Edit </a>
               
            </div>
        </div>
    </div>
</div>