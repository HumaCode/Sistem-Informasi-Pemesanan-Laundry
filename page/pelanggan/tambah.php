<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pelanggan</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pelanggan" required>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required></textarea >
                  </div>

                  <div class="form-group">
                    <label for="no_tlp">No. Telepon</label>
                    <input type="number" class="form-control" id="no_tlp" name="no_tlp" min="0" placeholder="Jika tidak ada boleh dikosongkan">
                  </div>

                  <div class="form-group">
                    <label for="status">Status Pelanggan</label>
                    <select name="status" id="status" class="form-control" required>
                      <option value="">-- Pilih Status Pelanggan</option>

                      <?php 
                            $sql = $koneksi->query("SELECT * FROM tb_status");
                            while ($data = $sql->fetch_assoc()) {
                                                           
                      ?>

                        <option value="<?= $data['id_status'] ?>"><?= $data['status'] ?></option>
                        <?php } ?>
                    </select>
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

      $nama   = htmlspecialchars($_POST['nama']);
      $alamat = htmlspecialchars($_POST['alamat']);
      $status = $_POST['status'];
      $no_tlp = $_POST['no_tlp'];

      if ($no_tlp == "") {
        $tlp = "-";
      }else{
        $tlp = $_POST['no_tlp'];
      }
                        
      $sql2 = $koneksi->query("INSERT INTO tb_pelanggan (nama_pelanggan, alamat, id_status, no_tlp) VALUES ('$nama', '$alamat', '$status', '$tlp')");


  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: '$nama Berhasil Ditambahkan..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=pelanggan';
                }, 2000);
                  
            </script> ";

      }
                        
  }
                    

?>


        
