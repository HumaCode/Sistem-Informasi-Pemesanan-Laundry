<?php 


	session_start();

	session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="assets/sweetalert2.css">

	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/sweetalert2.js"></script>
</head>
<body>
	

          <script>
            setTimeout(function() {
                Swal.fire({
                          icon: 'success',
                          title: 'Berhasil..',
                          text: 'Anda Berhasil Logout..',
                          showConfirmButton: true
                });
            }, 10);
              window.setTimeout(function(){
                  window.location.href='login.php';
                }, 2000);
                  
            </script> ;

</body>
</html>