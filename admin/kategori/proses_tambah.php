<?php
include "../koneksi.php";
$nama_kategori = $_POST['nama_kategori'];

$tambah = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori)
VALUES ('$nama_kategori')");

if ($tambah) {
    echo "<script>
    alert('Data berhasil ditambahkan')
    window.location.href='../?page=kategori/index'
    </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan')
    window.location.href='tambah.php'
    </script>";
}
