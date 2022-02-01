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
            <p>
                <a href="../login/reset-password.php" class="btn btn-warning">Reset Password</a>
                <a href="../login/logout.php" class="btn btn-danger ml-3">Sign Out</a>
            </p>
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    Form Admin Data
                </div>
                    <div class="card-body">
                            <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tNim" value="<?=@$var_nim?>" placeholder="NIM" required>
                                <label for="floatingInput">Nim</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tNama" value="<?=@$var_nama?>" placeholder="Nama" required>
                                <label>Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tKelas" value="<?=@$var_kelas?>" placeholder="Kelas" required>
                                <label>Kelas</label>
                            </div>
                            <div class="mb-3">
                                <label>Jurusan</label>
                                <select class="form-control" name="tJurusan">
                                    <option value="<?=@$var_nim?>"><?=@$var_jurusan?></option>
                                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                                    <option value="TKJ">Teknik Komputer Jaringan</option>
                                    <option value="TSM">Teknik Sepeda Motor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="btn-simpan">Simpan</button>
                            <button type="reset" class="btn btn-danger" name="btn-reset">Reset</button>
                            </div>
                            <a href="graph.php" class="btn btn-warning">Chart</a>
                            <a href="daftar_siswa.php" class="btn btn-primary">Daftar Siswa</a>
                            <a href="daftar_guru.php" class="btn btn-primary">Daftar Guru</a>
                            </form>
                    </div>  
            </div>

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