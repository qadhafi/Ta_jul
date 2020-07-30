<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?> - GKY Kuta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/font-awesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/metisMenu.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/slicknav.min.css') ?>">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/typography.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/default-css.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/assets/css/customize.css') ?>">
    <!-- data table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- modernizr css -->
    <!-- Select2js -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

    <script src="<?= base_url('assets/templates/assets/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <?php $this->load->view('jemaat/flash.php') ?>

    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper jemaat-wrapper">
        <?php $this->load->view('jemaat/header') ?>
        <!-- page title area end -->
        <div class="main-content-inner">

            <?php $this->load->view($content) ?>

        </div>
        <!-- main content area end -->
        <?php $this->load->view('jemaat/footer') ?>
    </div>
    <!-- main wrapper start -->


    <div id="theModal" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


    <!-- jquery latest version -->
    <script src="<?= base_url('assets/templates/assets/js/vendor/jquery-2.2.4.min.js') ?>"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('assets/templates/assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/jquery.slimscroll.min.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/jquery.slicknav.min.js') ?>"></script>


    <script src="<?= base_url('assets/templates/assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        $('.kegiatan-btn').on('click', function(e) {
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            //datepicker
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                yearRange: "1920:2020",
                defaultDate: '1995-01-01'
            });

            //select2 input option
            $('.mySelect').select2();

        });

        $(document).ready(function() {
            $('.datepicker2').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
            });
        });
    </script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('myeditor');
    </script>


    <script>
        $('#select_jemaat').change(function() {
            var jemaat_id = $(this).val();
            if (jemaat_id != '') {
                $.ajax({
                    'type': 'get',
                    'url': '<?= base_url("baptis/orangtua/") ?>' + jemaat_id,
                    success: function(result) {
                        $('.nama_ayah').val("");
                        $('.nama_ibu').val("");
                        $('.id_orangtua').val("");

                        $('.nama_ayah').removeAttr('readonly');
                        $('.nama_ibu').removeAttr('readonly');

                        if (result != 'null') {
                            var data = JSON.parse(result);
                            $('.nama_ayah').val(data[0].nama_ayah);
                            $('.nama_ibu').val(data[0].nama_ibu);
                            $('.id_orangtua').val(data[0].id_orangtua);
                        }
                    },
                    error: function() {
                        alert('something wrong with ajax request');
                    }
                });
            } else {
                $('.nama_ayah').val("");
                $('.nama_ibu').val("");
                $('.id_orangtua').val("");
                $('.nama_ayah').attr('readonly', 'readonly');
                $('.nama_ibu').attr('readonly', 'readonly');
            }
        });

        $('#select_jemaat_wanita').change(function() {
            var jemaat_id = $(this).val();
            if (jemaat_id != '') {
                $.ajax({
                    'type': 'get',
                    'url': '<?= base_url("baptis/orangtua/") ?>' + jemaat_id,
                    success: function(result) {
                        $('.nama_ayah_wanita').val("");
                        $('.nama_ibu_wanita').val("");
                        $('.id_orangtua_wanita').val("");

                        $('.nama_ayah_wanita').removeAttr('readonly');
                        $('.nama_ibu_wanita').removeAttr('readonly');

                        if (result != 'null') {
                            var data = JSON.parse(result);
                            $('.nama_ayah_wanita').val(data[0].nama_ayah);
                            $('.nama_ibu_wanita').val(data[0].nama_ibu);
                            $('.id_orangtua_wanita').val(data[0].id_orangtua);
                        }
                    },
                    error: function() {
                        alert('something wrong with ajax request');
                    }
                });
            } else {
                $('.nama_ayah_wanita').val("");
                $('.nama_ibu_wanita').val("");
                $('.id_orangtua_wanita').val("");
                $('.nama_ayah_wanita').attr('readonly', 'readonly');
                $('.nama_ibu_wanita').attr('readonly', 'readonly');
            }
        });
    </script>
</body>

</html>