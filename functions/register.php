<?php
    include '../connect.php';
    session_start();

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re_password']);
    $nama_wali = $_POST['nama_wali'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    
    $nama_anak = $_POST['nama_anak'];
    $umur = $_POST['umur'];
    $id_jenis_kelamin = $_POST['jenis_kelamin'];
    
    if($password == $re_password){
        $sql = "INSERT INTO `wali` (`id_wali`, `username`, `password`, `alamat`, `nama_wali`, `no_hp`, `role`)
                VALUES (NULL, '$username', '$password', '$alamat', '$nama_wali', '$no_hp', 'user')";
        
        if ($mysqli->query($sql) === TRUE) {
            $id_wali = $mysqli->insert_id;
            $sql = "INSERT INTO `anak` (`id_anak`, `id_wali`, `id_jenis_kelamin`, `nama_anak`, `umur`)
                    VALUES (NULL, '$id_wali', '$id_jenis_kelamin', '$nama_anak', $umur)";
    
            if($mysqli->query($sql) != TRUE){
                $sql = "DELETE FROM `wali` WHERE `id_wali`=$id_wali";
                $mysqli->query($sql);
                $_SESSION['message'] = "Gagal Mendaftarkan Akun";
                $_SESSION['color_alert'] = "danger";
            }
            
            // kesalahannya tadi, $mysqli di tulis $conn, sedangkan di file connect.php ditulis $mysqli, makanya eror
            // kalau berhasil tambah data, kembali ke halaman login, dan berikan alert berhasil register
            $_SESSION['message'] = "Berhasil Mendaftarkan Akun";
            $_SESSION['color_alert'] = "success";
            header("Location: ../pages/login.php");
            exit;
        } else {
            // Kalau gagal, kembali ke halaman register dan berikan alert gagal register
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            die;
            $_SESSION['message'] = "Gagal Mendaftarkan Akun";
            $_SESSION['color_alert'] = "danger";
        }
    }else {
        $_SESSION['message'] = "Password yang Anda Masukkan Tidak Cocok";
        $_SESSION['color_alert'] = "danger";
    }
    // var_dump($_SESSION);
    // die;

    header("Location: ../pages/register.php");
    exit;
?>