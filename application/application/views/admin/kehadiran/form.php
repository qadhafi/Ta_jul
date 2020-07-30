
<div class="row">
    <div class="col-md-8">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id_kehadiran) ? form_hidden('id_kehadiran', $input->id_kehadiran) : '' ?>

                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="hidden" name="id_kegiatan" value="<?= $kegiatan->id_kegiatan ?>">
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?= $kegiatan->nama_kegiatan ?>" placeholder="Masukan ruangan" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Jemaat</label>
                        <select name="id_user" class="form-control mySelect" id="select_jemaat">
                            <option value=""> - Pilih Jemaat - </option>
                            <?php foreach($jemaat as $option) : ?>
                                <option value="<?= $option->id_user ?>" <?= ($input->id_user == $option->id_user) ? 'selected' : '' ?>> <?= $option->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Daftar</label>
                        <input type="text" name="tanggal_daftar" class="form-control datepicker2" value="<?= $input->tanggal_daftar ?>" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Status Kehadiran</label>
                        <select name="status" class="custom-select">
                            <option value=""> - Pilih Kehadiran - </option>
                            <option value="1" <?= ($input->status == '1') ? 'selected' : '' ?>>Dikonfirmasi</option>
                            <option value="0" <?= ($input->status == '0') ? 'selected' : '' ?>>Belum dikonfirmasi</option>
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