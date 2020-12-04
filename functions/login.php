<?php
    // hubungkan dengan file connect.php supaya codingan di connect.php seolah2 ada juga di file ini
    session_start();
    include '../connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM `wali` WHERE `username`='$username' AND `password`='$password';";
    
    $sql = mysqli_query($mysqli, $query); // untuk parameter functionnya di isi dua, $mysqli (variabel untuk konek ke db) dan query nya
    $users = mysqli_num_rows($sql); // menghitung jumlah row yang dihasilkan dari $sql
    
    if($users > 0) { //mengecek ada tidaknya user dari jumlah row, jika rownya lebih dari 0, berarti ada user dengan email dan password yang di inputkan
        // ini codingan untuk melihat data yang telah di dapat
        while($rows = mysqli_fetch_assoc($sql)){
            var_dump($rows);
            // simpan data user ke session untuk mengingat data user yang telah login
            // untuk mengambil datanya, maka codingannya $rows['data yang mau di ambil']

            // tapi karna belum di aktifkan sessionnya, jadi codingan dibawah di komen dulu
            $_SESSION['id'] = $rows['id_wali'];
            $_SESSION['username'] = $rows['nama_wali'];
            // simpan role dari user ke session
            $_SESSION['role'] = $rows['role'];

            // lalu arahkan ke halaman dashboard
            header("Location: ../pages/dashboard.php");
            exit;
        }
    } else {
        echo 'tidak ada user yang ditemukan';
        $messages = "Username/Password Salah, Login Gagal";
        header("Location: ../pages/login.php");
        exit;
    }
?>