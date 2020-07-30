
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post" enctype="multipart/form-data">

                <?= isset($input->id_kegiatan) ? form_hidden('id_kegiatan', $input->id_kegiatan) : '' ?>

           
                        
                    <div class="form-group">
                        <label>Judul kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?= $input->nama_kegiatan ?>" placeholder="Nama kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control datepicker2" value="<?= $input->tanggal ?>" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="myeditor"><?= $input->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>