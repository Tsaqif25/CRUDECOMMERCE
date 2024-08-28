<?php
if (isset($_GET['id_user']))
    $id_user = $_GET['id_user'];

$hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'");
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapus');
            window.location.href='../?page=user/index';
        </script>";
} else {
    echo "<script>  
            alert('Data gagal dihapus');
            window.location.href='../?page=user/index';
        </script>";
}
