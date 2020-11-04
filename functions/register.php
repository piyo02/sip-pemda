<?php
    include '../connect.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $child_name = $_POST['child_name'];
    $age = $_POST['age'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `child_name`, `age`, `phone_number`, `address`, `role`)
            VALUES (NULL, '$username', '$email', '$password', '$child_name', $age, '$phone_number', '$address', 'user')";
    
    if ($mysqli->query($sql) === TRUE) {
        // kesalahannya tadi, $mysqli di tulis $conn, sedangkan di file connect.php ditulis $mysqli, makanya eror
        // kalau berhasil tambah data, kembali ke halaman login, dan berikan alert berhasil register
        $messages = "Berhasil Mendaftarkan Akun";
        header("Location: ../pages/login.php");
        exit;
    } else {
        // Kalau gagal, kembali ke halaman register dan berikan alert gagal register
        $messages = "Gagal Mendaftarkan Akun";
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        header("Location: ../pages/register.php");
        exit;
    }

?>