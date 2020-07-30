<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="header-title">Total Jemaat</h4>
                <hr>
                <!-- <div class="icon-badge"><i class="fa fa-user"></i></div> -->
                <p class="text-badge"><?= $total_jemaat->total_jemaat ?></p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body text-center">
                <h4 class="header-title">Total pendeta</h4>
                <hr>
                <!-- <div class="icon-badge"><i class="fa fa-user"></i></div> -->
                <p class="text-badge"><?= $total_pendeta->total_pendeta ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="single-report">
                    <div class="s-sale-inner pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Grafik Keuangan</h4>
                            <select class="custome-select border-0 pr-3 year-select">
                                <option value="" selected="">Select</option>
                                <?php foreach ($this->default_model->getAvailableKeuanganYear() as $tahun) : ?>
                                    <option value="<?= $tahun->year ?>">
                                        <?= $tahun->year ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div id="grafikUang" style="height: 245px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Grafik Kehadiraan Jemaat di Ibadah</h4>
                    <div class="d-inline">
                        <select class="first-year border-0 pr-3">
                            <?php foreach ($this->default_model->getAvailableYearOfIbadah() as $tahun) : ?>
                                <option value="<?= $tahun->tahun ?>">
                                    <?= $tahun->tahun ?>
                                </option>
                            <?php endforeach ?>
                        </select>

                        <select class="second-year border-0 pr-3">
                            <?php foreach ($this->default_model->getAvailableYearOfIbadah() as $tahun) : ?>
                                <option value="<?= $tahun->tahun ?>" <?= ($tahun->tahun == '2019') ? 'selected' : '' ?>>
                                    <?= $tahun->tahun ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <canvas id="canvas" width="100%"></canvas>
            </div>
        </div>
    </div>
</div>