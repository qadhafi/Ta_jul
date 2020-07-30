
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4><?= $artikel->judul ?></h4>
                    </div>

                    <div class="cover-image mb-3">
                        <?php if($artikel->cover != null | $artikel->cover != ''): ?>
                            <img src="<?=  base_url('cover/'.$artikel->cover) ?>" class="img-fluid w-100">
                        <?php else : ?>
                            <img src="<?=  base_url('foto/small/no-image.png') ?>" class="img-fluid w-100">
                        <?php endif ?> 
                    </div>
                    <p><strong>Diposting: <?= $artikel->tanggal ?></strong></p>
                    <div class="content-article mt-3 mb-3">
                        <?= $artikel->isi ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Artikel Lain</h5>
                    </div>
                    
                    <div class="list-group">
                        <?php foreach($random_artikel as $list) : ?>
                            <a href="<?= base_url('listing/read/' .$list->id_artikel) ?>" class="list-group-item list-group-item-action"><?= $list->judul ?></a>
                        <?php endforeach ?>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

