<?php
    include '../connect.php';
    include 'session.php';
    // aktifkan sesion untuk menyimpan pesan hasil penyimpanan data

    $nama = $_POST['nama'];
    $id_kategori_penyakit = $_POST['kategori_penyakit'];
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

    $sql = "INSERT INTO `penyakit` (`id_penyakit`, `id_kategori_penyakit`, `penyakit`, `penjelasan`)
            VALUES (NULL, $id_kategori_penyakit, '$nama', '$penjelasan');";
    if ($mysqli->query($sql) === TRUE) {
        // id dari penyakit yang baru di insertkan ke database, digunakan untuk insert data gejala ke table symp_of_disease
        $id_penyakit = $mysqli->insert_id;

        // obat
        $sql = "INSERT INTO obat (id_obat, obat)
                VALUES ($id_penyakit, '$filename_obat')";
        if($mysqli->query($sql) != TRUE){
            gagal_tambah_penyakit( $id_penyakit );
        }else {
            $id_obat = $mysqli->insert_id;
            // obat penyakit
            $sql = "INSERT INTO obat_penyakit (id_obat, id_penyakit)
                VALUES ($id_obat, $id_penyakit)";
            $mysqli->query($sql);
        }

        // penanganan
        $sql = "INSERT INTO penanganan (id_penanganan, penanganan)
                VALUES ($id_penyakit, '$filename_penanganan')";
        if($mysqli->query($sql) != TRUE){
            gagal_tambah_penyakit( $id_penyakit );
        }else {
            $id_penanganan = $mysqli->insert_id;
            // penanganan penyakit
            $sql = "INSERT INTO penanganan_penyakit (id_penanganan, id_penyakit)
                VALUES ($id_penanganan, $id_penyakit)";
            $mysqli->query($sql);
        }

        // penyebab
        $sql = "INSERT INTO penyebab (id_penyebab, penyebab)
                VALUES ($id_penyakit, '$filename_penyebab')";
        if($mysqli->query($sql) != TRUE){
            gagal_tambah_penyakit( $id_penyakit );
        }else {
            $id_penyebab = $mysqli->insert_id;
            // penyebab penyakit
            $sql = "INSERT INTO penyebab_penyakit (id_penyebab, id_penyakit)
                VALUES ($id_penyebab, $id_penyakit)";
            $mysqli->query($sql);
        }

        $_SESSION['message'] = "Berhasil Menambahkan Penyakit";
        $_SESSION['color_alert'] = "success";

        $gejala = $_POST['gejala'];
        // jika memiliki gejala, baru di jalankan sql untuk menyimpan gejala-gejala dari penyakit
        if(count($gejala) > 0){
            $sql = "INSERT INTO `aturan` (`id_aturan`, `aturan`, `id_kategori_penyakit`) 
                    VALUES ($id_penyakit, 'Aturan $nama', $id_kategori_penyakit) ";
            $mysqli->query($sql);

            $sql = "INSERT INTO `aturan_gejala` (`id_aturan`, `id_gejala`) VALUES ";
            foreach ($gejala as $id_gejala) {
                $sql .= "($id_penyakit, $id_gejala), ";
            }
            $sql = rtrim($sql, ', ');
            var_dump($sql);
            // jika gagal, maka hapus data penyakit yang baru ditambahkan
            if($mysqli->query($sql) != TRUE){
                gagal_tambah_penyakit( $id_penyakit );
            }
        }

    } else {
        $_SESSION['message'] = $mysqli->error;
        $_SESSION['color_alert'] = "danger";
    }

    header("Location: ../pages/penyakit.php");
    exit;

    function gagal_tambah_penyakit( $id ){
        $sql = "DELETE FROM `penyakit` WHERE `id_penyakit`=$id";
        $mysqli->query($sql);
        $_SESSION['message'] = "Gagal Menambahkan Penyakit ";
        $_SESSION['color_alert'] = "danger";

        header("Location: ../pages/penyakit.php");
        exit;
    }
?>