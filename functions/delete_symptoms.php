<?php

    include '../connect.php';
    include 'session.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `gejala` WHERE `gejala`.`id` = $id";

    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil hapus data, kembali ke halaman gejala, dan berikan alert berhasil hapus data
        $_SESSION['message'] = "Berhasil Menghapus gejala";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal hapus data
        $_SESSION['message'] = "Gagal Menghapus Gejala";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/symptoms.php");
    exit;

?>