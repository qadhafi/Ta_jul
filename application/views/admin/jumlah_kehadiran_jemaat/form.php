
<div class="row">
    <div class="col-md-8">                
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <form action="<?= base_url($form_action) ?>" method="post">

                <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" required class="form-control">
                            <option value="">- Pilih Bulan -</option>
                            <?php foreach(getMonthList() as $month) : ?>
                                <option value="<?= $month['num'] ?>" <?= ($month['num'] == $input->bulan) ? 'selected' : '' ?>>                                    
                                    <?= $month['month'] ?>
                                </option>                                
                            <?php endforeach ?>                                                     
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" value="<?= $input->tahun ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="<?= $input->jumlah ?>" placeholder="Masukan jumlah">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>