<div class="col-lg">
  <div class="card">
              <div class="card-header bg-primary">
                <a href="?page=status&aksi=tambah" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Tambah Status Pelanggan</a>
                <h5 class="m-0">Data Status Pelanggan</h5>
              </div>
              <div class="card-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                      <th width="30">No</th>
                      <th>Status Pelanggan</th>
                      <th width="30">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                      <?php 
                      $i = 1;
                          $sql = $koneksi->query("SELECT * FROM tb_status");
                          while ($data = $sql->fetch_assoc()) {
                              
                      ?>

                      <td class="text-center"><?= $i++ ?></td>
                      <td><?= $data['status'] ?>
                      </td>
                      
                      <td class="text-center">
                        <a href="?page=status&aksi=edit&id=<?= $data['id_status'] ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="?page=status&aksi=hapus&id=<?= $data['id_status'] ?>" class="btn btn-danger btn-xs hapus" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
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