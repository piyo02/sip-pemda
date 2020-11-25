<?php

    if(isset($_POST)){

        // data awal tentang gejala
        // $symptoms = [4, 5, 6, 7, 8, 12];
        $daftar_gejala = explode(",", trim($_POST['array-gejala'], ","));

        // forward chaining
        // rules
        $query = "SELECT gejala_penyakit.*, penyakit.nama FROM `gejala_penyakit`
                    LEFT JOIN penyakit ON penyakit.id = gejala_penyakit.id_penyakit
                    ORDER BY id_penyakit, id_gejala ASC";
        $sql = mysqli_query($mysqli, $query);

        $daftar_aturan = [];
        while($datas = mysqli_fetch_assoc($sql)){ 
            $daftar_aturan[$datas['id_penyakit']][] = (int) $datas['id_gejala'];
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
            if($persentasi_gejala_forward > $persentasi_kecocokan && $banyak_gejala_cocok > $kecocokan_gejala){
                $penyakit               = $key;
                $persentasi_kecocokan   = $persentasi_gejala_forward;
                $kecocokan_gejala       = $banyak_gejala_cocok;
                $ketidakcocokan_gejala  = $banyak_gejala_tidak_cocok;
            }
        }

        // backward chaining

        $query = "SELECT gejala_penyakit.id_gejala FROM `gejala_penyakit` WHERE id=$penyakit
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

        // query gejala dan penyakit
        $id_gejala = join(",", $daftar_gejala);
        $query_gejala = "SELECT * FROM `gejala` WHERE id in ($id_gejala);";
        $sql_gejala = mysqli_query($mysqli, $query_gejala);

        $query_penyakit = "SELECT * FROM `penyakit` WHERE id = $penyakit;";
        $sql_penyakit = mysqli_query($mysqli, $query_penyakit);
    }

?>