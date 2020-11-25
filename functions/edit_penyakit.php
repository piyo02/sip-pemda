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

        $gejala = $_POST['gejala'];
        if(count($gejala) > 0){
            $sql = "DELETE FROM `gejala_penyakit` WHERE `id_penyakit`=$id;";
            $mysqli->query($sql);

            $sql = "INSERT INTO `gejala_penyakit` (`id`, `id_penyakit`, `id_gejala`) VALUES ";
            foreach ($gejala as $id_gejala) {
                $sql .= "(NULL, $id, $id_gejala), ";
            }
            $sql = rtrim($sql, ', ');
            $mysqli->query($sql);
        }
    } else {
        // Kalau gagal, kembali ke halaman gejala dan berikan alert gagal tambah data
        $_SESSION['message'] = "Gagal Mengubah data Penyakit!";
        $_SESSION['color_alert'] = "danger";
    }
    header("Location: ../pages/penyakit.php");
    exit;
?>