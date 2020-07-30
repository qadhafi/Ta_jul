
<div class="row">
    <div class="col-md-8">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id_inventaris) ? form_hidden('id_inventaris', $input->id_inventaris) : '' ?>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="<?= $input->nama_barang ?>" placeholder="Nama barang inventaris">
                    </div>
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="<?= $input->jumlah ?>" placeholder="Masukan jumlah">
                    </div>
                    <div class="form-group">
                        <label>Status Barang</label>
                        <select name="status_barang" class="custom-select">
                            <option value=""> - Pilih Kondisi Barang - </option>
                            <option value="1" <?= ($input->status_barang == '1') ? 'selected' : '' ?>>Bagus</option>
                            <option value="0" <?= ($input->status_barang == '0') ? 'selected' : '' ?>>Rusak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="text" name="ruangan" class="form-control" value="<?= $input->ruangan ?>" placeholder="Masukan ruangan">
                    </div>
                                 
                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>