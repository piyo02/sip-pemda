<?php

    include '../connect.php';
    include 'session.php';

    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE `symptoms` SET `name` = '$name' WHERE `symptoms`.`id` = $id;";

    if ($mysqli->query($sql) === TRUE) {
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $_SESSION['message'] = "Berhasil Mengubah data Gejala!";
        $_SESSION['color_alert'] = "success";
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Mengubah data Gejala!";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/symptoms.php");
    exit;
?>