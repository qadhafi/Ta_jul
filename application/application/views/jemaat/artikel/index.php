<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Artikel Terbaru</h4>
                    <div class="letest-news mt-5">
                        <?php foreach($articles as $artikel) : ?>
                        <div class="single-post mb-xs-40 mb-sm-40 jemaat-post">
                            <div class="lts-thumb jemaat-thumb">
                                <?php if($artikel->cover != null | $artikel->cover != ''): ?>
                                    <img src="<?=  base_url('cover/small/'.$artikel->cover) ?>">
                                <?php else : ?>
                                    <img src="<?=  base_url('foto/small/no-image.png') ?>">
                                <?php endif ?>                                
                            </div>
                            <div class="lts-content">
                                <span><?= $artikel->tanggal ?></span>
                                <h2><a href="<?= base_url('listing/read/'.$artikel->id_artikel) ?>"><?= $artikel->judul ?></a></h2>
                                <?php if(strlen($artikel->isi) > 520) : ?>
                                        <?= strip_tags(substr($artikel->isi, 0, 520)) ?> <a href="<?= base_url('listing/read/'.$artikel->id_artikel) ?>">Read More...</a>
                                    <?php else : ?>
                                        <?= strip_tags($artikel->isi) ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php endforeach ?>                        
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>