<?php

include_once '../config.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

include_once '../config.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Crud</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-5">Hai, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcrot to PR dari gejak.</h1>
            <div class="card mt-5">
                <div class="card-header bg-success text-white">
                    Daftar Siswa
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                $no = 1;
                                $getData = mysqli_query($link, "select * from tbl_siswa order by id_siswa desc");
                                while($data = mysqli_fetch_array($getData)) :
                            ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$data['nim']?></td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['kelas']?></td>
                                <td><?=$data['jurusan']?></td>
                                <td>
                                    <a href="welcome.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-warning">Edit</a>
                                    <a href="welcome.php?hal=hapus&id=<?=$data['id_siswa']?>" onclick="return confirm('Apakah Yakin ingin ngapus data ?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                            
                    </div>

                    
            </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>