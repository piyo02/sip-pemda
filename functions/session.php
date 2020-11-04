<?php
    // file ini nantinya di include ke file yang merupakan halaman dimana user yang mengunjunginya harus user yang telah login

    /* membuat session untuk mengetahui user telah login atau belum
        caranya dengan mengecek apakah variabel $_SESSION['id'] memiliki nilai atau tidak
    */
    session_start();

    // fungsi untuk mengecek apakah variabel $_SESSION['id'] memiliki tidak memiliki nilai
    if(!isset($_SESSION['id'])) {
        // jika true, maka kembalikan user ke halaman homepage
        header("Location: /sip_pemda");
        exit;
    }
?>