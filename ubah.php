<?php
    include 'config.php';

    $query = "SELECT * FROM siswa";
    $sql = mysqli_query($conn, $query);
    if(!$sql){
        echo "Data Tidak ditemukan";
    }
 
    $no = 0;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tutorial CRUD - PHP</title>
    <style type="text/css">
        .wraper{
            margin: 0 auto;
            border: 1px solid #40b3a7;
            width: 1270px;
            height: auto;
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .sidebar-left{
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 300px;
            height: auto;
            padding: 10px;
            float: left;
            background-color: #f9f9f9;
            margin-top: -225px;
        }
        .sidebar-right{
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 913px;
            height: auto;
            padding: 10px;
            float: left;
            background-color: #f9f9f9;
            margin-left: 333px;
            margin-top: -225px;
        }
        .title{
            border-left: 4px solid #40b3a7;
            width: 1270px;
            height: auto;
            padding: 10px;
            font-family: arial;
            font-weight: bold; font-size: 25px;
            margin-bottom: 240px;
        }
        #title-id{
            margin-top: 3%;
            margin-bottom: 5px;
        }
        .form{
            padding: 20px;
        }
        .input{
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 7px;
            width: 100%;
            margin-bottom: 10px;
        }
        .btn{
            width: 100%;
            box-shadow: inset 0px 1px 0px 0px #3b64b8;
            background:linear-gradient(to bottom, #3d94f6  5%,  #3b64b8 100%);
            background-color: #3d94f7;
            border-radius: 6px;
            border: 1px solid #337fed;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: arial;
            font-size: 15px;
            font-weight: bold;
            padding: 9px 24px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #1570cd;
        }
        .btn:hover{
            background:linear-gradient(to bottom, #3b64b8 5%, #3d94f6  100%);
            background-color: #3b64b8;
        }
        .btn:active{
            position: relative;
            top: 1px;
        }
        .tabel{
            margin-top: 12px;
            font-family: sans-serif;
            background: #f2f5f7;
            color: #444;
            font-size: 14px;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #f2f5f7;
        }
        .tabel tr th{
            background:#337fed;
            color: #ffff;
            font-size: 15px;
            font-weight: normal;
        }
        .tabel, th, td{
            padding: 8px 10px;
            text-align: left;
        }
        .tabel tr:hover{
            background-color: #f9f9f9;
        }
        .tabel tr:nth-child(even){
            padding: 7px;
            border-radius: 4px;
            color: #444;
            font-size: 14px;
            text-decoration: none;
        }
        .aksi{
            padding: 7px;
            border-radius: 4px;
            color: #f2f5f7;
            font-size: 12px;
            text-decoration: none;
        }
        .red{
            background-color: red;
        }
        .green{
            background-color: green;
        }

    </style>
<body>
    <div class="wraper" id="title-id">
        <div class="title">
            Edit Data Siswa | CRUD - PHP
        </div>
        <div class="sidebar-left">
            <form class="form" action="aksi.php" method="POST">
            <?php
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
                ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input value="<?php echo $nama; ?>" type="text" name="nama" placeholder="Nama Siswa" class="input" required><br>
                <input value="<?php echo $umur; ?>" type="number" name="umur" placeholder="Usia" class="input" required><br>
                <input value="<?php echo $kelas; ?>" type="number" name="kelas" placeholder="Kelas" class="input" required><br>
                <input type="submit" name="ubah" value="Simpan Data" class="btn"><br>
            </form>
        </div>
        <div class="sidebar-right">
            <div style="padding: 20px;">
                <span style="font-size: 20px;;">DATA SISWA</span>
                <table class="tabel">
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%">Nama</th>
                        <th width="5%">Usia</th>
                        <th width="5%">Kelas</th>
                        <th width="5%">Aksi</th>
                    </tr>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>

                    
                    <tr>
                        <td><?php echo ++$no; ?></td>
                        <td><?php echo $result['nama']; ?></td>
                        <td><?php echo $result['umur']; ?> Tahun</td>
                        <td><?php echo $result['kelas']; ?></td>
                        <td>
                            <a href="ubah.php?ubah=<?php echo $result['id'] ?>" name="ubah" class="aksi green">Ubah</a>
                            <a href="aksi.php?hapus=<?php echo $result['id'] ?>" name="hapus" class="aksi red" onclick="return confirm('Apakah yakin anda akan menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                   <?php
                    }
                   ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>