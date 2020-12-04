<?php

    include '../connect.php';
    include 'session.php';

    $_SESSION['message'] = "Gagal Mengubah data Anak!";
    $_SESSION['color_alert'] = "danger";

    $id_anak = $_POST['id_anak'];
    $nama_anak = $_POST['nama_anak'];
    $umur = $_POST['umur'];
    $id_jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE `anak` SET `nama_anak` = '$nama_anak', `umur` = '$umur', `id_jenis_kelamin` = '$id_jenis_kelamin' WHERE `anak`.`id_anak` = $id_anak;";
        
    if ($mysqli->query($sql) === TRUE) {
        $_SESSION['message'] = "Berhasil Mengubah data Anak!";
        $_SESSION['color_alert'] = "success";
        // kalau berhasil mengubah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
    
    }
    header("Location: ../pages/profil.php");
    exit;

?>