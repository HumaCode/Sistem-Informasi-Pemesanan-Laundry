<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM tb_laporan WHERE id_laporan = '$id'");

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
                  window.location.href='?page=laporan';
                }, 2000);
			</script>";

	 }
	

?>