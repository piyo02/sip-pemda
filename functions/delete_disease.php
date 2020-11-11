<?php
    include '../connect.php';
    include 'session.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `penyakit` WHERE `penyakit`.`id` = $id";

    if ($mysqli->query($sql) === TRUE) {
        $sql = "DELETE FROM `gejala_penyakit` WHERE `gejala_penyakit`.`id_penyakit` = $id";
        if ($mysqli->query($sql) != TRUE) {
            $_SESSION['message'] = "Gagal Menghapus Data Penyakit";
            $_SESSION['color_alert'] = "danger";
        }
        // kalau berhasil hapus data, kembali ke halaman gejala, dan berikan alert berhasil hapus data
        $_SESSION['message'] = "Berhasil Menghapus Data Penyakit";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal hapus data
        $_SESSION['message'] = "Gagal Menghapus Data Penyakit";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/diseases.php");
    exit;

?>