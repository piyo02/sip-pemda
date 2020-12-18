<?php

    if(isset($_POST) || $sql_diagnosa){
        $riwayat = false;

        // data awal tentang gejala
        // $symptoms = [4, 5, 6, 7, 8, 12];
        // $daftar_gejala = explode(",", trim($_POST['array-gejala'], ","));
        if($sql_diagnosa){
            $riwayat = true;
            while ($data = mysqli_fetch_assoc($sql_diagnosa)) {
                $daftar_gejala[] = (int) $data['id_gejala'];
                $id_anak = $data['id_anak'];
            }
        }
        if(count($_POST)){
            $daftar_gejala = $_POST['gejala'];
            $id_anak = $_POST['anak'];
        }

        if(count($daftar_gejala) < 3){
            $_SESSION['message'] = 'Gejala yang anda pilih kurang dari 3!!!';
            $_SESSION['color_alert'] = 'warning';
            header('Location: ../pages/dashboard.php');
            exit;
        }
        
        // forward chaining
        // rules
        $query = "SELECT aturan_gejala.*, penyakit.penyakit FROM `aturan_gejala`
                    LEFT JOIN penyakit ON penyakit.id_penyakit = aturan_gejala.id_aturan
                    ORDER BY id_penyakit, id_gejala ASC";
        $sql = mysqli_query($mysqli, $query);

        $daftar_aturan = [];
        while($datas = mysqli_fetch_assoc($sql)){ 
            $daftar_aturan[$datas['id_aturan']][] = (int) $datas['id_gejala'];
        }

        // variabel awal
        $penyakit = "";
        $persentasi_kecocokan = 0;
        $kecocokan_gejala = 0;
        $ketidakcocokan_gejala = 0;

        // cek data awal dengan rule
        foreach ($daftar_aturan as $key => $aturan) {
            $persentasi_gejala_forward = 0;
            $banyak_gejala_cocok = 0;
            $banyak_gejala_tidak_cocok = 0;
            foreach ($daftar_gejala as $gejala) {
                if(in_array((int) $gejala, $aturan)){
                    $banyak_gejala_cocok++;
                } else {
                    $banyak_gejala_tidak_cocok++;
                }
            }

            $persentasi_gejala_forward = $banyak_gejala_cocok/count($aturan)*100;
            if ($banyak_gejala_cocok >= 3){
                if( !($penyakit && $banyak_gejala_cocok >= $kecocokan_gejala) ){
                    $penyakit = 0;
                }else {
                    if($persentasi_gejala_forward > $persentasi_kecocokan && $banyak_gejala_cocok > $kecocokan_gejala){
                        $penyakit               = $key;
                        $persentasi_kecocokan   = $persentasi_gejala_forward;
                        $kecocokan_gejala       = $banyak_gejala_cocok;
                        $ketidakcocokan_gejala  = $banyak_gejala_tidak_cocok;
                    }
                }
            }
        }

        // backward chaining

        $query = "SELECT aturan_gejala.id_gejala FROM `aturan_gejala` WHERE id_aturan=$penyakit
                    ORDER BY id_gejala ASC";
        $sql = mysqli_query($mysqli, $query);

        while($datas = mysqli_fetch_assoc($sql)){
            $aturan_backward[] = (int) $datas['id_gejala'];
        }

        $banyak_gejala_cocok = 0;
        $banyak_gejala_tidak_cocok = 0;
        foreach ($daftar_gejala as $gejala) {
            if(in_array((int) $gejala, $aturan_backward)){
                $banyak_gejala_cocok++;
            } else {
                $banyak_gejala_tidak_cocok++;
            }
        }
        $persentasi_gejala_backward = $banyak_gejala_cocok/count($aturan_backward)*100;

        if($persentasi_gejala_backward == $persentasi_gejala_forward){
            $s = "benar";
        } else {
            $s = "salah";
        }

        if(!$riwayat){
            // memasukkan data diagnosa
            $tanggal = date('Y-m-d');
            
            $query = "INSERT INTO diagnosa (id_diagnosa, id_anak, diagnosa, tanggal)
                        VALUES (NULL, $id_anak, $penyakit, '$tanggal')";
            $sql = mysqli_query($mysqli, $query);
            $id_diagnosa = $mysqli->insert_id;
            
            foreach ($daftar_gejala as $gejala) {
                $query = "INSERT INTO diagnosa_gejala (id_diagnosa, id_gejala)
                            VALUES ($id_diagnosa, $gejala)";
                $sql = mysqli_query($mysqli, $query);
            }
        }
        // query gejala dan penyakit
        $id_gejala = join(",", $daftar_gejala);
        $query_gejala = "SELECT * FROM `gejala` WHERE id_gejala in ($id_gejala);";
        $sql_gejala = mysqli_query($mysqli, $query_gejala);

        $query_penyakit = "SELECT `penyakit`.*, 
                                    kategori_penyakit.kategori_penyakit,
                                    penyebab.penyebab,
                                    obat.obat,
                                    penanganan.penanganan
                            FROM `penyakit`
                            INNER JOIN kategori_penyakit ON kategori_penyakit.id_kategori_penyakit = penyakit.id_kategori_penyakit
                            INNER JOIN obat ON obat.id_obat = penyakit.id_penyakit
                            INNER JOIN penanganan ON penanganan.id_penanganan = penyakit.id_penyakit
                            INNER JOIN penyebab ON penyebab.id_penyebab = penyakit.id_penyakit
                            WHERE `id_penyakit`=$penyakit;";
        $sql_penyakit = mysqli_query($mysqli, $query_penyakit);

        while( $data = mysqli_fetch_assoc($sql_penyakit) ){
            $nama_penyakit = $data['penyakit'];
            $kategori_penyakit = $data['kategori_penyakit'];
            $penjelasan = $data['penjelasan'];
            $penyebab = $data['penyebab'];
            $penanganan = $data['penanganan'];
            $obat = $data['obat'];
        }
    }

?>