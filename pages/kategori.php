<?php 
  include '../connect.php';
  include '../functions/session.php';

  $query = "SELECT * FROM `kategori_penyakit` ORDER BY `kategori_penyakit` ASC;";

  $sql = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIP-PEMDA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

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
                <a href="dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Konsultasi
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
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
                <a href="gejala.php" class="nav-link active">
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
                  <i class="nav-icon fas fa-user-md"></i>
                  <p>
                    Rekam Medik
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
                <h1 class="m-0 text-dark">Kategori Penyakit</h1>
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- jika ada data session message, tampilkan pesan tersebut -->
              <?php if(isset($_SESSION['message'])){ ?>
              <div class="col-12">
                <div class="alert alert-<?php echo $_SESSION['color_alert'] ?> alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $_SESSION['message']; ?>
                </div>
              </div>
              <?php 
                unset($_SESSION['message']);
                unset($_SESSION['color_alert']);
              } ?>
              
              <div class="card col-12">
              <!-- tombol tambah muncul hanya untuk user dengan role admin -->
              <?php if($_SESSION['role'] == "admin"){ ?>
                <div class="card-header col-12">
                  <a href="tambah_kategori.php" class="btn btn-sm btn-primary float-right">Tambah Kategori Penyakit</a>
                </div>
              <?php } ?>
                <div class="card-body">
                  <?php
                    if(mysqli_num_rows($sql) == 0){ ?>
                      Tidak ada data tentang Kategori Penyakit
                  <?php 
                    } else { 
                  ?>
                    <table id="tabel-gejala" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kategori Penyakit</th>
                          <?php if($_SESSION['role'] == "admin"){ ?>
                          <th>Aksi</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $number = 1;
                          while($datas = mysqli_fetch_assoc($sql)){ 
                        ?>
                        <tr>
                          <td><?php echo $number++; ?></td>
                          <td><?php echo $datas['kategori_penyakit']; ?></td>
                          <?php if($_SESSION['role'] == "admin"){ ?>
                          <td>
                              <a href="edit_kategori.php?id=<?php echo $datas['id_kategori_penyakit']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                              <a href="../functions/hapus_kategori.php?id=<?php echo $datas['id_kategori_penyakit']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus gejala ini?');" class="btn btn-sm btn-danger">Hapus</a>
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <?php
                    }
                  ?>
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

    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script src="../dist/js/adminlte.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>

    <script>
      $(function () {
        $('#tabel-gejala').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
  </body>
</html>
