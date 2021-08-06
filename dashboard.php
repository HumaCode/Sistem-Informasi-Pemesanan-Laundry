<?php 
  
  // menampilkan jumlah row yang ada di dalam masing2 tabel.
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_user");
     $pengguna = mysqli_num_rows($sql);

  $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
     $pelanggan = mysqli_num_rows($sql2);

  $sql3 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
     $transaksi = mysqli_num_rows($sql3);

  $sql4 = mysqli_query($koneksi, "SELECT * FROM tb_laporan");
     $laporan = mysqli_num_rows($sql4);

?>


<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mb-5">


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $pengguna ?></h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
          <?php if($level == 'Admin') { ?>
              <a href="?page=user" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
          <?php } else { ?>
              <div class="small-box-footer">Hanya admin yang bisa mengakses.</div>
          <?php } ?>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $pelanggan ?></h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="?page=pelanggan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $transaksi ?></h3>

                <p>Transaksi Laundry</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
              </div>
              <a href="?page=transaksi" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $laporan ?></h3>

                <p>Laporan Transaksi</p>
              </div>
              <div class="icon">
                <i class="far fa-money-bill-alt"></i>
              </div>
              <a href="?page=laporan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>


          </div>
          <!-- ./col -->


        </div>
      <div class="card mt-4">
            <div class="card-header bg-info">
                Perhatian.
            </div>
            <div class="card-body">
              <small class="text-danger">
                ** Jika terdapat kerusaka yang di sebabkan oleh petugas kasir, maka petugas kasir akan bertanggung jawab atas kerusakan yang terjadi. <br>
                ** Cucian akan di cek terlebih dahulu untuk mengetahui kondisi cucian sebelum di timbang. <br>
                ** Jika kerusakan disebabkan oleh pelanggan (misal pakaian sobek ketika pengambilan, bukan tanggung jawab petugas laundry).
              </small>
            </div>
      </div>
        </div>
        <!-- /.row -->
  