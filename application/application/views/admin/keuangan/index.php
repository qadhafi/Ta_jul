<div class="row">
    <div class="col-md-12">                        
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?= $title ?></h4>
                <hr>
                <div class="mb-3">
                    <strong>Total Seluruh Saldo Akhir: <span class="badge badge-info">Rp. <?= number_format($saldo_akhir) ?></span></strong>
                </div>
                <div class="row">
                    <div class="d-inline mr-2">                    
                        <a href="<?= base_url('keuangan/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
                    </div>
                    <div class="d-inline">
                        <a href="<?= base_url('keuangan/index?type=print') ?>" id="keuangan-url" class="btn btn-sm btn-outline-primary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <hr>
                <div class="mb-4">
                    <form action="<?= base_url('keuangan/index') ?>" method="get">                
                        Tampilkan laporan keuangan: 
                        <select name="month" required>
                            <option value="">- Pilih Bulan -</option>
                            <?php foreach(getMonthList() as $month) : ?>
                                <option value="<?= $month['num'] ?>" 
                                    <?php if(isset($_GET['month'])) : ?>
                                        <?= ($_GET['month'] == $month['num']) ? 'selected' : '' ?>
                                    <?php endif ?> >
                                    
                                    <?= $month['month'] ?>
                                </option>                                
                            <?php endforeach ?>                            
                            <option value="all" <?php if(isset($_GET['month'])) : ?>
                                        <?= ($_GET['month'] == 'all') ? 'selected' : '' ?>                                    
                                    <?php endif ?>>
                                    
                                    Seluruh Bulan</option> 
                        </select>
                        <select name="year" required>
                            <option value="">- Pilih Tahun -</option>
                            <?php foreach($years as $tahun) : ?>
                                <option value="<?= $tahun->year ?>" 
                                    <?php if(isset($_GET['year'])) : ?>
                                        <?= ($_GET['year'] == $tahun->year) ? 'selected' : '' ?>                                    
                                    <?php endif ?>>

                                    <?= $tahun->year ?>
                                </option>
                            <?php endforeach ?>
                                <option value="all" <?php if(isset($_GET['year'])) : ?>
                                        <?= ($_GET['year'] == 'all') ? 'selected' : '' ?>                                    
                                    <?php endif ?>>
                                    
                                    Seluruh Tahun</option>                                                    
                        </select>
                        <input type="submit" name="cari" value="Cari" class="button-cari">
                    </form>
                </div>

                <div class="data-tables inner-content">
                    <table id="dataTable" class="text-center table">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $pemasukan = 0; $pengeluaran = 0; ?>
                            <?php $i = 1; foreach($keuangan as $key => $row) : ?>
                            
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?=  $row->tanggal ?></td>
                                    <td>Rp. <?=  number_format($row->jumlah_uang) ?></td>
                                    <td><span class="badge <?= ($row->tipe == 'pemasukan') ? 'badge-success' : 'badge-danger' ?>"><?= $row->tipe ?></span></td>                                   
                                    <?php if($row->tipe == 'pemasukan') {
                                        $pemasukan += $row->jumlah_uang;
                                    } else {
                                        $pengeluaran += $row->jumlah_uang;
                                    } ?>
                                    <td><?=  $row->keterangan ?></td>
                                    <td>
                                        <form action="<?= base_url('keuangan/delete/'.$row->id_keuangan) ?>" method="post">
                                            <ul class="d-flex justify-content-center">                                                  
                                                <li class="mr-3"><a href="<?= base_url('keuangan/edit/'.$row->id_keuangan) ?>" class="text-secondary" title="Edit data"><i class="fa fa-edit"></i></a></li>
                                                <li><button type="submit" class="text-danger btn-submit" onclick="return confirm('Yakin akan hapus data?')" ><i class="fa fa-trash"></i></button></li>
                                            </ul>
                                        </form>
                                    </td>
                                </tr>
                            
                            <?php endforeach; ?>                        
                            
                        </tbody>
                    </table>
                    <p>Total Pemasukan = Rp. <?= number_format($pemasukan) ?></p>
                    <p>Total Pengeluaran = Rp. <?= number_format($pengeluaran) ?></p>
                    <p>Saldo Akhir Bulan <?= (isset($_GET['month'])) ? getMonthName($_GET['month']) .' '. $_GET['year'] : date('F') . ' ' . date('Y')  ?>  = <?= number_format($pemasukan - $pengeluaran) ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>