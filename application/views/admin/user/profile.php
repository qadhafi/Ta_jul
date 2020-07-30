<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
       
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $user->nama ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td><?= $user->tempat_lahir . ', ' . $user->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $user->jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td>:</td>
                                <td><?= $user->no_telp ?></td>
                            </tr>
                            <tr>
                                <td>Suku</td>
                                <td>:</td>
                                <td><?= $user->suku ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td>:</td>
                                <td><?= $user->pendidikan ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><?= $user->pekerjaan ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $user->email ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $user->alamat ?></td>
                            </tr>
                            <tr>
                                <td>username</td>
                                <td>:</td>
                                <td><?= $user->username ?></td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>:</td>
                                <td><?= $user->level ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>:</td>
                                <td><?= $user->tanggal_daftar ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <?php if($user->foto != null || $user->foto != '') : ?>
                            <img src="<?= base_url('foto/'.$user->foto) ?>" alt="<?= $user->foto ?>" class="img-fluid img-thumbnail">
                        <?php else : ?>
                            <img src="<?= base_url('foto/default.jpg') ?>" alt="no-photo" class="img-fluid img-thumbnail">
                        <?php endif ?>
                    </div>
                </div>
                <a href="<?= base_url('user/edit/'.$user->id_user.'/'. $type) ?>" class="btn btn-sm btn-secondary mb-3"><i class="fa fa-cog"></i> Edit <?= $type ?></a>
               
            </div>
        </div>
    </div>
</div>