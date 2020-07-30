
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post" enctype="multipart/form-data">

                <?= isset($input->id_user) ? form_hidden('id_user', $input->id_user) : '' ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama <?= $type ?></label>
                                <input type="text" name="nama" class="form-control" value="<?= $input->nama ?>" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                               
                                <select name="jenis_kelamin" class="custom-select">
                                    <option value=""> - Pilih Jenis Kelamin - </option>
                                    <option value="Laki - Laki" <?= ($input->jenis_kelamin == 'Laki - Laki') ? 'selected' : '' ?>>Laki - Laki</option>
                                    <option value="perempuan" <?= ($input->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="Masukan No Telp" value="<?= $input->no_telp ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" value="<?= $input->tempat_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir" class="form-control datepicker" placeholder="Masukan Tanggal Lahir" value="<?= $input->tanggal_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email" value="<?= $input->email ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suku</label>
                                <input type="text" name="suku" class="form-control" placeholder="Masukan Suku" value="<?= $input->suku ?>">
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" placeholder="Masukan pendidikan" value="<?= $input->pendidikan ?>">
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan pekerjaan" value="<?= $input->pekerjaan ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"><?= $input->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $input->username ?>">
                    </div>
                    <?php if(!isset($input->id_user)) : ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
                    </div>
                    <div class="form-group">
                        <label>Re-type Password</label>
                        <input type="password" name="passconf" class="form-control" placeholder="Masukan Re-type Password" required>
                    </div>
                    <?php endif ?>
                    
                    <?php if($type == 'jemaat') { ?>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" value="jemaat" name="level" class="form-control" readonly>
                        
                    </div>
                    <?php } else if ($type == 'pendeta') { ?>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" value="pendeta" name="level" readonly class="form-control">
                        </div>
                    <?php } else if ($type == 'staff') { ?>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" value="staff" name="level" readonly class="form-control">
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" placeholder="Masukan Foto">
                    </div>

                    

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>