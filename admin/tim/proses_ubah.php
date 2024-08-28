<?php
include "../koneksi.php";
$id_tim = $_GET['id_tim'];
$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];

// ambil data file
$nama_file   = $_FILES['foto']['name'];
$nama_sementara = $_FILES['foto']['tmp_name'];

$terupload = move_uploaded_file($nama_sementara, '../assets/images/tim/'.$nama_file);

$update = mysqli_query($koneksi, "UPDATE tim SET nama_tim='$nama_tim', jabatan='$jabatan', foto='$nama_file' WHERE id_tim='$id_tim'");

if ($update) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href='index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diupdate');
        window.location.href='ubah.php';
    </script>";
}
