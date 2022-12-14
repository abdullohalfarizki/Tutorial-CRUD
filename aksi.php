<?php
    include 'config.php';
    if(isset($_POST['tambah'])){
        if($_POST['tambah']){
            
            $nama = $_POST['nama'];
            $umur = $_POST['umur'];
            $kelas = $_POST['kelas'];
    
            $query = "INSERT INTO siswa VALUES('null', '$nama', '$umur', '$kelas')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                header("location: index.php");
        }
        }
    }

    include 'config.php';   

            if (isset($_GET['ubah'])) {
                $id = $_GET['ubah'];

                $query = "SELECT * FROM siswa WHERE id = '$id';";
                $sql = mysqli_query($conn, $query);

                $result = mysqli_fetch_assoc($sql);

                $id = $result['id'];
                $nama = $result['nama'];
                $umur = $result['umur'];
                $kelas = $result['kelas'];
            }
            
    if(isset($_POST['ubah'])){
        
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $kelas = $_POST['kelas'];

        $query = "UPDATE siswa SET nama='$nama', umur='$umur', kelas='$kelas' WHERE id='$id';";
        $sql = mysqli_query($conn, $query);
            
            header("location: index.php");
    
    }


    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];


        $query = "DELETE FROM siswa WHERE id='$id'";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header("location: index.php");
        }
    }


?>