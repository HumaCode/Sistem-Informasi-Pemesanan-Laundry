<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data User</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama User" required autocomplete="off">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autocomplete="off">
                    </div>
                  </div>
                </div> 

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="level">Level User</label>
                      <select name="level" id="level" class="form-control" required>
                        <option value="">-- Pilih level User</option>

                          <option value="Admin">Admin</option>
                          <option value="Kasir">Kasir</option>
                          
                      </select>
                    </div>
                  </div>
                </div>
                  

                  

                  

                  

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary" id="tombol_simpan">TAMBAH</button>
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


      
                        
      $sql2 = $koneksi->query("INSERT INTO tb_user (nama_user, username, password, level, foto) VALUES ('$nama', '$username', '$password', '$level', 'default.jpg')");


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
                  window.location.href='?page=user';
                }, 2000);
                  
            </script> ";

      }
                        
  }
                    

?>


        
