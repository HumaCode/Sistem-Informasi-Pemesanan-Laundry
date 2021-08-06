<div class="col-lg">
  <div class="card">
              <div class="card-header bg-primary">
                <a href="?page=user&aksi=tambah" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Tambah User</a>
                <h5 class="m-0">Data User</h5>
              </div>
              <div class="card-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                      <?php 
                      $i = 1;
                          $sql = $koneksi->query("SELECT * FROM tb_user");
                          while ($data = $sql->fetch_assoc()) {
                              
                      ?>

                      <td class="text-center"><?= $i++ ?></td>
                      <td><?= $data['nama_user'] ?>
                      </td>
                      <td ><?= $data['username'] ?></td>
                      <td>

                      	<?php if($data['level'] == 'Admin') { ?>
                      		<span class="badge badge-success"><?= $data['level'] ?></span>
                      	<?php }else{ ?>
                      		<span class="badge badge-danger"><?= $data['level'] ?></span>
                      	<?php } ?>
                      		
                      </td>
                      <td class="text-center"><img src="assets/img/user/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>" class="img-thumbnail " width="75"></td>
                      <td class="text-center">
                        <a href="?page=user&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="?page=user&aksi=hapus&id=<?= $data['id'] ?>" class="btn btn-danger btn-xs hapus" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                      </td>
                      
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <script>
            $('.hapus').on('click', function(e){
              e.preventDefault();
              const href = $(this).attr('href');

                  Swal.fire({
                      title: 'Apakah anda yakin..?',
                      text: "Data yang sudah dihapus tidak bisa di kembalikan lagi",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ya, Hapus'
                    }).then((result) => {
                      if (result.value) {
                         document.location.href = href;
                      }
                    })
            });


          </script>