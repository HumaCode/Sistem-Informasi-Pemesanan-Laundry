<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM tb_user WHERE id = '$id'");

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
                  window.location.href='?page=user';
                }, 2000);
			</script>";

	 }
	

?>