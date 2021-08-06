<?php 

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_status WHERE id_status = '$id'");

    $data = $sql->fetch_assoc();

?>

<div class="col-lg">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Status Pelanggan</h3>
              </div>

              
                <div class="card-body">
                  <form id="form" method="post" action="">

                      <div class="form-group">
                        <label for="status">Status Pelanggan</label>
                        <input type="text" class="form-control" id="status" name="status"  required value="<?= $data['status'] ?>">
                      </div>

                  
                </div>


                <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary" id="tombol_simpan">SIMPAN</button>
                        <a href="?page=status" class="btn btn-danger float-right" >KEMBALI</a>
                      </div>  
                  </form>
            </div>

            <!-- /.card -->
          </div>

<?php 
    
    if(isset($_POST['tambah'])) {

      $status   = htmlspecialchars($_POST['status']);


      
                        
      $sql2 = $koneksi->query("UPDATE tb_status SET status = '$status' WHERE id_status = '$id'");


  if($sql2) { 
    echo "
          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Berhasil Diubah Menjadi $status',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=status';
                }, 2000);
                  
            </script> ";

      }
                        
  }
                    

?>


        
