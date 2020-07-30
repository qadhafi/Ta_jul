<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">                
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?= $title ?></h4>
                    <hr>
                    <form action="<?= base_url('aktivitas/tambah_konseling') ?>" method="post">
                        <input type="hidden" name="tanggal_posting" value="<?= date('Y-m-d') ?>">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subjek" class="form-control" placeholder="Masukan Subject Konseling" required value="<?= $input->subjek ?>">
                        </div>
                        <div class="form-group">
                            <label>Pembahasan</label>
                            <textarea name="pembahasan" class="form-control" placeholder="Ceritakan tentang masalah atau hal-hal yang ingin anda sampaikan"><?= $input->pembahasan ?></textarea>
                        </div>
                                     
                        <div class="form-group">
                            <input type="submit" class="btn btn-success float-right" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>