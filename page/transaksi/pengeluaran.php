<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pengeluaran</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                  <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukan Nama Pelanggan" required>
                  </div>

                  <div class="form-group">
                    <label for="jml">Jumlah Pengeluaran</label>
                    <input type="number" min="1" class="form-control" id="jml" name="jml" placeholder="Jumlah Pengeluaran" required>
                  </div>

                  <div class="form-group">
                    <label for="catatan">Keperluan</label>
                    <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" placeholder="Keperluan" required></textarea >
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
</div>
<?php 
    
    if(isset($_POST['tambah'])) {

      $tgl      = $_POST['tgl'];
      $jml      = $_POST['jml'];
      $catatan  = htmlspecialchars($_POST['catatan']); 

                        
      $sql2 = $koneksi->query("INSERT INTO tb_laporan (id_pelanggan, id_user, tgl_masuk, pemasukan, pengeluaran, catatan, keterangan) VALUES (0, '$id_user', '$tgl', 0, '$jml', '$catatan', 'Pengeluaran')");


  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Data Berhasil Ditambahkan..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=laporan';
                }, 2000);
                  
            </script> ";

      }
                        
  }
                    

?>


        
