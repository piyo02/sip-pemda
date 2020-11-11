<?php

    include '../connect.php';
    include 'session.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $penjelasan = $_POST['penjelasan'];

    $penyebab = $_POST['penyebab'];
    // mengubah file di folder causes untuk menyimpan penyebab penyakit
    $filename_cause = $_POST['filename_cause'];
    file_put_contents($filename_cause, $penyebab);

    $penanganan = $_POST['penanganan'];
    $filename_handling = $_POST['filename_handling'];
    file_put_contents($filename_handling, $penanganan);

    $obat = $_POST['obat'];
    $filename_medicine = $_POST['filename_medicine'];
    file_put_contents($filename_medicine, $obat);

    
    $sql = "UPDATE `penyakit` SET `nama` = '$nama', `penjelasan` = '$penjelasan' WHERE `penyakit`.`id` = $id;";

    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $_SESSION['message'] = "Berhasil Mengubah data Penyakit!";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Mengubah data Penyakit!";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/diseases.php");
    exit;
?>