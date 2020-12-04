<?php

    include '../connect.php';
    include 'session.php';

    $_SESSION['message'] = "Gagal Mengubah data User!";
    $_SESSION['color_alert'] = "danger";

    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $nama_wali = $_POST['nama_wali'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $password = md5($_POST['new_password']);

    $query = "SELECT * FROM `wali` WHERE `id_wali`=$id ;";
    $sql = mysqli_query($mysqli, $query);
    while( $datas = mysqli_fetch_assoc($sql) ){
        
        $sql = "UPDATE `wali` SET `username` = '$username', `nama_wali` = '$nama_wali', `no_hp` = '$no_hp', `alamat` = '$alamat' WHERE `wali`.`id_wali` = $id;";
        if( $datas['password'] == md5($_POST['password']) ){
            $sql = "UPDATE `wali` SET `username` = '$username', `nama_wali` = '$nama_wali', `no_hp` = '$no_hp', `alamat` = '$alamat', `password` = '$password' WHERE `wali`.`id_wali` = $id;";
            $ganti_password = true;
        } else {
            $_SESSION['message'] = "Password Lama Anda tidak Cocok!";
            $_SESSION['color_alert'] = "danger";
            $ganti_password = false;
        }
        
        // if ($mysqli->query($sql) === TRUE && $mysqli->query($sql_anak) === TRUE) {
        if ($mysqli->query($sql) === TRUE && $ganti_password) {
            $_SESSION['message'] = "Berhasil Mengubah data User!";
            $_SESSION['color_alert'] = "success";
            // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        
        }
    }
    header("Location: ../pages/profil.php");
    exit;

?>