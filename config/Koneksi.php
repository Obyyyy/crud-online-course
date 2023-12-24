<?php
    $DBHOST = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "prak05";

    $koneksi = mysqli_connect($DBHOST, $USERNAME, $PASSWORD, $DBNAME);
    if(!$koneksi){
        die("Koneksi gagal: " . mysqli_connect_error());
    }    
?>