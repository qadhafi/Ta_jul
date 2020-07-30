<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h3><a href="<?= base_url() ?>" style="color:#005E9C!important"> <img src="<?= base_url('assets/img/gky-logo.png') ?>" alt="brand-image" class="brand-image"> GKY Kuta</a></h3>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?= (urlHasPrefix('dashboard') == true) ? 'active' : '' ?>">
                        <a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i><span>dashboard</span></a>
                    </li>

                    <?php if ($this->session->level == 'staff') : ?>

                        <li class="<?= (urlHasPrefix('jemaat') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('user/index/jemaat') ?>"><i class="fa fa-users"></i><span>jemaat</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('pendeta') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('user/index/pendeta') ?>"><i class="fas fa-user-tie"></i><span>pendeta</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('staff') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('user/index/staff') ?>"><i class="fas fa-user"></i><span>staff</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('baptis') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('baptis') ?>"><i class="fa fa-cross"></i><span>baptis</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('pernikahan') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('pernikahan') ?>"><i class="fa fa-church"></i><span>pernikahan</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('artikel') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('artikel') ?>"><i class="fas fa-book"></i><span>artikel</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('galeri') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('galeri') ?>"><i class="fas fa-image"></i><span>galeri</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('inventaris') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('inventaris') ?>"><i class="fas fa-box"></i><span>inventaris</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('kegiatan') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('kegiatan') ?>"><i class="fa fa-list"></i><span>kegiatan</span></a>
                        </li>

                        <li class="<?= (urlHasPrefix('jumlah_kehadiran_jemaat') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('jumlah_kehadiran_jemaat') ?>"><i class="fa fa-place-of-worship"></i><span>Kehadiran Jemaat</span></a>
                        </li>

                    <?php endif ?>

                    <li class="<?= (urlHasPrefix('keuangan') == true) ? 'active' : '' ?>">
                        <a href="<?= base_url('keuangan') ?>"><i class="fa fa-dollar-sign"></i><span>keuangan</span></a>
                    </li>

                    <!-- <li class="<?= (urlHasPrefix('Ujian_lsp') == true) ? 'active' : '' ?>">
                        <a href="<?= base_url('Ujian_lsp') ?>"><i class="fas fa-pen-square"></i><span>Ujian LSP</span></a>
                    </li> -->

                    <?php if ($this->session->level == 'pendeta') : ?>
                        <li class="<?= (urlHasPrefix('konseling') == true) ? 'active' : '' ?>">
                            <a href="<?= base_url('konseling') ?>"><i class="fa fa-sync-alt"></i><span>konseling</span></a>
                        </li>
                    <?php endif ?>



                </ul>
            </nav>
        </div>
    </div>
</div>