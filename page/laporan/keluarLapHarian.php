<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../include/koneksi.php";


    $tgl = $_POST['tanggal'];
    $bln = $_POST['bulan'];
    $thn = $_POST['tahun'];



?>

<!-- javascrip untuk menjalanjan fungsi print-->
<script type="text/javascript">
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Laporan Pengeluaran Harian</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        @media print {
            .cetak {
                display: none;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="window.print()">

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header text-center">

                            <h1 class=" mt-4 mb-3 text-dark">Laporan Harian Pengeluaran Laundry</h1>
                            <hr>
                            <small>Jl. Raya Wonopringgo Selatan Desa Rowokembu Kecamatan Wonopringg, kode pos 51181 Kabupaten Pekalongan</small>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30">No</th>
                                        <th>Tanggal Transaksi </th>
                                        <th>Keterangan</th>
                                        <th>Catatan</th>
                                        <th>Kasir</th>
                                        <th>Pengeluaran</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                            $i = 1;
                                            $sql = $koneksi->query("SELECT * FROM tb_laporan, tb_user WHERE tb_laporan.id_user = tb_user.id AND DAY(tb_laporan.tgl_masuk) = '$tgl' AND MONTH(tb_laporan.tgl_masuk) = '$bln' AND YEAR(tb_laporan.tgl_masuk) = '$thn' AND pemasukan = '0'");
                                            while ($data = $sql->fetch_assoc()) {
                                     ?>

                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= date('d F Y', strtotime($data['tgl_masuk'])) ?></td>
                                            <td>
                                                <?= $data['keterangan'] ?>
                                            </td>
                                            <td><?= $data['catatan'] ?></td>
                                            <td><?= $data['nama_user'] ?></td>
                                            <td align="right"><?= number_format($data['pengeluaran'], 0,',','.') ?></td>

                                        </tr>

                                       <?php    
                                            
                                            $keluar = $keluar + $data['pengeluaran'];

                                            
                                        ?>


                                    <?php } ?>

                                </tbody>

                                <tr>
                                    <th colspan="5" class="text-center">Total Pengeluaran</th>
                                    <td align="right"><strong><?= 'Rp. ' . number_format($keluar, 0, ',', '.') ?></strong></td>
                                </tr>


                            </table> <br><br><br><br><br><br>

                            <div class="row mt-4">
                                <div class="col-md-3 offset-md-9 text-center">

                                    Karanganyar , <?= $tgl ?>-<?php switch ($bln) {
                                                                        case 1:
                                                                            echo 'Januari';
                                                                            break;
                                                                        case 2:
                                                                            echo 'Februari';
                                                                            break;
                                                                        case 3:
                                                                            echo 'Maret';
                                                                            break;
                                                                        case 4:
                                                                            echo 'April';
                                                                            break;
                                                                        case 5:
                                                                            echo 'Mei';
                                                                            break;
                                                                        case 6:
                                                                            echo 'Juni';
                                                                            break;
                                                                        case 7:
                                                                            echo 'Juli';
                                                                            break;
                                                                        case 8:
                                                                            echo 'Agustus';
                                                                            break;
                                                                        case 9:
                                                                            echo 'September';
                                                                            break;
                                                                        case 10:
                                                                            echo 'Oktober';
                                                                            break;
                                                                        case 11:
                                                                            echo 'November';
                                                                            break;
                                                                        case 12:
                                                                            echo 'Desember';
                                                                            break;
                                                                    }
                                                                    ?>-<?= $thn ?>
                                    <p>Petugas Laundry</> <br><br><br><br>

                                        (. . . . . . . . . . . . . . . . .)

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <!-- jQuery -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
   
    <!-- Bootstrap 4 -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.js"></script>



</body>

</html>

