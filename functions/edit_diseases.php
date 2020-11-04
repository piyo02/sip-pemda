<?php

    include '../connect.php';
    include 'session.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $cause = $_POST['cause'];
    // mengubah file di folder causes untuk menyimpan penyebab penyakit
    $filename_cause = $_POST['filename_cause'];
    file_put_contents($filename_cause, $cause);

    $handling = $_POST['handling'];
    $filename_handling = $_POST['filename_handling'];
    file_put_contents($filename_handling, $handling);

    $medicine = $_POST['medicine'];
    $filename_medicine = $_POST['filename_medicine'];
    file_put_contents($filename_medicine, $medicine);

    
    $sql = "UPDATE `diseases` SET `name` = '$name', `description` = '$description' WHERE `diseases`.`id` = $id;";

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