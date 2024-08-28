<?php
include('../koneksi.php');

if (isset($_GET['id_kontak']))
    $id_kontak = $_GET['id_kontak'];

$hapus = mysqli_query($koneksi, "DELETE FROM kontak WHERE id_kontak='$id_kontak'");
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapus');
            window.location.href='index.php';
        </script>";
} else {
    echo "<script>  
            alert('Data gagal dihapus');
            window.location.href='index.php';
        </script>";
}
