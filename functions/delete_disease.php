<?php
    include '../connect.php';
    include 'session.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `diseases` WHERE `diseases`.`id` = $id";

    if ($mysqli->query($sql) === TRUE) {
        $sql = "DELETE FROM `symp_of_disease` WHERE `symp_of_disease`.`disease_id` = $id";
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