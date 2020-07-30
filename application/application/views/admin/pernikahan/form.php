
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id_pernikahan) ? form_hidden('id_pernikahan', $input->id_pernikahan) : '' ?>

                    <div class="form-group">
                        <label>Nama Pernikahan</label>    
                        <input type="text" name="nama_pernikahan" class="form-control" placeholder="Masukan nama pernikahan" value="<?= $input->nama_pernikahan ?>">
                    </div>                                                  
                    <div class="form-group">
                        <label>Tanggal Pernikahan</label>
                        <input type="text" name="tanggal_pernikahan" class="form-control datepicker2" value="<?= $input->tanggal_pernikahan ?>" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Lokasi Pernikahan</label>    
                        <input type="text" name="lokasi_pernikahan" class="form-control" placeholder="Masukan Lokasi Pernikahan" value="<?= $input->lokasi_pernikahan ?>">
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
                            <option value=""> - Pilih Status pernikahan - </option>
                            <option value="1" <?= ($input->status == '1') ? 'selected' : '' ?>>Sukses</option>
                            <option value="0" <?= ($input->status == '0') ? 'selected' : '' ?>>Belum Terlaksana</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>    
                        <textarea name="keterangan" class="form-control" placeholder="Masukan Keterangan"><?= $input->keterangan ?></textarea>
                    </div>
                              

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>