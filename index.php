<?php 
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include "include/koneksi.php";

    if(!isset($_SESSION)) {
      session_start();
      }

    if($_SESSION['Admin'] || $_SESSION['Kasir']) {


    // ambil session berdasarkan user yg login
      if($_SESSION['Admin']) {
        $user = $_SESSION['Admin'];
      }else if($_SESSION['Kasir']) {
        $user = $_SESSION['Kasir'];
      }

      $sql_user = $koneksi->query("SELECT * FROM tb_user WHERE id = '$user'");
      $data_user = $sql_user->fetch_assoc();

      // masukan kedalam variabel untuk mempermudah pengambilan data.
      $id_user  = $data_user['id']; 
      $username = $data_user['username'];
      $pass     = $data_user['password'];
      $nama     = $data_user['nama_user'];
      $gambar   = $data_user['foto'];
      $level    = $data_user['level'];
    

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>APP Laundry</title>

  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

   


    <link rel="icon" href="assets/img/icon/Cat-laptop.ico">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    
    
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

        <link href="assets/style.css" rel="stylesheet">




  <!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert -->
<script src="assets/sweetalert2.all.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- My Script -->
<script src="assets/dist/js/my_script.js"></script>
  <script src="assets/script.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>

    </ul>
      
  <marquee><strong class="text-danger">Selamat Datang <?= $nama ?> Di Aplikasi Pemesanan Laundry MBS Wonopringgo</strong></marquee>
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link text-center">
      
      <i class="fas fa-tshirt text-primary"></i>
      <span class="brand-text font-weight-light">APP Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user/<?= $gambar; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <div class="d-block text-white"><?= $nama ?></div>
        </div>
      </div>

      <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item has-treeview user-panel <?php 
                                                   if($_GET['page'] == "profile") {
                                                    echo "menu-open";
                                                   } ?>">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
               Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="?page=profile" class="nav-link <?php 
                                                   if($_GET['page'] == "profile") {
                                                    echo "active";
                                                   } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Profil</p>
                </a>
              </li>
            </ul>
          </li>



      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
          
          <!-- memanggil file dari menu -->
          <?php include "include/menu.php" ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                        <?php if($_GET['page'] == '') {
                          echo 'DASHBOARD';
                        }else if($_GET['page'] == 'pelanggan') {
                          echo strtoupper($_GET['page']);
                        }else if($_GET['page'] == 'transaksi') {
                          echo strtoupper($_GET['page']);
                        }else if($_GET['page'] == 'laporan') {
                          echo strtoupper($_GET['page']);
                        }else if($_GET['page'] == 'user') {
                          echo strtoupper($_GET['page']);
                        }else if($_GET['page'] == 'status') {
                          echo strtoupper($_GET['page']);
                        }else if($_GET['page'] == 'profile') {
                          echo strtoupper($_GET['page']. ' saya') ;
                        }
                        ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-primary">APP Laundry</li>
              <li class="breadcrumb-item active">
                    <?php if($_GET['page'] == '') {
                          echo 'DASHBOARD';
                        }else if($_GET['page'] == 'pelanggan') {
                          echo $_GET['page'];
                        }else if($_GET['page'] == 'transaksi') {
                          echo $_GET['page'];
                        }else if($_GET['page'] == 'laporan') {
                          echo $_GET['page'];
                        }else if($_GET['page'] == 'user') {
                          echo $_GET['page'];
                        }else if($_GET['page'] == 'status') {
                          echo $_GET['page'];
                        }else if($_GET['page'] == 'profile') {
                          echo strtoupper($_GET['page']. ' saya') ;
                        }
                        ?>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

    <!-- menampilkan contents -->
          <?php include "include/isi.php"; ?>

        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer text-center">
  
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 | Kelompok 2 Fastikom UMPP.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Logout</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Apakah anda ingin mengakhiri session dan keluar..?</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="logout.php" class="btn btn-primary">Ya</a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



  <script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  </script>

  <!-- javascript untuk menampilkan gambar sebelum di submit -->
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script> 


</body>
</html>

<?php 

      }else{
        echo "
            <script>
                  alert('Anda Harus Melakukan Login Terlebih Dahulu..!');
                  window.location.href='login.php'; 
            </script> ";
      }
       

?>