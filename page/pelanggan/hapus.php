<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id'");

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
                  window.location.href='?page=pelanggan';
                }, 2000);
			</script>";

	 }
	

?>