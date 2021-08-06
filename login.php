<?php 

    include "include/koneksi.php";
  // tambahkan juga session start.
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/icon/Cat-laptop.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/sweetalert2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/sweetalert2.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

</head>
<body class="hold-transition login-page">


<div class="login-box">
  <div class="login-logo">
    <b>APP</b> Laundry
  </div>
  <!-- /.login-logo -->
  <div class="card card-primary card-outline">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu.!</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password"  name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col">
            <button type="submit" id="submit" name="login" class="btn btn-primary btn-block">MASUK</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

  

</body>
</html>

<?php 
  
  if(isset($_POST['login'])) {



    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $sql = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username'");
    

    if($sql->num_rows === 1) {
      $data = $sql->fetch_assoc();


       if(password_verify($password, $data['password'])) {

            session_start(); 

              if($data['level'] == 'Admin') {
                $_SESSION['Admin'] = $data['id'];
                header("location:index.php");
              }else if($data['level'] == 'Kasir') {
                $_SESSION['Kasir'] = $data['id'];
                header("location:index.php");
             }
        }else{
          echo "
            <script>
                      Swal.fire({
                                icon: 'error',
                                title: 'Gagal..',
                                text: 'Username atau Password Salah..!!',
                                showConfirmButton: true
                      })
                  </script> ";
        }  

    }else{

     echo "
            <script>
                      Swal.fire({
                                icon: 'error',
                                title: 'Gagal..',
                                text: 'Username atau Password Salah..!!',
                                showConfirmButton: true
                      })
                  </script> ";

    }

  }

?>

