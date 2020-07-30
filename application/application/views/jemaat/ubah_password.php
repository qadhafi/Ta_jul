<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">                
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?= $title ?></h4>
                    <hr>
                    <form action="<?= base_url('ubah_password/update') ?>" method="post">
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label>Re-type Password</label>
                            <input type="password" name="passconf" class="form-control" placeholder="Masukan Re-type Password" required>
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