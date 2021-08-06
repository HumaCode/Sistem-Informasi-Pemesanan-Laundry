<?php 

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_user WHERE id = '$id'");
    $data = $sql->fetch_assoc();


    $level = ['Admin', 'Kasir'];


?>
<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data User</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama User" required autocomplete="off" value="<?= $data['nama_user'] ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autocomplete="off" value="<?= $data['username'] ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label><br>
                      <small class="text-danger">**ketika mengubah salah satu data, password wajib diubah</small>

                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" autocomplete="off" value="<?= $data['password'] ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="level">Level User</label><br>.
                      <select name="level" id="level" class="form-control" required>
                        <option value="">-- Pilih level User</option>

                        <?php foreach($level as $s) : ?>
                            <?php if($s == $data['level']) : ?>
                                <option value="<?= $s ?>" selected ><?= $s ?></option>
                            <?php else : ?>
                                <option value="<?= $s ?>"><?= $s ?></option>
                            <?php endif; ?>
                          
                        <?php endforeach; ?>
                          
                      </select>
                    </div>
                  </div>
                </div>
                  

                

                  

                  

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary" id="tombol_simpan">SIMPAN</button>
                  <a href="?page=user" class="btn btn-danger float-right" >KEMBALI</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
</div>
<?php 
    
    if(isset($_POST['tambah'])) {

      $nama     = htmlspecialchars($_POST['nama']);
      $username = htmlspecialchars($_POST['username']);
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $level   = $_POST['level'];

      
                        
      $sql2 = $koneksi->query("UPDATE tb_user SET nama_user = '$nama', username = '$username', password = '$password', level = '$level' WHERE id = '$id'");


      



  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: '$nama Berhasil Diubah..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=user';
                }, 2000);
                  
            </script> ";

      }
                        
  }
                    

?>


        
