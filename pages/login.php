<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP-PEMDA | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('../dist/img/background-login.jpg'); background-size: cover;">
<div class="login-box">
  <div class="login-logo">
    <a href="/sip_pemda" class="text-white"><b>SIP-</b>PEMDA</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log In</p>
      <!-- jika ada data session message, tampilkan pesan tersebut -->
      <?php if(isset($_SESSION['message'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['color_alert'] ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $_SESSION['message']; ?>
      </div>
      <?php 
        unset($_SESSION['message']);
        unset($_SESSION['color_alert']);
      } ?>
      <form action="../functions/login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="register.php" class="text-center float-right mt-2">Daftar Akun</a>
      </p>
    </div>
  </div>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
