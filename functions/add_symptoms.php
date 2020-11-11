<?php
    include '../connect.php';
    include 'session.php';

    $nama = $_POST['nama'];

    $sql = "INSERT INTO `gejala` (`id`, `nama`)
            VALUES (NULL, '$nama');";

    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $_SESSION['message'] = "Berhasil Menambahkan Gejala!";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Menambahkan Gejala!";
        $_SESSION['color_alert'] = "danger";   
    }
    header("Location: ../pages/symptoms.php");
    exit;

?>