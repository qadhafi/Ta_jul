
<div class="row">
    <div class="col-md-12">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post" enctype="multipart/form-data">

                <?= isset($input->id_galeri) ? form_hidden('id_galeri', $input->id_galeri) : '' ?>

           
                        
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" value="<?= $input->judul ?>" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" value="<?= $input->tanggal ?>" placeholder="Tanggal" readonly>
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