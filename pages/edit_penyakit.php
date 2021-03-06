<?php
  include '../connect.php';
  include '../functions/session.php';

  $id = $_GET['id'];
  if($id == ''){
    // fungsi untuk mengembalikan user ke halaman daftar penyakit jika id tidak ditemukan
    header("Location: penyakit.php");
    exit;
  }
  $query_gejala = "SELECT gejala.*, aturan_gejala.id_aturan FROM `gejala` LEFT JOIN aturan_gejala ON aturan_gejala.id_gejala=gejala.id_gejala AND aturan_gejala.id_aturan=$id ORDER BY gejala ASC;";
  $sql_gejala = mysqli_query($mysqli, $query_gejala);

  $query_penyakit = "SELECT `penyakit`.*, 
                      penyebab.penyebab,
                      obat.obat,
                      penanganan.penanganan
                    FROM `penyakit`
                    INNER JOIN obat ON obat.id_obat = penyakit.id_penyakit
                    INNER JOIN penanganan ON penanganan.id_penanganan = penyakit.id_penyakit
                    INNER JOIN penyebab ON penyebab.id_penyebab = penyakit.id_penyakit
                    WHERE `id_penyakit`=$id;";
  $sql_penyakit = mysqli_query($mysqli, $query_penyakit);

  $query_kateg = "SELECT * FROM `kategori_penyakit` ORDER BY `kategori_penyakit` ASC;";
  $sql_kateg = mysqli_query($mysqli, $query_kateg);

  if(mysqli_num_rows($sql_penyakit) == 0){
    // fungsi untuk mengembalikan user ke halaman daftar penyakit jika penyakit dengan id tersebut tidak ditemukan
    $_SESSION['message'] = "Detail Penyakit Tidak Ditemukan!";
    $_SESSION['color_alert'] = "warning";
    header("Location: penyakit.php");
    exit;
  }

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
                <a href="penyakit.php" class="nav-link active">
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
                <h1 class="m-0 text-dark">Tambah Penyakit</h1>
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="card col-12">
                <div class="card-body">
                  <form action="../functions/edit_penyakit.php" method="post">
                  <?php 
                    while($data_penyakit = mysqli_fetch_assoc($sql_penyakit)){ 
                  ?>
                    <input type="hidden" class="form-control" value="<?php echo $data_penyakit['id_penyakit']; ?>" id="id" name="id">
                    <div class="form-group">
                      <label for="">Nama Penyakit</label>
                      <input type="text" class="form-control" value="<?php echo $data_penyakit['penyakit']; ?>" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="">Deskripsi Penyakit</label>
                      <textarea name="penjelasan" id="penjelasan" rows="5" class="form-control"><?php echo $data_penyakit['penjelasan']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Gejala</label>
                      <div class="row">
                        <?php 
                          while($data_gejala = mysqli_fetch_assoc($sql_gejala)){ 
                        ?>
                        <div class="col-2">
                          <div class="form-check">
                            <?php if($data_gejala['id_aturan'] != NULL){ ?>
                            <input checked class="form-check-input" type="checkbox" name="gejala[]" id="<?php echo $data_gejala['id_gejala']; ?>" value="<?php echo $data_gejala['id_gejala']; ?>">
                            <?php } else {?>
                            <input class="form-check-input" type="checkbox" name="gejala[]" id="<?php echo $data_gejala['id_gejala']; ?>" value="<?php echo $data_gejala['id_gejala']; ?>">
                            <?php } ?>
                            <label class="form-check-label" for="<?php echo $data_gejala['id_gejala']; ?>"><?php echo $data_gejala['gejala']; ?></label>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Kategori Penyakit</label>
                      <select name="kategori_penyakit" id="kategori_penyakit" class="form-control">
                        <?php 
                          while($datas = mysqli_fetch_assoc($sql_kateg)){ 
                            if($datas['id_kategori_penyakit'] == $data_penyakit['id_kategori_penyakit']){
                          ?>
                            <option value="<?php echo $datas['id_kategori_penyakit']?>" selected><?php echo $datas['kategori_penyakit']?></option>
                          <?php } else { ?>
                            <option value="<?php echo $datas['id_kategori_penyakit']?>"><?php echo $datas['kategori_penyakit']?></option>
                          <?php } 
                            } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Penyebab</label>
                      <textarea class="textarea" placeholder="Place some text here" name="penyebab" id="penyebab" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php include $data_penyakit['penyebab'] ?> </textarea>
                      <input type="hidden" name="filename_cause" value="<?php echo $data_penyakit['penyebab'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Penanganan</label>
                      <textarea class="textarea" placeholder="Place some text here" name="penanganan" id="penanganan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php include $data_penyakit['penanganan'] ?> </textarea>
                      <input type="hidden" name="filename_handling" value="<?php echo $data_penyakit['penanganan'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Obat</label>
                      <textarea class="textarea" placeholder="Place some text here" name="obat" id="obat" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php include $data_penyakit['obat'] ?> </textarea>
                      <input type="hidden" name="filename_medicine" value="<?php echo $data_penyakit['obat'] ?>">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mr-2">Edit</button>
                    <a href="penyakit.php" class="btn btn-sm btn-default">Kembali</a>
                  <?php } ?>
                  </form>
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
    <script>
      $(function () {
        $('.textarea').summernote()
      })
    </script>
  </body>
</html>
