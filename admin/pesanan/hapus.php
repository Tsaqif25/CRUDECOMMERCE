<?php
if (isset($_GET['id_pesan']))
    $id_pesanan = $_GET['id_pesan'];

$hapus = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesan='$id_pesanan'");
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapus');
            window.location.href='?page=pesanan/index';
        </script>";
} else {
    echo "<script>  
            alert('Data gagal dihapus');
            window.location.href='?page=pesanan/index';
        </script>";
}
