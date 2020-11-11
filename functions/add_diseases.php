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
    $filename_cause = '../causes/cause_'.$filename.time().'.html';
    file_put_contents($filename_cause, $penyebab, FILE_APPEND);

    $penanganan = $_POST['penanganan'];
    // membuat file di folder handlings untuk menyimpan penanganan penyakit
    $filename_handling = '../handlings/handling_'.$filename.time().'.html';
    file_put_contents($filename_handling, $penanganan, FILE_APPEND);

    $obat = $_POST['obat'];
    // membuat file di folder medicines untuk menyimpan obat penyakit
    $filename_medicine = '../medicines/medicine_'.$filename.time().'.html'; 
    file_put_contents($filename_medicine, $obat, FILE_APPEND);

    $sql = "INSERT INTO `penyakit` (`id`, `nama`, `penjelasan`, `penanganan`, `penyebab`, `medicine`)
            VALUES (NULL, '$nama', '$penjelasan', '$filename_handling', '$filename_cause', '$filename_medicine');";
    
    if ($mysqli->query($sql) === TRUE) {
        // id dari penyakit yang baru di insertkan ke database, digunakan untuk insert data gejala ke table symp_of_disease
        $disease_id = $mysqli->insert_id;
        $_SESSION['message'] = "Berhasil Menambahkan Penyakit";
        $_SESSION['color_alert'] = "success";

        $symptoms = $_POST['gejala'];
        // jika memiliki gejala, baru di jalankan sql untuk menyimpan gejala-gejala dari penyakit
        if(count($symptoms) > 0){
            $sql = "INSERT INTO `gejala_penyakit` (`id`, `id_penyakit`, `id_gejala`) VALUES ";
            foreach ($symptoms as $symptom_id) {
                $sql .= "(NULL, $disease_id, $symptom_id), ";
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
        $_SESSION['message'] = "Gagal Menambahkan Penyakit ";
        $_SESSION['color_alert'] = "danger";
    }

    header("Location: ../pages/diseases.php");
    exit;
    
?>