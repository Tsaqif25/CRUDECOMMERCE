<?php
include "../koneksi.php";
$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];

// ambil data file
$nama_file   = $_FILES['foto']['name'];
$nama_sementara = $_FILES['foto']['tmp_name'];
//pindah file
$terupload = move_uploaded_file($nama_sementara, '../assets/images/tim/' . $nama_file);

$tambah = mysqli_query($koneksi, "INSERT INTO tim (nama_tim,jabatan,foto) 
VALUES ('$nama_tim','$jabatan','$nama_file')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Di tambahkan')
    window.location.href='../?page=tim/index'
    </script>";
} else {
    echo "<script>
    alert('Data gagal di tambah')
    window.location.href='../?page=tim/tambah'
    </script>";
}
