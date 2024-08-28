<?php
include "../koneksi.php";

$id_kontak = $_POST['id_kontak'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$query = "UPDATE kontak SET judul = '$judul', isi = '$isi' WHERE id_kontak = '$id_kontak'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil diubah'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); window.location.href='ubah.php?id_kontak=$id_kontak';</script>";
}
