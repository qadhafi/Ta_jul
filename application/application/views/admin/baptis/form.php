
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id_baptis) ? form_hidden('id_baptis', $input->id_baptis) : '' ?>

                    <div class="form-group">
                        <label>Nama Jemaat</label>
                        <select name="id_user" class="form-control mySelect" id="select_jemaat">
                            <option value=""> - Pilih Jemaat - </option>
                            <?php foreach($jemaat as $option) : ?>
                                <option value="<?= $option->id_user ?>" <?= ($input->id_user == $option->id_user) ? 'selected' : '' ?>> <?= $option->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <input type="hidden" name="id_orangtua" class="id_orangtua" value="<?= $input->id_orangtua ?>">
                        <div class="col-md-6">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control nama_ayah" name="nama_ayah" value="<?= $input->nama_ayah ?>" <?= (!isset($type)) ? 'readonly' : ''  ?> placeholder="Nama Ayah">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control nama_ibu" name="nama_ibu" value="<?= $input->nama_ibu ?>" <?= (!isset($type)) ? 'readonly' : ''  ?> placeholder="Nama Ibu" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Baptis</label>
                        <select name="jenis_baptis" class="custom-select">
                            <option value=""> - Pilih Jenis Baptis - </option>
                            <option value="Baptis Anak" <?= ($input->jenis_baptis == 'Baptis Anak') ? 'selected' : '' ?>>Baptis Anak</option>
                            <option value="Baptis Dewasa" <?= ($input->jenis_baptis == 'Baptis Dewasa') ? 'selected' : '' ?>>Baptis Dewasa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control datepicker2" value="<?= $input->tanggal ?>" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Pendeta</label>
                        <select name="id_pendeta" class="custom-select mySelect">
                            <option value=""> - Pilih pendeta - </option>
                            <?php foreach($pendeta as $option) : ?>
                                <option value="<?= $option->id_user ?>" <?= ($input->id_pendeta == $option->id_user) ? 'selected' : '' ?>> <?= $option->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="custom-select">
                            <option value=""> - Pilih Status Baptis - </option>
                            <option value="1" <?= ($input->status == '1') ? 'selected' : '' ?>>Berhasil</option>
                            <option value="0" <?= ($input->status == '0') ? 'selected' : '' ?>>Batal</option>
                        </select>
                    </div>
                              

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>