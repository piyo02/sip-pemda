<?php

    include '../connect.php';
    include 'session.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $sql = "UPDATE `kategori_penyakit` SET `kategori_penyakit` = '$nama' WHERE `kategori_penyakit`.`id_kategori_penyakit` = $id;";
    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $_SESSION['message'] = "Berhasil Mengubah data Kategori Penyakit!";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Mengubah data Kategori Penyakit!";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/kategori.php");
    exit;
?>