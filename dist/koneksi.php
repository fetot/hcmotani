<?php 
    // $koneksi = mysqli_connect("localhost", "root", "", "db_harlepotani");
    $koneksi = new mysqli("localhost","root","","db_harlepotani");
    if (!$koneksi){
        echo "Koneksi tidak tersedia dengan database!";
    }
?>