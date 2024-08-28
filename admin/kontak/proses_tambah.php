<?php
include "../koneksi.php";
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$tambah = mysqli_query($koneksi, "INSERT INTO kontak (judul,isi) 
VALUES ('$judul','$isi')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Di tambahkan')
    window.location.href='index.php'
    </script>";
} else {
    echo "<script>
    alert('Data gagal di tambah')
    window.location.href='tambah.php'
    </script>";
}
