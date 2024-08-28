<?php
session_start();
$_SESSION['berhasil'] = 'data berhasil di tambahkan';
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$level = $_POST['level'];

// ambil data file
$nama_file   = $_FILES['foto']['name'];
$nama_sementara = $_FILES['foto']['tmp_name'];
//pindah file
$terupload = move_uploaded_file($nama_sementara, '../assets/images/user/' . $nama_file);

$tambah = mysqli_query($koneksi, "INSERT INTO user (username,password,nama_lengkap,foto,level) 
VALUES ('$username','$password','$nama_lengkap','$nama_file','$level')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Di tambahkan')
    window.location.href='../?page=user/index'
    </script>";
} else {
    echo "<script>
    alert('Data gagal di tambah')
    window.location.href='../?page=user/tambah'
    </script>";
}
