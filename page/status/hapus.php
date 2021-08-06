<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM tb_status WHERE id_status = '$id'");

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
                  window.location.href='?page=status';
                }, 2000);
			</script>";

	 }
	

?>