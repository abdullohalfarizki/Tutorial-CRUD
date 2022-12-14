<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $db = "db_crud";

    $conn = mysqli_connect($host, $username, $pass, $db);
    if($conn){
        mysqli_select_db($conn, $db);
        //echo "Database berhasil terkoneksi!";
    }else{
        echo "Database gagal terkoneksi!";
    }
?>