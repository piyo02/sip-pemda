<?php
    include '../connect.php';
    session_start();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_anak = $_POST['nama_anak'];
    $umur = $_POST['umur'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_anak`, `umur`, `nomor_telepon`, `alamat`, `role`)
            VALUES (NULL, '$username', '$email', '$password', '$nama_anak', $umur, '$nomor_telepon', '$alamat', 'user')";
    
    if ($mysqli->query($sql) === TRUE) {
        // kesalahannya tadi, $mysqli di tulis $conn, sedangkan di file connect.php ditulis $mysqli, makanya eror
        // kalau berhasil tambah data, kembali ke halaman login, dan berikan alert berhasil register
        $_SESSION['message'] = "Berhasil Mendaftarkan Akun";
        $_SESSION['color_alert'] = "success";
        header("Location: ../pages/login.php");
        exit;
    } else {
        // Kalau gagal, kembali ke halaman register dan berikan alert gagal register
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        $_SESSION['message'] = "Gagal Mendaftarkan Akun";
        $_SESSION['color_alert'] = "danger";
        header("Location: ../pages/register.php");
        exit;
    }

?>