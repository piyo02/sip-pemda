<?php

  include "../connect.php";
  session_start();

  $query = "SELECT * FROM jenis_kelamin";
  $sql = mysqli_query($mysqli, $query);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP-PEMDA | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page" style="background-image: url('../dist/img/background-login.jpg'); background-size: cover;">
<div class="register-box">
  <div class="register-logo">
    <a href="/sip_pemda" class="text-white"><b>SIP-</b>PEMDA</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <?php if(isset($_SESSION['message'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['color_alert'] ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $_SESSION['message']; ?>
      </div>
      <?php 
        unset($_SESSION['message']);
        unset($_SESSION['color_alert']);
      } ?>
      <div class="alert alert-success" role="alert">
        Silahkan Melakukan Registrasi untuk Mendapatkan Username dan Password
      </div>

      <form action="../functions/register.php" method="post"> 
      <!-- kenapa ../ karena action yang kita tuju berbeda folder, yang di tuju adalah file register.php pada folder function, sedangkan file yang sekarang diedit berada di folder pages, jadi kita keluar dulu dari folder pages dengan ../, lalu masuk ke folder functions lalu menuju file register.php -->
      <!-- untuk tiap inputan, berikan id dan name yang sama dengan kolom di database -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Wali" id="nama_wali" name="nama_wali" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="No HP" id="no_hp" name="no_hp" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-book"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Masukkan Ulang Password" id="re_password" name="re_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 mt-5">
          <input type="text" class="form-control" placeholder="Nama Anak" id="nama_anak" name="nama_anak" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Usia" id="umur" name="umur" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-baby"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <?php while($data = mysqli_fetch_assoc($sql)){ ?>
              <option value="<?php echo $data['id_jenis_kelamin']; ?>"><?php echo $data['jenis_kelamin']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <div class="col-12">
        <a href="login.php" class="text-center float-right mt-2">Sudah memiliki akun</a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
