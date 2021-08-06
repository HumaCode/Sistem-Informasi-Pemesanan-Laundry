<?php 

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id'");

    $data = $sql->fetch_assoc();

?>

<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pelanggan</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_pelanggan'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required><?= $data['alamat'] ?></textarea >
                  </div>

                  <div class="form-group">
                    <label for="no_tlp">No Telepon</label><br>                    
                    <small class="text-danger">**Jika tidak ada boleh dikosongkan.</small>
                    <input type="number" class="form-control" id="no_tlp" min="0" name="no_tlp" value="<?= $data['no_tlp'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                      <option value="">-- Pilih Status Pelanggan</option>

                      <?php 
                            $sql = $koneksi->query("SELECT * FROM tb_status");
                            while ($data2 = $sql->fetch_assoc()) { ?>

                      <?php if($data2['id_status'] == $data['id_status']) { ?>

                          <option value="<?= $data2['id_status'] ?>" selected><?= $data2['status'] ?></option>
                      <?php }else{ ?>
                          <option value="<?= $data2['id_status'] ?>"><?= $data2['status'] ?></option>
                      <?php } ?>
                        <?php } ?>
                      }
                    </select>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="ubah" class="btn btn-primary">SIMPAN</button>
                  <a href="?page=pelanggan" class="btn btn-danger float-right" >KEMBALI</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</div>
<?php 
    
    if(isset($_POST['ubah'])) {

      $nama   = htmlspecialchars($_POST['nama']);
      $alamat = htmlspecialchars($_POST['alamat']);
      $status = $_POST['status'];
      $no_tlp = $_POST['no_tlp'];

       if ($no_tlp == "") {
        $tlp = "-";
      }else{
        $tlp = $_POST['no_tlp'];
      }
                        
      $sql2 = $koneksi->query("UPDATE  tb_pelanggan SET nama_pelanggan = '$nama', alamat = '$alamat', id_status = '$status', no_tlp = '$tlp' WHERE id_pelanggan = '$id'");


  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Data $nama Berhasil Diubah..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=pelanggan';
                }, 2500);
                  
            </script> ";


  }
                        
  }
                    

?>


        
