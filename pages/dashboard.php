<?php
  include '../connect.php';
  include '../functions/session.php';

  $query = "SELECT * FROM `gejala` ORDER BY `nama` ASC;";

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

        <!-- codingan untuk tombol logout -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="btn btn-sm btn-secondary" href="../functions/logout.php">
              <i class="fas fa-sign-out-alt"></i>  Log Out
            </a>
          </li>
        </ul>
        <!-- codingan untuk tombol logout -->
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
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Konsultasi</h1>
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 alert alert-success text-center" role="alert">
                Silahkan Memilih Gejala!
              </div>
              <div class="col-12">
                <div class="row justify-content-between">
                  <div class="col-4">
                    <div class="card container p-3">
                      <div class="form-group">
                        <label for="daftar-gejala">Tambah Gejala</label>
                        <select name="daftar-gejala" id="daftar-gejala" class="form-control">
                          <?php while ($datas = mysqli_fetch_assoc($sql)) { ?>
                            <option id="G<?php echo $datas['id'] ?>" value="<?php echo $datas['id'] ?>"><?php echo $datas['nama'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-sm btn-success" id="tambah-gejala">Tambah</button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body">
                        <form action="diagnosis.php" method="post">
                          <h5>Daftar Gejala Pilihan</h5>
                          <div id="list-gejala">
                            <input type="hidden" name="array-gejala" id="array-gejala" value="">
                          </div>
                          <button class="btn btn-sm btn-success" id="btn-form" disabled>Diagnosa</button>
                        </form>
                      </div>
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
      const btnAddSymp = document.getElementById('tambah-gejala');
      const daftarGejala = document.getElementById('daftar-gejala');
      const listGejala = document.getElementById('list-gejala');
      const btnForm = document.getElementById('btn-form');
      const arrayGejala = document.getElementById('array-gejala');

      function deleteSympInList(index, value) {
        daftarGejala.options[index].removeAttribute('disabled');
        $(`#${index}`).remove();

        console.log(arrayGejala);
        // ubah string pada inputan menjadi array
        array = arrayGejala.value.split(",");

        // cari index dari id gejala pada array
        index = array.indexOf(value.toString());

        // hapus gejala tersebut pada array
        array.splice(index, 1);

        // ubah value pada inputan menjadi nilai baru yang dimana gejala tadi telah di hapus
        arrayGejala.value = array.toString();

        if( arrayGejala.value = "" || array.length == 2){
          btnForm.disabled = true;
        }
      }

      btnAddSymp.addEventListener('click', () => {
        const symptomValue = daftarGejala.value;
        const symptomText = daftarGejala.options[daftarGejala.selectedIndex].text;
        
        if(!daftarGejala.options[daftarGejala.selectedIndex].disabled){
          // buat div
          const div = document.createElement("div");
          div.setAttribute("class", "input-group input-group-sm mb-2")
          div.setAttribute("id", daftarGejala.selectedIndex)

          // buat input
          const input = document.createElement("input");
          input.setAttribute("class", "form-control")
          input.setAttribute("type", "text");
          input.setAttribute("readonly", "true");
          input.setAttribute("value", symptomText);
          input.setAttribute("data", symptomValue);
          
          // buat span
          const span = document.createElement("span");
          span.setAttribute("class", "input-group-append")

          // buat button
          const button = document.createElement("button");
          button.setAttribute("class", "btn btn-danger btn-flat")
          button.setAttribute("type", "button")
          button.setAttribute("onclick", `deleteSympInList(${daftarGejala.selectedIndex}, ${symptomValue})`)
          // tambahkan text kedalam button
          const textButton = document.createTextNode("Hapus");
          button.appendChild(textButton);

          // tambahkan button ke dalam span
          span.appendChild(button);

          // tambahkan input ke dalam div
          div.appendChild(input)

          // tambahkan span ke dalam div
          div.appendChild(span)
          
          // tambahkan div ke dalam list gejala
          listGejala.appendChild(div)

          // disable pilihan yang sudah di pilih
          daftarGejala.options[daftarGejala.selectedIndex].disabled = "true";

          arrayGejala.value = `${arrayGejala.value},${symptomValue}`;
          countArray = arrayGejala.value.split(",");

          if( arrayGejala.value != "" && countArray.length > 2){
            btnForm.disabled = false;
          }
        }
      });

    </script>

  </body>
</html>
