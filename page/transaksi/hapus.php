<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM tb_transaksi WHERE id_transaksi = '$id'");

	if ($sql) {
		echo "
		<script>
			 setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Data Berhasil Dihapus..',
                          showConfirmButton: false
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='?page=transaksi';
                }, 2000);
			</script>";

	 }
	

?>