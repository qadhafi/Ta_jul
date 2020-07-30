
<div class="row">
    <div class="col-md-12 mb-4">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <table class="table mb-3">
                    <tr>
                        <td>Nama Pernikahan</td>
                        <td>:</td>
                        <td><?= $pernikahan->nama_pernikahan ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pernikahan</td>
                        <td>:</td>
                        <td><?= $pernikahan->tanggal_pernikahan ?></td>
                    </tr>
                    <tr>
                        <td>Lokasi Pernikahan</td>
                        <td>:</td>
                        <td><?= $pernikahan->lokasi_pernikahan ?></td>
                    </tr>
                    <tr>
                        <td>Pendeta</td>
                        <td>:</td>
                        <td><?= $this->default_model->getPendeta($pernikahan->id_pendeta) ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= $pernikahan->keterangan ?></td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Mempelai Pria</h4>

                <?php if($mempelai_pria == null) : ?>
                    <p>Data Mempelai Pria tidak tersedia</p>
                <?php else : ?>
                    <div class="text-center">
                        <?php if($mempelai_pria->foto != null || $mempelai_pria->foto != '') : ?>
                            <img src="<?= base_url('foto/'.$mempelai_pria->foto) ?>" alt="<?= $mempelai_pria->foto ?>" class="img-fluid img-thumbnail img-mempelai">
                        <?php else : ?>
                            <img src="<?= base_url('foto/default.jpg') ?>" alt="no-photo" class="img-fluid img-thumbnail img-mempelai">
                        <?php endif ?>
                    </div>

                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $mempelai_pria->nama ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $mempelai_pria->tempat_lahir . ', ' . $mempelai_pria->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?= $mempelai_pria->pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><?= $orangtua_pria->nama_ayah ?></td>                            
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= $orangtua_pria->nama_ibu ?></td>                            
                        </tr>
                        
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Mempelai Wanita</h4>

                <?php if($mempelai_wanita == null) : ?>
                    <p>Data Mempelai Wanita tidak tersedia</p>
                <?php else : ?>
                <div class="text-center">
                    <?php if($mempelai_wanita->foto != null || $mempelai_wanita->foto != '') : ?>
                        <img src="<?= base_url('foto/'.$mempelai_wanita->foto) ?>" alt="<?= $mempelai_wanita->foto ?>" class="img-fluid img-thumbnail img-mempelai">
                    <?php else : ?>
                        <img src="<?= base_url('foto/default.jpg') ?>" alt="no-photo" class="img-fluid img-thumbnail">
                    <?php endif ?>
                </div>

                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $mempelai_wanita->nama ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $mempelai_wanita->tempat_lahir . ', ' . $mempelai_wanita->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?= $mempelai_wanita->pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><?= $orangtua_wanita->nama_ayah ?></td>                            
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= $orangtua_wanita->nama_ibu ?></td>                            
                        </tr>
                        
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <a href="<?= base_url('pernikahan/mempelai/edit/'. $pernikahan->id_pernikahan) ?>" class="btn btn-secondary btn-sm">Ubah Atau Tambah Mempelai</a>
    </div>
</div>