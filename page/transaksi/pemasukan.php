<script>
  
    function sum() {
      var layanan = document.getElementById('layanan').value;

      if (layanan == 'Cuci + Setrika') {
          var ly = 4000;
      }else{
        var ly = 3500;
      }

      if (!isNaN(ly)) {
        document.getElementById('harga').value = ly;
      }


      var berat = document.getElementById('berat').value;
      var harga = document.getElementById('harga').value;
      var tot = berat * harga;

      if(!isNaN(tot)) {
        document.getElementById('tot_bayar').value = tot;
      }
    }

</script>

<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Transaksi</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                  <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <select class="form-control select2" style="width: 100%;" name="nama">
                        <option value="">-- Pilih Pelanggan --</option>

                        <?php 
                          $sql = $koneksi->query("SELECT * FROM tb_pelanggan");
                          while ($data = $sql->fetch_assoc()) { ?>
                              <option value="<?= $data['id_pelanggan'] ?>"><?= $data['nama_pelanggan'] ?></option>
                        <?php } ?>

                      </select>
                  </div>

                  <div class="form-group">
                    <label for="layanan">Layanan</label>
                    <select name="layanan" id="layanan" class="form-control" onkeyup="sum();">
                      <option value="">-- Pilih Layanan --</option>
                      <option value="Cuci + Setrika">Cuci + Setrika</option>
                      <option value="Setrika">Setrika</option>
                    </select>
                  </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tgl_diterima">Tanggal Diterima</label>
                    <input type="date" class="form-control" id="tgl_diterima" name="tgl_diterima" >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" >
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="berat">Berat (Kg)</label>
                    <input type="text" class="form-control" id="berat" name="berat" placeholder="Penulisan koma menggunakan titik(misal 0.20)" onkeyup="sum();">
                  </div>
                </div>
              </div>
                  
                  
                  
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="harga">Harga (Rp.)</label>
                    <input type="number" min="0" class="form-control" id="harga" name="harga" onkeyup="sum()" placeholder=" Harga" readonly>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="tot_bayar">Total Bayar</label>
                    <input type="number" readonly class="form-control" id="tot_bayar" name="tot_bayar" placeholder="Total bayar akan terisi secara otomatis">
                  </div>
                </div>
              </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                      <option value="">-- Status --</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" placeholder="Catatan Pelanggan" required></textarea >
                  </div>

                  

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary" id="tombol_simpan">TAMBAH</button>
                  <a href="?page=pelanggan" class="btn btn-danger float-right" >KEMBALI</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

          <div class="card ">
            <div class="card-header bg-info">
                Perhatian.
            </div>
            <div class="card-body">
              <small class="text-danger">

                <h5 class="text-dark">Layanan</h5>
                <table>
                  <tr>
                    <td width="100px">Cuci + Setrika</td>
                    <td>=</td>
                    <td>Rp. 4000.</td>
                  </tr>
                  <tr>
                    <td>Setrika</td>
                    <td>=</td>
                    <td>Rp. 3500.</td>
                  </tr>
                </table> <br>

                ** Jika terdapat kerusaka yang di sebabkan oleh petugas kasir, maka petugas kasir akan bertanggung jawab atas kerusakan yang terjadi. <br>
                ** Cucian akan di cek terlebih dahulu untuk mengetahui kondisi cucian sebelum di timbang. <br>
                ** Jika kerusakan disebabkan oleh pelanggan (misal pakaian sobek ketika pengambilan, bukan tanggung jawab petugas laundry).
              </small>
            </div>
          </div>
</div>
<?php 
    
    if(isset($_POST['tambah'])) {

      $nama         = htmlspecialchars($_POST['nama']);
      $layanan      = $_POST['layanan'];
      $tgl_diterima = $_POST['tgl_diterima'];
      $tgl_selesai  = $_POST['tgl_selesai'];
      $berat        = $_POST['berat'];
      $harga        = $_POST['harga'];
      $tot_bayar    = $_POST['tot_bayar'];
      $status       = $_POST['status'];
      $catatan      = htmlspecialchars($_POST['catatan']);
      

      if ($no_tlp == "") {
        $tlp = "-";
      }else{
        $tlp = $_POST['no_tlp'];
      }

   
if ($status == 'Lunas') {
      $sql2 = $koneksi->query("INSERT INTO tb_transaksi (id_pelanggan, id_user, layanan, tgl_diterima, tgl_selesai, jml_kiloan, harga, tot_bayar, status, catatan) VALUES ('$nama', '$id_user', '$layanan', '$tgl_diterima', '$tgl_selesai', '$berat', '$harga', '$tot_bayar', '$status', '$catatan')");

       $sql2 = $koneksi->query("INSERT INTO tb_laporan (id_pelanggan, id_user, tgl_masuk, pemasukan, pengeluaran, catatan, keterangan) VALUES ('$nama', '$id_user', '$tgl_diterima', '$tot_bayar', 0, '$catatan', 'Pemasukan')");

  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Transaksi Berhasil Ditambahkan..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=transaksi';
                }, 2000);
                  
            </script> ";

      }
}else{
  $sql3 = $koneksi->query("INSERT INTO tb_transaksi (id_pelanggan, id_user, layanan, tgl_diterima, tgl_selesai, jml_kiloan, harga, tot_bayar, status, catatan) VALUES ('$nama', '$id_user', '$layanan', '$tgl_diterima', '$tgl_selesai', '$berat', '$harga', '$tot_bayar', '$status', '$catatan')");

    if($sql3) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Transaksi Berhasil Ditambahkan..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=transaksi';
                }, 2000);
                  
            </script> ";

      }
}

          
                        
  }
                    

?>


        
