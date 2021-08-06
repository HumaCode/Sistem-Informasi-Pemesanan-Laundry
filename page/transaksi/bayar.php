<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE id_transaksi = '$id'");
	$data = $sql->fetch_assoc();

	$tgl 			= $data['tgl_diterima'];
	$pemasukan 		= $data['tot_bayar'];
	$catatan		= $data['catatan'];
	$id_pelanggan	= $data['id_user'];



	$sql2 = $koneksi->query("INSERT INTO tb_laporan (id_pelanggan, id_user, tgl_masuk, pemasukan, pengeluaran, catatan, keterangan) VALUES ('$id_pelanggan', '$id_user', '$tgl', '$pemasukan', 0, '$catatan', 'Pemasukan')");

	$sql2 = $koneksi->query("UPDATE tb_transaksi SET status = 'Lunas' WHERE id_transaksi = '$id'");

	if ($sql2) {
		echo "
		<script>
			 setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Pelanggan Telah Melunasi Tagihan..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=transaksi';
                }, 2000);
			</script>";

	 }  