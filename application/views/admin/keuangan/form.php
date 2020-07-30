
<div class="row">
    <div class="col-md-8">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id_keuangan) ? form_hidden('id_keuangan', $input->id_keuangan) : '' ?>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" class="form-control datepicker" value="<?= $input->tanggal ?>" placeholder="Nama barang keuangan">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Uang</label>
                        <input type="number" name="jumlah_uang" class="form-control" value="<?= $input->jumlah_uang ?>" placeholder="Masukan jumlah">
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <select name="tipe" class="custom-select">
                            <option value=""> - Pilih Tipe - </option>
                            <option value="pemasukan" <?= ($input->tipe == 'pemasukan') ? 'selected' : '' ?>>Pemasukan</option>
                            <option value="pengeluaran" <?= ($input->tipe == 'pengeluaran') ? 'selected' : '' ?>>Pengeluaran</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"><?= $input->keterangan ?></textarea>
                    </div>
                                 
                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>