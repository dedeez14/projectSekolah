<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_newphp');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// ini CROT
if(isset($_POST['btn-simpan'])){

    if($_GET['hal']){
            $edit = mysqli_query($link, "UPDATE tbl_siswa set 
            nim = '$_POST[tNim]',
            nama = '$_POST[tNama]',
            kelas = '$_POST[tKelas]',
            jurusan = '$_POST[tJurusan]'
            where id_siswa = '$_GET[id]'");
    
        if($edit){
            echo "<script>
                    alert('Edit Data Berhasil');
                    document.location='welcome.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Edit Data GAGAL !');
                    document.location='welcome.php';
                    </script>";
        }
    }else{
        $simpan = mysqli_query($link, "insert into tbl_siswa (nim,nama,kelas,jurusan) 
        VALUES ('$_POST[tNim]','$_POST[tNama]','$_POST[tKelas]','$_POST[tJurusan]')");
    
        if($simpan){
            echo "<script>
                    alert('Simpan Data Berhasil');
                    document.location='welcome.php';
                    </script>";
        }else{
            echo "<script>
                    alert('Simpan Data Berhasil');
                    document.location='welcome.php';
                    </script>";
        }
    }
}

if(isset($_GET['hal'])){
    if($_GET['hal'] == 'edit'){
        $tampil = mysqli_query($link, "select * from tbl_siswa where id_siswa = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);

        if($data){
            $var_nim = $data['nim'];
            $var_nama = $data['nama'];
            $var_kelas = $data['kelas'];
            $var_jurusan = $data['jurusan'];
        }
    }else if($_GET['hal'] == "hapus"){
        $hapus = mysqli_query($link, "DELETE FROM tbl_siswa WHERE id_siswa = '$_GET[id]' ");
        if($hapus){
            echo "<script>
                    alert('Hapus Data Berhasil');
                    document.location='welcome.php';
                    </script>";
        }
    }
}
?>