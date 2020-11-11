<?php

    include '../connect.php';
    include 'session.php';

    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_anak = $_POST['nama_anak'];
    $umur = $_POST['umur'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE `users` SET `username` = '$username', `email` = '$email', `nama_anak` = '$nama_anak', `umur` = '$umur', `nomor_telepon` = '$nomor_telepon', `alamat` = '$alamat' WHERE `users`.`id` = $id;";

    if ($mysqli->query($sql) === TRUE) {
        
        $_SESSION['message'] = "Berhasil Mengubah data User!";
        $_SESSION['color_alert'] = "success";
        // kalau berhasil tambah data, kembali ke halaman gejala, dan berikan alert berhasil tambah data
        $password = md5($_POST['new_password']);
        
        if( $password ){
            
            $query = "SELECT * FROM `users` WHERE `id`=$id ;";
            $sql = mysqli_query($mysqli, $query);
            while( $datas = mysqli_fetch_assoc($sql) ){
                
                if( $datas['password'] == md5($_POST['password']) ){
                    $sql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`id` = $id;";
                    
                    if ( $mysqli->query($sql) === TRUE ) {
                        $_SESSION['message'] = "Berhasil Mengubah data User dan Password!";
                        $_SESSION['color_alert'] = "success";
                    }
                    else {
                        $_SESSION['message'] = "Gagal Mengubah Password!";
                        $_SESSION['color_alert'] = "danger";
                    }
                }
            }
        }
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Mengubah data User!";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/profil.php");
    exit;

?>