<?php
include "../koneksi.php";
$id_user = $_GET['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];

if ($_FILES['foto']['name'] == '') {
    // Jika tidak ada file yang diunggah, gunakan foto lama
    $nama_file = $_POST['foto_lama'];
} else {
    // Ambil data file
    $nama_file   = $_FILES['foto']['name'];
    $nama_sementara = $_FILES['foto']['tmp_name'];
    // Pindahkan file
    $terupload = move_uploaded_file($nama_sementara, '../assets/images/user/' . $nama_file);
    if (!$terupload) {
        // Jika file gagal diunggah, tampilkan pesan kesalahan dan hentikan eksekusi
        echo "<script>
        alert('File gagal diunggah');
        window.location.href='../?page=user/ubah&id_user=$id_user';
        </script>";
        exit();
    }
}

$update = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', nama_lengkap='$nama_lengkap', no_hp='$no_hp', foto='$nama_file' WHERE id_user='$id_user'");

if ($update) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href='../?page=user/index';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diupdate');
        window.location.href='../?page=user/ubah&id_user=$id_user';
    </script>";
}
