<div class="col-lg">
  <div class="card">
              <div class="card-header bg-primary">
              	<div class="dropdown">
                            <button class="btn btn-success btn-sm float-right dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus mr-1"></i>Tambah Data Transaksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?page=transaksi&aksi=pemasukan">Pemasukan</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?page=transaksi&aksi=pengeluaran">Pengeluaran</a>
                            </div>
                        </div>
          
                <h5 class="m-0">Data Transaksi</h5>
              </div>
              <div class="card-body">
 
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>Tanggal Diterima</th>
                      <th>Tanggal Selesai</th>
                      <th>Jumlah Kiloan</th>
                      <th>Total Bayar</th>
                      <th>Catatan</th>
                      <th>Status</th>
                      <th>Kasir</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                      <?php 
                      $i = 1;
                           $sql2 = $koneksi->query("SELECT * FROM tb_transaksi, tb_pelanggan, tb_user WHERE tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan AND tb_transaksi.id_user = tb_user.id ORDER BY id_transaksi DESC");
                    		while ($data = $sql2->fetch_assoc()) {          
                              
                      ?>

                      <td class="text-center"><?= $i++ ?></td>
                      <td><?= $data['nama_pelanggan'] ?>
                      </td>
                      <td ><?= date('d F Y', strtotime($data['tgl_diterima'])) ?></td>
                      <td><?= date('d F Y', strtotime($data['tgl_selesai'])) ?></td>
                      <td class="text-center"><?= number_format($data['jml_kiloan'],2,',',',') ?> Kg</td>
                      <td>
                      
                      	<?php

                      		$ratusan = substr($data['tot_bayar'], -3);


                      		if($ratusan >= 000 && $ratusan <= 250) {
                            $akhir = $data['tot_bayar'] - $ratusan; 
                          }else if($ratusan >= 251 && $ratusan <= 750){
                            $akhir = $data['tot_bayar'] - $ratusan + 500; 
                          }else if($ratusan >= 751 && $ratusan <= 999){
                            $akhir = $data['tot_bayar'] - $ratusan + 1000; 
                          }

                      		echo  "Rp. " . number_format($akhir,0,',','.');
                      		 

                      	?>
                      		
                      </td>
                      <td><?= $data['catatan'] ?></td>
                      <td>
                      		<?php if($data['status'] == 'Lunas') { ?>
                      			<span class="badge badge-success"><?= $data['status'] ?></span>
                      		<?php }else{ ?>
                      			<span class="badge badge-danger"><?= $data['status'] ?></span>
                      		<?php } ?>
                      </td>
                      <td><?= $data['nama_user'] ?></td>
                      <td class="text-center">

                      		<?php if($data['status'] == "Lunas") { ?>
                      			<a href="?page=transaksi&aksi=hapus&id=<?= $data['id_transaksi'] ?>&id_lap=<?= $data3['id_laporan'] ?>" class="btn btn-danger btn-xs hapus"><i class="fas fa-trash mr-1"></i>Hapus</a>
                      		<?php }else{ ?>
                      			<a href="?page=transaksi&aksi=bayar&id=<?= $data['id_transaksi'] ?>" class="btn btn-primary btn-xs"><i class="fas fa-money-bill-alt mr-1"></i>Bayar</a>
                      		<?php } ?>

                      </td>
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

        <div class="card ">
            <div class="card-header bg-info">
                Perhatian.
            </div>
            <div class="card-body">
              <small class="text-danger">
                ** Jika terdapat kerusaka yang di sebabkan oleh petugas kasir, maka petugas kasir akan bertanggung jawab atas kerusakan yang terjadi. <br>
                ** Cucian akan di cek terlebih dahulu untuk mengetahui kondisi cucian sebelum di timbang. <br>
                ** Jika kerusakan disebabkan oleh pelanggan (misal pakaian sobek ketika pengambilan, bukan tanggung jawab petugas laundry).
              </small>
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