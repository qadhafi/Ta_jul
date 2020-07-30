<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-11 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-1 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
            
            </ul>
        </div>
    </div>
</div>
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-9">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">GKY Kuta</h4>
                
            </div>
        </div>
        <div class="col-sm-3 clearfix">
            <div class="user-profile pull-right">
                
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= ucwords($this->session->username) ?> <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <?= anchor('ubah_password', 'Ubah Password', ['class' => 'dropdown-item']) ?>
                    <?= anchor('login/logout', 'Logout', ['class' => 'dropdown-item']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->