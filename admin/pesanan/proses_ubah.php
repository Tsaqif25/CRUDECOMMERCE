<?php
include "../koneksi.php";
$id_pesanan = $_GET['id_pesan'];
$status_pesanan = $_POST['status_pesan'];

$update = mysqli_query($koneksi, "UPDATE pesanan SET status_pesanan='$status_pesanan'where id_pesan=' $id_pesanan'");

if ($update) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href='../?page=pesanan/index';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diupdate');
        window.location.href='../?page=pesanan/ubah&id_pesanan=$id_pesanan';
    </script>";
}
