<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SIP-PEMDA | Homepage</title>
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">

            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container">
                    <a href="/sip_pemda" class="navbar-brand">
                        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                            style="opacity: .8">
                        <span class="brand-text font-weight-light">SIP-PEMDA</span>
                    </a>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <?php if (isset($_SESSION['id'])){ ?>
                            <a href="pages/dashboard.php" class="btn btn-sm btn-default">Dashboard</a>
                        <?php } else { ?>
                            <a href="pages/login.php" class="btn btn-sm btn-primary mr-3">Login</a>
                            <a href="pages/register.php" class="btn btn-sm btn-default">Register</a>
                        <?php } ?>
                    </ul>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"> Homepage Website <small>SIP-PEMDA</small></h1>
                                <p class="mt-4">Sistem Pakar adalah sistem komputer yang bisa meniru kemampuan seorang pakar. Pakar yang dimaksud disini ialah seorang dokter spesialis anak. Tujuan dibuatnya
                                sistem pakar diagnosa penyakit menular pada anak adalah untuk mempermudah orang tua dalam mendiagnosa penyakit yang dialami oleh anak dan dapat segera mendapatkan
                                penanganan sesuai penyakit yang dialami oleh anak dan menghemat waktu dalam pengambilan keputusan. Bagi pakar diharapkan dapat menyimpan pengetahuan dan keahlian
                                para pakar</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    Design &copy; 2020
                </div>
                <strong>SIP-PEMDA</strong>
            </footer>
        </div>


        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>