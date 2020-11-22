<?php

    if(isset($_POST)){

        // data awal tentang gejala
        // $symptoms = [4, 5, 6, 7, 8, 12];
        $symptoms = explode(",", trim($_POST['array-gejala'], ","));

        // forward chaining
        // rules
        $query = "SELECT gejala_penyakit.*, penyakit.nama FROM `gejala_penyakit`
                    LEFT JOIN penyakit ON penyakit.id = gejala_penyakit.id_penyakit
                    ORDER BY id_penyakit, id_gejala ASC";
        $sql = mysqli_query($mysqli, $query);

        $rules = [];
        while($datas = mysqli_fetch_assoc($sql)){ 
            $rules[$datas['id_penyakit']][] = (int) $datas['id_gejala'];
        }

        // variabel awal
        $penyakit = "";
        $persentasi_kecocokan = 0;
        $kecocokan_gejala = 0;
        $ketidakcocokan_gejala = 0;

        // cek data awal dengan rule
        foreach ($rules as $key => $rule) {
            $persentasi_gejala = 0;
            $banyak_gejala_cocok = 0;
            $banyak_gejala_tidak_cocok = 0;
            foreach ($symptoms as $symptom) {
                if(in_array((int) $symptom, $rule)){
                    $banyak_gejala_cocok++;
                } else {
                    $banyak_gejala_tidak_cocok++;
                }
            }

            $persentasi_gejala = $banyak_gejala_cocok/count($rule)*100;
            if($persentasi_gejala > $persentasi_kecocokan && $banyak_gejala_cocok > $kecocokan_gejala){
                $penyakit               = $key;
                $persentasi_kecocokan   = $persentasi_gejala;
                $kecocokan_gejala       = $banyak_gejala_cocok;
                $ketidakcocokan_gejala  = $banyak_gejala_tidak_cocok;
            }
        }

        // backward chaining


        // query gejala dan penyakit
        $id_gejala = join(",", $symptoms);
        $query_gejala = "SELECT * FROM `gejala` WHERE id in ($id_gejala);";
        $sql_gejala = mysqli_query($mysqli, $query_gejala);

        $query_penyakit = "SELECT * FROM `penyakit` WHERE id = $penyakit;";
        $sql_penyakit = mysqli_query($mysqli, $query_penyakit);
    }

?>