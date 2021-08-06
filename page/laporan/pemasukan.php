<div class="col-lg">
  <div class="card">
              <div class="card-header bg-primary">
              	<a href="?page=transaksi&aksi=pengeluaran" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Tambah Pengeluaran</a>

                      <div class="dropdown">
                            <button class="btn btn-secondary btn-sm float-right dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye mr-1"></i>Data Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?page=laporan">Semua Laporan</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?page=laporan&aksi=pengeluaran">Laporan Pengeluaran</a>
                            </div>
                        </div>

                 <button class="btn btn-sm btn-danger float-right mr-2" data-toggle="modal" data-target="#modal-print"><i class=" fas fa-print mr-1"></i>Cetak</button>
          
                <h5 class="m-0">Laporan Pemasukan</h5>
              </div>
              <div class="card-body">
 
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Tanggal Transaksi</th>
                      <th>Keterangan</th>
                      <th>Catatan</th>
                      <th>Kasir</th>
                      <th>Pemasukan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                      <?php 
                      $i = 1;
                           $sql2 = $koneksi->query("SELECT * FROM tb_laporan, tb_user WHERE tb_laporan.id_user = tb_user.id AND pengeluaran = 0 ORDER BY id_laporan DESC");
                    		while ($data = $sql2->fetch_assoc()) {
                              
                      ?>

                      <td class="text-center"><?= $i++ ?></td>
                      </td>
                      <td ><?= date('d F Y', strtotime($data['tgl_masuk'])) ?></td>
                      <td class="text-center">
                      		<span class="badge badge-success "><?= $data['keterangan'] ?></span>
                      	
                      	
                      		
                      </td>
                      <td><?= $data['catatan'] ?></td>
                      <td><?= $data['nama_user'] ?></td>
                      <td>
                      		
                      		<?php

                      		$ratusan = substr($data['pemasukan'], -3);

                      		if($ratusan >= 000 && $ratusan <= 250) {
                            $akhir = $data['pemasukan'] - $ratusan;
                          }else if($ratusan >= 260 && $ratusan <= 750){
                            $akhir = $data['pemasukan'] - $ratusan + 500;
                          }else if($ratusan >= 750 && $ratusan <= 999){
                            $akhir = $data['pemasukan'] - $ratusan + 1000;
                          }

                      		if($data['keterangan'] == 'Pemasukan') {
                      			echo  "Rp. " . number_format($akhir,0,',','.');	
                      		}else{
                      			echo  'Rp. 0';
                      		}
                      		
                      		 

                      	?>
                      		
                      </td>
                      <td class="text-center">

                      			<a href="?page=laporan&aksi=hapus&id=<?= $data['id_laporan'] ?>" class="btn btn-danger btn-xs hapus"><i class="fas fa-trash mr-1"></i>Hapus</a>

                      </td>
                    </tr>
                   <?php 	
                   			$ratusan = substr($data['pemasukan'], -3);

                      		if($ratusan >= 000 && $ratusan <= 250) {
                            $masuk1 = $data['pemasukan'] - $ratusan;
                          }else if($ratusan >= 260 && $ratusan <= 750){
                            $masuk1 = $data['pemasukan'] - $ratusan + 500;
                          }else if($ratusan >= 750 && $ratusan <= 999){
                            $masuk1 = $data['pemasukan'] - $ratusan + 1000;
                          }

                      		if($data['keterangan'] == 'Pemasukan') {
                      			$masuk = $masuk + $masuk1;	
                      		}

                   			
               			} ?>
                  </tbody>

                  		<tr>
		                	<th colspan="5" class="text-center">Total Pemasukan </th>
		                	<td colspan="3"><strong><?= 'Rp. ' . number_format($masuk,0,',','.') ?></strong></td>
		                	
		                </tr>
		                

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



          <div class="modal fade" id="modal-print">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content  ">

            <h2 class="text-center pt-2"><strong> Opsi Cetak</strong></h2>
            <hr>

            <div class="modal-body">


                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Harian</h3>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-4">
                                      <form action="page/laporan/masukLapHarian.php" method="post">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <select name="tanggal" class="form-control">

                                                <?php

                                                $mulai = 1;
                                                for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">

                                                <?php

                                                $bulan = 1;
                                                for ($i = $bulan; $i < $bulan + 12; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">

                                                <?php

                                                $mulai = date('Y');
                                                for ($i = $mulai; $i < $mulai + 60; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <button class="btn btn-sm btn-primary btn-flat btn-block"><i class="fas fa-print mr-1"></i> Cetak Laporan</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Bulanan</h3>
                            </div>

                            <div class="card-body">

                                <div class="row">



                                    <div class="col-sm-4">
                                        <form action="page/laporan/masukLapBulanan.php" method="post">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <select name="tanggal" class="form-control">

                                                <?php

                                                $mulai = 1;
                                                for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">

                                                <?php

                                                $bulan = 1;
                                                for ($i = $bulan; $i < $bulan + 12; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">

                                                <?php

                                                $mulai = date('Y');
                                                for ($i = $mulai; $i < $mulai + 60; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <button class="btn btn-sm btn-primary btn-flat btn-block"><i class="fas fa-print mr-1"></i> Cetak Laporan</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

