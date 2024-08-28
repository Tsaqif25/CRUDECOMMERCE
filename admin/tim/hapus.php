<?php 
include('../koneksi.php');

if (isset($_GET['id_tim'])) 
    $id_tim = $_GET['id_tim'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tim WHERE id_tim='$id_tim'");
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
