<?php
include "../koneksi.php";
$id_kategori = $_GET['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori'where id_kategori=' $id_kategori'");

if ($update) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href='../?page=kategori/index';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diupdate');
        window.location.href='../?page=kategori/ubah&id_kategori=$id_kategori';
    </script>";
}
