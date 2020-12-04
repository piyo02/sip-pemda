<?php
    include '../connect.php';
    include 'session.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `penyakit` WHERE `penyakit`.`id_penyakit` = $id";

    if ($mysqli->query($sql) === TRUE) {
        $sql = "DELETE FROM `aturan_gejala` WHERE `aturan_gejala`.`id_aturan` = $id";
        if ($mysqli->query($sql) != TRUE) {
            $_SESSION['message'] = "Gagal Menghapus Data Penyakit";
            $_SESSION['color_alert'] = "danger";
        }
        
        // aturan 
        $sql = "DELETE FROM `aturan` WHERE `aturan`.`id_aturan` = $id";
        $mysqli->query($sql);

        // obat 
        $sql = "DELETE FROM `obat` WHERE `obat`.`id_obat` = $id";
        $mysqli->query($sql);
        // obat_penyakit 
        $sql = "DELETE FROM `obat_penyakit` WHERE `obat_penyakit`.`id_obat` = $id";
        $mysqli->query($sql);

        // penyebab 
        $sql = "DELETE FROM `penyebab` WHERE `penyebab`.`id_penyebab` = $id";
        $mysqli->query($sql);
        // penyebab_penyakit 
        $sql = "DELETE FROM `penyebab_penyakit` WHERE `penyebab_penyakit`.`id_penyebab` = $id";
        $mysqli->query($sql);

        // penanganan 
        $sql = "DELETE FROM `penanganan` WHERE `penanganan`.`id_penanganan` = $id";
        $mysqli->query($sql);
        // penanganan_penyakit 
        $sql = "DELETE FROM `penanganan_penyakit` WHERE `penanganan_penyakit`.`id_penanganan` = $id";
        $mysqli->query($sql);
        
        
        // kalau berhasil hapus data, kembali ke halaman gejala, dan berikan alert berhasil hapus data
        $_SESSION['message'] = "Berhasil Menghapus Data Penyakit";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal hapus data
        $_SESSION['message'] = "Gagal Menghapus Data Penyakit";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/penyakit.php");
    exit;

?>