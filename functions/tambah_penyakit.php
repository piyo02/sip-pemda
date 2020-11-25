<?php
    include '../connect.php';
    include 'session.php';
    // aktifkan sesion untuk menyimpan pesan hasil penyimpanan data

    $nama = $_POST['nama'];
    $penjelasan = $_POST['penjelasan'];

    $filename = str_replace(' ', '_', $nama); // mengganti spasi pada nama penyakit dengan _
    $filename = str_replace("-", "_", $filename); // mengganti - pada nama penyakit dengan _
    $filename = strtolower($filename);

    $penyebab = $_POST['penyebab'];
    // membuat file di folder causes untuk menyimpan penyebab penyakit
    $filename_penyebab = '../causes/cause_'.$filename.time().'.html';
    file_put_contents($filename_penyebab, $penyebab, FILE_APPEND);

    $penanganan = $_POST['penanganan'];
    // membuat file di folder handlings untuk menyimpan penanganan penyakit
    $filename_penanganan = '../handlings/handling_'.$filename.time().'.html';
    file_put_contents($filename_penanganan, $penanganan, FILE_APPEND);

    $obat = $_POST['obat'];
    // membuat file di folder medicines untuk menyimpan obat penyakit
    $filename_obat = '../medicines/medicine_'.$filename.time().'.html'; 
    file_put_contents($filename_obat, $obat, FILE_APPEND);

    $sql = "INSERT INTO `penyakit` (`id`, `nama`, `penjelasan`, `penanganan`, `penyebab`, `obat`)
            VALUES (NULL, '$nama', '$penjelasan', '$filename_penanganan', '$filename_penyebab', '$filename_obat');";
    
    if ($mysqli->query($sql) === TRUE) {
        // id dari penyakit yang baru di insertkan ke database, digunakan untuk insert data gejala ke table symp_of_disease
        $id_penyakit = $mysqli->insert_id;
        $_SESSION['message'] = "Berhasil Menambahkan Penyakit";
        $_SESSION['color_alert'] = "success";

        $gejala = $_POST['gejala'];
        // jika memiliki gejala, baru di jalankan sql untuk menyimpan gejala-gejala dari penyakit
        if(count($gejala) > 0){
            $sql = "INSERT INTO `gejala_penyakit` (`id`, `id_penyakit`, `id_gejala`) VALUES ";
            foreach ($gejala as $id_gejala) {
                $sql .= "(NULL, $id_penyakit, $id_gejala), ";
            }
            $sql = rtrim($sql, ', ');
            // jika gagal, maka hapus data penyakit yang baru ditambahkan
            if($mysqli->query($sql) != TRUE){
                $sql = "DELETE FROM `penyakit` WHERE `id`=$id_penyakit";
                $mysqli->query($sql);
                $_SESSION['message'] = "Gagal Menambahkan Penyakit ";
                $_SESSION['color_alert'] = "danger";
            }
        }

    } else {
        $_SESSION['message'] = $mysqli->error;
        $_SESSION['color_alert'] = "danger";
    }

    header("Location: ../pages/penyakit.php");
    exit;
    
?>