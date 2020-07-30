<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $input->nama ?>" placeholder="Nama">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea type="text" name="keterangan" class="form-control" value="<?= $input->keterangan ?>" placeholder="Keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>