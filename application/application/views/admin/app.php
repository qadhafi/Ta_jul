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

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    
    <?php if($this->session->userdata('is_login')): ?>
    <!-- Jika login -->

        <div class="page-container">
  
            <?php $this->load->view('admin/sidebar') ?>
 

            <!-- main content area start -->
            <div class="main-content">
            
                <?php $this->load->view('admin/header') ?>
             

                <div class="main-content-inner">
              
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <?php $this->load->view('admin/flash') ?>
                        </div>
                    </div>
    <?php endif ?>

                <?php $this->load->view($content) ?>
       

    <?php if($this->session->userdata('is_login')): ?>
    <!-- Jika login -->
                
            
                </div>
            </div>
          
            
       
            <?php $this->load->view('admin/footer') ?>


        </div>

    <?php endif ?>

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

    <?php if(isset($dashboard)) : ?>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="<?= base_url('assets/templates/assets/js/line-chart.js') ?>"></script>
    <!-- all bar chart activation -->
    <script src="<?= base_url('assets/templates/assets/js/bar-chart.js') ?>"></script>
    <!-- all pie chart -->
    <script src="<?= base_url('assets/templates/assets/js/pie-chart.js') ?>"></script>
    <!-- others plugins -->
    <script src="<?= base_url('assets/templates/assets/js/plugins.js') ?>"></script>
    <script src="<?= base_url('assets/templates/assets/js/scripts.js') ?>"></script>
    
    <!--------------  script grafik keuangan ------------ -->
    <script>            
        var graph = <?= $keuangan_grafik ?>;
        var nominal_pengeluaran = [];
        var bulan_pengeluaran = [];
        var nominal_pemasukan = [];
        var bulan_pemasukan = [];
        
        for(var i = 0; i < graph.pengeluaran.total_uang.length; i++){
            nominal_pengeluaran.push(parseInt(graph.pengeluaran.total_uang[i]));
        }

        for(var i = 0; i < graph.pengeluaran.bulan.length; i++){
            bulan_pengeluaran.push("Bulan "+graph.pengeluaran.bulan[i]);
        }

        for(var i = 0; i < graph.pemasukan.total_uang.length; i++){
            console.log(graph.pemasukan.total_uang[i]);
            nominal_pemasukan.push(parseInt(graph.pemasukan.total_uang[i]));
        }

        for(var i = 0; i < graph.pemasukan.bulan.length; i++){
            bulan_pemasukan.push("Bulan "+graph.pemasukan.bulan[i]);
        }

        var bulan_used;
        var saldo = [];
        if(bulan_pemasukan.length > bulan_pengeluaran.length){
            bulan_used = bulan_pemasukan;                        
        } else {
            bulan_used = bulan_pengeluaran;
        }

        for(var i = 0; i < bulan_pemasukan.length; i++){
            saldo.push(nominal_pemasukan[i] - nominal_pengeluaran[i]);
        }
                                
        Highcharts.chart('grafikUang', {
            chart: {
                type: 'column'
            },
            title: false,
            xAxis: {
                categories: bulan_used
            },
            colors: ['#5F73F2', '#E5726D', '#12C599'],
            yAxis: {
                min: 0,
                title: false
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'column'
                }
            },
            series: [{
                    name: 'Pemasukan',
                    data: nominal_pemasukan
                }, {
                    name: 'Pengeluaran',
                    data: nominal_pengeluaran
                }, {
                    name: 'Sisa',
                    data: saldo
                },         
            ]
        });                


        $('.year-select').change(function(){
            var year = $(this).val()
            $.ajax({
                'url': '<?= base_url('dashboard/keuangan_grafik/') ?>' + year,
                'type': 'GET',
                success: function(result){                
                    var graph = JSON.parse(result);
                    var nominal_pengeluaran = [];
                    var bulan_pengeluaran = [];
                    var nominal_pemasukan = [];
                    var bulan_pemasukan = [];
                    
                    for(var i = 0; i < graph.pengeluaran.total_uang.length; i++){
                        nominal_pengeluaran.push(parseInt(graph.pengeluaran.total_uang[i]));
                    }

                    for(var i = 0; i < graph.pengeluaran.bulan.length; i++){
                        bulan_pengeluaran.push("Bulan "+graph.pengeluaran.bulan[i]);
                    }

                    for(var i = 0; i < graph.pemasukan.total_uang.length; i++){
                        nominal_pemasukan.push(parseInt(graph.pemasukan.total_uang[i]));
                    }

                    for(var i = 0; i < graph.pemasukan.bulan.length; i++){
                        bulan_pemasukan.push("Bulan "+graph.pemasukan.bulan[i]);
                    }

                    var bulan_used;
                    var saldo = [];
                    if(bulan_pemasukan.length > bulan_pengeluaran.length){
                        bulan_used = bulan_pemasukan;                        
                    } else {
                        bulan_used = bulan_pengeluaran;
                    }

                    for(var i = 0; i < bulan_pemasukan.length; i++){
                        saldo.push(nominal_pemasukan[i] - nominal_pengeluaran[i]);
                    }
                                            
                    Highcharts.chart('grafikUang', {
                        chart: {
                            type: 'column'
                        },
                        title: false,
                        xAxis: {
                            categories: bulan_used
                        },
                        colors: ['#5F73F2', '#E5726D', '#12C599'],
                        yAxis: {
                            min: 0,
                            title: false
                        },
                        tooltip: {
                            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                            shared: true
                        },
                        plotOptions: {
                            column: {
                                stacking: 'column'
                            }
                        },
                        series: [{
                                name: 'Pemasukan',
                                data: nominal_pemasukan
                            }, {
                                name: 'Pengeluaran',
                                data: nominal_pengeluaran
                            }, {
                                name: 'Sisa',
                                data: saldo
                            },         
                        ]
                    });                
                },
                error: function(){
                    alert('something wrong with ajax request');
                }
            });
        });
   
    </script>
    <!--------------  end script grafik keuangan ------------ -->

    <!--------------  script grafik jemaat ------------>
    <script>
        
        $(document).ready(function(){
            var ctx = document.getElementById('canvas').getContext("2d");
    
            var first_year = <?= $jemaat_grafik_1 ?>;
            var second_year = <?= $jemaat_grafik_2 ?>;
            var first_label = '2020';
            var second_label = '2019';

            $('.first-year').change(function(){
                //config.data.datasets[0].data =  [200, 300, 600, 300, 100, 400, 250, 500, 350, 200, 650, 400];
                // console.log(config.data.datasets[0].data);
                var year = $(this).val();
                $.ajax({
                    'url': '<?= base_url('dashboard/jemaat_grafik/') ?>' + year,
                    'type': 'GET',
                    success: function(result){                
                        var graph = JSON.parse(result);
                        config.data.datasets[0].label = year;
                        config.data.datasets[0].data = graph;
                        window.myLine = new Chart(ctx, config);
                    }
                })
                
            });

            $('.second-year').change(function(){      
                var year = $(this).val();
                $.ajax({
                    'url': '<?= base_url('dashboard/jemaat_grafik/') ?>' + year,
                    'type': 'GET',
                    success: function(result){                
                        var graph = JSON.parse(result);
                        config.data.datasets[1].label = year;
                        config.data.datasets[1].data = graph;
                        window.myLine = new Chart(ctx, config);
                    }
                })
            });
                            
            var MONTHS = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            var config = {
                type: 'line',
                data: {
                    labels: MONTHS,
                    datasets: [{
                        label: first_label,
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: first_year,
                        fill: false,
                    }, {
                        label: second_label,
                        fill: false,
                        backgroundColor: '#36A2EB',
                        borderColor: '#36A2EB',
                        data: second_year,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Jumlah Kehadiran Jemaat Ibadah'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Bulan'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Jumlah Jemaat'
                            }
                        }]
                    }
                }
            }

            var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
        });


      

        

		
	</script>

    <!--------------  end grafik jemaat ------------>

    <?php endif ?>

    <script>
        $('.respon-btn').on('click', function(e){
            e.preventDefault();
            $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
        });

        //url keuangan
        var url = window.location.href;
        var param = '';
        if(url.includes('?')){
            url = url.split("?");
            param = url[1];
        }

        var button = $('#keuangan-url').attr('href', $('#keuangan-url').attr('href') + "&" + param);
        console.log(button.attr('href'));
    </script>

    <script>
        
        $(document).ready( function () {
            $('#dataTable').DataTable();

            //datepicker
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                yearRange: "1920:2020",
                defaultDate: '1995-01-01'
            });
            
             //select2 input option
            $('.mySelect').select2();
           
        });

        $(document).ready(function(){
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
        CKEDITOR.replace( 'myeditor' );
    </script>


    <script>
        $('#select_jemaat').change(function(){
            var jemaat_id = $(this).val();
            if(jemaat_id != ''){
                $.ajax({
                    'type': 'get',
                    'url': '<?= base_url("baptis/orangtua/") ?>'+jemaat_id,
                    success: function(result){
                        $('.nama_ayah').val("");
                        $('.nama_ibu').val("");
                        $('.id_orangtua').val("");

                        $('.nama_ayah').removeAttr('readonly');
                        $('.nama_ibu').removeAttr('readonly');                                    
                        
                        if(result != 'null'){
                            var data = JSON.parse(result);
                            $('.nama_ayah').val(data[0].nama_ayah);
                            $('.nama_ibu').val(data[0].nama_ibu);
                            $('.id_orangtua').val(data[0].id_orangtua);
                        }
                    },
                    error: function(){
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

        $('#select_jemaat_wanita').change(function(){
            var jemaat_id = $(this).val();
            if(jemaat_id != ''){
                $.ajax({
                    'type': 'get',
                    'url': '<?= base_url("baptis/orangtua/") ?>'+jemaat_id,
                    success: function(result){
                        $('.nama_ayah_wanita').val("");
                        $('.nama_ibu_wanita').val("");
                        $('.id_orangtua_wanita').val("");

                        $('.nama_ayah_wanita').removeAttr('readonly');
                        $('.nama_ibu_wanita').removeAttr('readonly');                                    
                        
                        if(result != 'null'){
                            var data = JSON.parse(result);
                            $('.nama_ayah_wanita').val(data[0].nama_ayah);
                            $('.nama_ibu_wanita').val(data[0].nama_ibu);
                            $('.id_orangtua_wanita').val(data[0].id_orangtua);
                        }
                    },
                    error: function(){
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
