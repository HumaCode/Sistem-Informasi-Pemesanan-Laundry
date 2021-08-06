<div class="col-lg">
  <div class="card">
              <div class="card-header bg-primary">
                <a href="?page=pelanggan&aksi=tambah" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data Pelanggan</a>
                <h5 class="m-0">Data Pelanggan</h5>
              </div>
              <div class="card-body">

                <?php if($_GET['page'] == 'pelanggan') : ?>
                    <div class="flash" data-flashdata="<?= $_GET['page'] ?>"></div>
                <?php endif; ?>

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                      <?php 
                      $i = 1;
                          $sql = $koneksi->query("SELECT * FROM tb_pelanggan, tb_status WHERE tb_pelanggan.id_status = tb_status.id_status ORDER BY id_pelanggan DESC");
                          while ($data = $sql->fetch_assoc()) {
                              
                      ?>

                      <td class="text-center"><?= $i++ ?></td>
                      <td><?= $data['nama_pelanggan'] ?>
                      </td>
                      <td ><?= $data['alamat'] ?></td>
                      <td class="text-center"><?= $data['no_tlp'] ?></td>
                      <td><?= $data['status'] ?></td>
                      <td class="text-center">
                        <a href="?page=pelanggan&aksi=edit&id=<?= $data['id_pelanggan'] ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="?page=pelanggan&aksi=hapus&id=<?= $data['id_pelanggan'] ?>" class="btn btn-danger btn-xs hapus" ><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
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