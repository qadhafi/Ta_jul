<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-md-12">
            <h4>Data <?= $title ?></h4>
        </div>
    </div>
    <div class="row">
        <?php foreach($events as $kegiatan) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card card-bordered kegiatan-card">
                <?php if($kegiatan->foto != null | $kegiatan->foto != ''): ?>
                    <img class="card-img-top img-fluid jemaat-kegiatan-img" src="<?= base_url('foto/small/'.$kegiatan->foto) ?>" alt="img">
                <?php else : ?>
                    <img class="card-img-top img-fluid jemaat-kegiatan-img" src="<?= base_url('foto/small/no-image.png') ?>" alt="img">
                <?php endif ?>
                <div class="card-body">
                    <h5 class="title"><?= $kegiatan->nama_kegiatan ?></h5>
                    <div class="card-text mb-3 jemaat-font">
                        <?php if(strlen($kegiatan->deskripsi) > 240) : ?>
                            <?= strip_tags(substr($kegiatan->deskripsi, 0, 240)) ?>...
                        <?php else : ?>
                            <?= strip_tags($kegiatan->deskripsi) ?>
                        <?php endif ?>
                    </div>
                    <div class="d-inline-block">
                        <a href="<?= base_url('listing/detail_kegiatan/'.$kegiatan->id_kegiatan) ?>" class="btn btn-primary kegiatan-btn">Detail</a> 
                    </div>
                    <div class="d-inline-block ml-2">
                        <?php if(!isset($this->session->username)) : ?>
                            <a href="<?= base_url('login') ?>" class="btn btn-outline-primary">Daftar<a>
                        <?php else : ?>
                            <a href="<?= base_url('aktivitas/register_kegiatan/'.$kegiatan->id_kegiatan) ?>" onclick="return confirm('Apakah anda yakin akan mengikuti kegiatan ini?')" class="btn btn-outline-primary">Daftar<a>      
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
