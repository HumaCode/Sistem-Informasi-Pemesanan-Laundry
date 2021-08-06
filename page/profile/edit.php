<?php 

    $level_user = ['Admin', 'Kasir'];

?>

            <div class="col-12">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Edit Profil</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                            
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                            
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><br>
                            <small class="text-danger">**ketika mengubah salah satu data, password wajib diubah</small>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $pass ?>">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="ml-4">Preview</label>
                                <div class="form-group" align="center">
                                    <img src="assets/img/user/<?= $gambar ?>" class="img-thumbnail ml-4" width="250" alt="" id="gambar_load">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <a href="?page=profile" class="btn btn-danger float-right">KEMBALI</a>
                        <button type="submit" class="btn btn-primary " name="simpan">SIMPAN</button>



                        </form>

                    </div>
                </div>

            </div>

<?php 

    if(isset($_POST['simpan'])) {

            $username   = htmlspecialchars($_POST['username']);
            $nama       = htmlspecialchars($_POST['nama']);
            $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $foto       = $_FILES['gambar']['name'];
            $lokasi     = $_FILES['gambar']['tmp_name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error      = $_FILES['gambar']['error'];

            if(!empty($lokasi)) {

                // cek apakah yang di uplode itu adalah gambar
                        $ekstensiGambarValid    = ['jpg','jpeg','png'];
                        $ekstensiGambar         = explode('.', $foto);
                        $ekstensiGambar         = strtolower(end($ekstensiGambar));


                    if( !in_array ($ekstensiGambar, $ekstensiGambarValid)){

                        echo "<script>
                                
                                Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Yang Anda Upload Bukan Gambar..',
                                      footer: 'silahkan pilih gambar dengan ekstensi jpg,  jpeg  atau  png.!'
                                    })

                            </script>";

                        return false;
                    }

                    // kita batasi ukuran gambar menjadi 1 MB / 1000000 byte

                        if( $ukuranFile > 1500000) {

                            echo "<script>
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Gambar Yang Anda Upload Melebihi Batas..!!',
                                      footer: 'Maksimal 1.5 MB'
                                    })
                                </script>";

                            return false;
                        }                      

                    $upload         = move_uploaded_file($lokasi, 'assets/img/user/' . $foto);



                

                 $sql = $koneksi->query("UPDATE tb_user SET  nama_user = '$nama', username = '$username', password = '$password', foto = '$foto' WHERE id = '$id_user'");

                 if($sql) { 
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
                                  window.location.href='?page=profile';
                                }, 2500);
                                  
                            </script> ";


                  }
            }else{
                $sql2 = $koneksi->query("UPDATE tb_user SET nama_user = '$nama', username = '$username', password = '$password', level = '$level' WHERE id = '$id_user'");

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
                                  window.location.href='?page=profile';
                                }, 2500);
                                  
                            </script> ";


                  }
            }


           


    }


?>