<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Galeri Foto</h4>
                    <div class="row">
                        <?php foreach($galleries as $galeri) : ?>
                        <div class="col-md-3 mb-5">
                            <a href="<?= base_url('foto/'. $galeri->foto ) ?>" title="<?= $galeri->judul ?>"><img src="<?= base_url('foto/small/'. $galeri->foto ) ?>" class="jemaat-galeri" alt="<?= $galeri->judul ?>"></a>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>