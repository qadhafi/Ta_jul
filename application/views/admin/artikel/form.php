
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post" enctype="multipart/form-data">

                    <?= isset($input->id_artikel) ? form_hidden('id_artikel', $input->id_artikel) : '' ?>

           
                        
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" value="<?= $input->judul ?>" placeholder="Judul artikel">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" value="<?= $input->tanggal ?>" placeholder="Tanggal" readonly>
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" class="form-control" id="myeditor"><?= $input->isi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" name="cover" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>