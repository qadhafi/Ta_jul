
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <table class="table mb-3">
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
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= $pernikahan->keterangan ?></td>
                    </tr>
                </table>
                <h5>Masukan Mempelai</h5>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">
                    <div class="form-group">
                        <label>Nama Mempelai Pria</label>
                        <select name="id_user" class="form-control mySelect" id="select_jemaat">
                            <option value=""> - Pilih Jemaat - </option>
                            <?php foreach($jemaat_pria as $option) : ?>
                                <option value="<?= $option->id_user ?>" <?= ($input->id_user == $option->id_user) ? 'selected' : '' ?>> <?= $option->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <input type="hidden" value="pria" name="tipe_mempelai">
                   
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

                    <hr>
                    <div class="form-group">
                        <label>Nama Mempelai wanita</label>
                        <select name="id_user_wanita" class="form-control mySelect" id="select_jemaat_wanita">
                            <option value=""> - Pilih Jemaat - </option>
                            <?php foreach($jemaat_wanita as $option) : ?>
                                <option value="<?= $option->id_user ?>" <?= ($input->id_user_wanita == $option->id_user) ? 'selected' : '' ?>> <?= $option->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <input type="hidden" value="wanita" name="tipe_mempelai_wanita">

                    <div class="row mb-3">
                        <input type="hidden" name="id_orangtua_wanita" class="id_orangtua_wanita" value="<?= $input->id_orangtua_wanita ?>">
                        <div class="col-md-6">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control nama_ayah_wanita" name="nama_ayah_wanita" value="<?= $input->nama_ayah_wanita ?>" <?= (!isset($type)) ? 'readonly' : ''  ?> placeholder="Nama Ayah">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control nama_ibu_wanita" name="nama_ibu_wanita" value="<?= $input->nama_ibu_wanita ?>" <?= (!isset($type)) ? 'readonly' : ''  ?> placeholder="Nama Ibu" required>
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>