<?php
  include '../functions/session.php';
  include '../connect.php';
  include '../functions/diagnosis.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIP-PEMDA | Diagnosa </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="btn btn-sm btn-secondary" href="../functions/logout.php">
              <i class="fas fa-sign-out-alt"></i>  Log Out
            </a>
          </li>
        </ul>
      </nav>

      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/sip_pemda" class="brand-link">
          <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">SIP-PEMDA</span>
        </a>

        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="profil.php" class="d-block"><?php echo $_SESSION['username'] ?></a>
            </div>
          </div>
          <!-- ini codingan untuk menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <!-- href nya di sesuaikan dengan nama filenya -->
                <a href="dashboard.php" class="nav-link active">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Konsultasi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="penyakit.php" class="nav-link">
                  <i class="nav-icon fas fa-disease"></i>
                  <p>
                    Daftar Penyakit
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gejala.php" class="nav-link">
                  <i class="nav-icon fas fa-heartbeat"></i>
                  <p>
                    Daftar Gejala
                  </p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="kategori.php" class="nav-link">
                      <i class="nav-icon fas fa-list-ul"></i>
                      <p>
                        Kategori Penyakit
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pakar.php" class="nav-link">
                  <i class="nav-icon fas fa-user-md"></i>
                  <p>
                    Informasi Pakar
                  </p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="wali.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Data Wali
                  </p>
                </a>
              </li> -->
            </ul>
          </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Diagnosa Penyakit</h1>
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                              List Gejala Pilihan Pasien
                            </div>
                            <div class="card-body">
                              <ul>
                              <?php
                                while ($data = mysqli_fetch_assoc($sql_gejala)) {
                                  echo "<li>".$data['gejala']."</li>";
                                }
                              ?>
                              </ul>
                            </div>
                            <?php
                              if($penyakit != 0){ ?>
                              <div class="card-footer">
                                Berdasarkan gejala yang dialami pasien, dapat disimpulkan bahwa gejala tersebut masuk ke dalam kategori penyakit <?php echo $kategori_penyakit; ?> 
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-7">
                    <?php
                      if($penyakit == 0){ ?>
                      <div class="alert alert-danger text-center" role="alert">
                        Tidak ditemukan penyakit yang cocok dengan gejala yang dipilih!!!
                      </div>
                    <?php
                      }else{
                    ?>
                        <div class="card pl-3 pt-2">
                            <h5><?php echo $nama_penyakit; ?></h5>
                        </div>

                        <div class="card collapsed-card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Penjelasan Penyakit</h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-eye"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <?php echo $penjelasan; ?>
                          </div>
                        </div>

                        <div class="card collapsed-card card-danger">
                          <div class="card-header">
                            <h3 class="card-title">Penyebab Penyakit</h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-eye"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <?php include $penyebab; ?>
                          </div>
                        </div>

                        <div class="card collapsed-card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Penanganan Penyakit</h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-eye"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <?php include $penanganan; ?>
                          </div>
                        </div>

                        <div class="card collapsed-card card-secondary">
                          <div class="card-header">
                            <h3 class="card-title">Obat Penyakit</h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-eye"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <?php include $obat; ?>
                          </div>
                        </div>
                    <?php
                      }
                    ?>
                        <div>
                            <a href="dashboard.php" class="btn btn-sm btn-success">Kembali</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <strong>Design 2020</strong>
      </footer>

    </div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../plugins/sparklines/sparkline.js"></script>
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../dist/js/adminlte.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
