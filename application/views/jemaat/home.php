<div class="jumbotron jumbotron-fluid jemaat-banner mb-0">
    <div class="container">
        <h1 class="display-4 text-white"></h1>
        <p class="lead text-white mt-3"></p>
    </div>
</div>

<div class="container-fluid pt-5 pb-5 bg-white mb-5">
    <div class="container">
        <div class="row text-center pt-3 pb-5">
            <div class="col-md-12">
                <h3 class="text-center w-100 pb-3">About Us</h3>
                <div class="content-body">
                    <p>Selamat Datang di GKY Jemaat Kuta Bali. Gereja Kristus Yesus Jemaat Kuta Bali membangun website ini secara khusus sebagai wadah informasi dan komunikasi antara gereja dengan jemaat, maupun secara umum antara gereja dengan setiap pengunjung website ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Artikel Terbaru</h4>
                    <div class="letest-news mt-5">
                        <?php foreach ($articles as $artikel) : ?>
                            <div class="single-post mb-xs-40 mb-sm-40 jemaat-post">
                                <div class="lts-thumb jemaat-thumb">
                                    <?php if ($artikel->cover != null | $artikel->cover != '') : ?>
                                        <img src="<?= base_url('cover/small/' . $artikel->cover) ?>">
                                    <?php else : ?>
                                        <img src="<?= base_url('foto/small/no-image.png') ?>">
                                    <?php endif ?>
                                </div>
                                <div class="lts-content">
                                    <span><?= $artikel->tanggal ?></span>
                                    <h2><a href="<?= base_url('listing/read/' . $artikel->id_artikel) ?>"><?= $artikel->judul ?></a></h2>
                                    <?php if (strlen($artikel->isi) > 520) : ?>
                                        <?= strip_tags(substr($artikel->isi, 0, 520)) ?> <a href="<?= base_url('listing/read/' . $artikel->id_artikel) ?>">Read More...</a>
                                    <?php else : ?>
                                        <?= strip_tags($artikel->isi) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <a href="<?= base_url('listing/artikel') ?>">Lihat Semua Artikel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-md-12">
            <h4>Kegiatan Kami</h4>
        </div>
    </div>
    <div class="row">
        <?php foreach ($events as $kegiatan) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-bordered kegiatan-card">
                    <?php if ($kegiatan->foto != null | $kegiatan->foto != '') : ?>
                        <img class="card-img-top img-fluid jemaat-kegiatan-img" src="<?= base_url('foto/small/' . $kegiatan->foto) ?>" alt="img">
                    <?php else : ?>
                        <img class="card-img-top img-fluid jemaat-kegiatan-img" src="<?= base_url('foto/small/no-image.png') ?>" alt="img">
                    <?php endif ?>
                    <div class="card-body">
                        <h5 class="title"><?= $kegiatan->nama_kegiatan ?></h5>
                        <div class="card-text mb-3 jemaat-font">
                            <?php if (strlen($kegiatan->deskripsi) > 240) : ?>
                                <?= strip_tags(substr($kegiatan->deskripsi, 0, 240)) ?>...
                            <?php else : ?>
                                <?= strip_tags($kegiatan->deskripsi) ?>
                            <?php endif ?>
                        </div>
                        <div class="d-inline-block">
                            <a href="<?= base_url('listing/detail_kegiatan/' . $kegiatan->id_kegiatan) ?>" class="btn btn-primary kegiatan-btn">Detail</a>
                        </div>
                        <div class="d-inline-block ml-2">
                            <?php if (!isset($this->session->username)) : ?>
                                <a href="<?= base_url('login') ?>" class="btn btn-outline-primary">Daftar<a>
                                    <?php else : ?>
                                        <a href="<?= base_url('aktivitas/register_kegiatan/' . $kegiatan->id_kegiatan) ?>" onclick="return confirm('Apakah anda yakin akan mengikuti kegiatan ini?')" class="btn btn-outline-primary">Daftar<a>
                                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>