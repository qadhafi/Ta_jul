<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url('aktivitas/tambah_konseling') ?>" class="btn btn-primary btn-sm">Tambah Konseling</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <?php if(count($konseling) == 0) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Anda belum melakukan konseling apapun.</p>
                </div>
            </div>
        </div>
    </div>
    <?php else : ?>

    <?php foreach($konseling as $row) : ?>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?= $row->subjek ?></h4>
                        <div class="jemaat-timeline-area">
                            <div class="timeline-task">
                                <div class="icon bg1">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Anda</h4>
                                    <span class="time"><i class="ti-time"></i><?= $row->tanggal_posting ?></span>
                                </div>
                                <?= $row->pembahasan ?>
                            </div>
                            <?php $respon = $this->default_model->getAllResponse($row->id_konseling); ?>
                            <?php if(!$respon) : ?>
                                <div class="timeline-task">
                                    <div class="icon bg-secondary">
                                        <i class="fa fa-question"></i>
                                    </div>
                                    <div class="tm-title">
                                        <h4>Unknown</h4>
                                        <span class="time"><i class="ti-time"></i>0000-00-00</span>
                                    </div>
                                    <p>Mohon menunggu balasan dari pendeta.</p>
                                </div>
                            <?php else : ?>
                                <?php
                                foreach($respon as $response): ?>
                                    <div class="timeline-task">
                                        <div class="icon bg2">
                                            <i class="fa fa-user-tie"></i>
                                        </div>
                                        <div class="tm-title">
                                            <h4>Pendeta <?= $this->default_model->getPendeta($response->id_pendeta) ?></h4>
                                            <span class="time"><i class="ti-time"></i><?= $response->tanggal_respon ?></span>
                                        </div>
                                        <?= $response->respon ?>
                                    
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <?php endif ?>
</div>