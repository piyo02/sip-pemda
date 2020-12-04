<?php
    include '../connect.php';
    include 'session.php';

    $nama = $_POST['nama'];

    $sql = "INSERT INTO `kategori_penyakit` (`id_kategori_penyakit`, `kategori_penyakit`)
            VALUES (NULL, '$nama');";

    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $_SESSION['message'] = "Berhasil Menambahkan Kategori Penyakit!";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Menambahkan Kategori Penyakit!";
        $_SESSION['color_alert'] = "danger";   
    }
    header("Location: ../pages/kategori.php");
    exit;

?>