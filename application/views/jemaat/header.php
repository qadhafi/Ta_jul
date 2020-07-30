<!-- main header area start -->
<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">                        
                <h3><a href="<?= base_url() ?>" style="color:#005E9C!important"> <img src="<?= base_url('assets/img/gky-logo.png') ?>" alt="brand-image" class="brand-image"> GKY Kuta</a></h3>                     
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 clearfix text-right">
                <?php if(!isset($this->session->username)) : ?>
                <div class="pt-2 pb-2">
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-primary btn-sm">Login</a>
                </div>
                <?php else : ?>
                <div class="clearfix d-md-inline-block d-block">
                    <div class="user-profile m-0">       
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= ucwords($this->session->username) ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <?= anchor('aktivitas/konseling', 'Konseling', ['class' => 'dropdown-item']) ?>
                            <?= anchor('aktivitas/kegiatan_anda', 'Kegiatan Anda', ['class' => 'dropdown-item']) ?>
                            <?= anchor('ubah_password/jemaat', 'Ubah Password', ['class' => 'dropdown-item']) ?>
                            <?= anchor('login/logout', 'Logout', ['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- main header area end -->
<!-- header area start -->
<div class="header-area header-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                                <a href="<?= base_url() ?>"><i class="fa fa-home"></i><span>Home</span></a>            
                            </li>                            
                            <li>
                                <a href="<?= base_url('listing/artikel') ?>"><i class="fa fa-book"></i><span>Artikel</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url('listing/gallery') ?>"><i class="fa fa-image"></i><span>Gallery</span></a>
                            </li>
                            
                            <li>
                                <a href="<?= base_url('listing/kegiatan') ?>"><i class="fa fa-list"></i><span>Kegiatan</span></a>
                            </li>

                            <li><a href="<?= base_url('listing/contact') ?>"><i class="fa fa-map"></i> <span>Contact</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>                   
            <!-- mobile_menu -->
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- header area end -->