<?php
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah data yang diinput sesuai database
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// cek jumlah data yang masuk dari query
if (mysqli_num_rows($user) > 0) {
    // pecah datanya dari query
    $data = mysqli_fetch_array($user);

    // simpan datanya ke session
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['level'] = $data['level'];

    // arahkan pengguna berdasarkan level
    if ($data['level'] == 'admin') {
        echo "<script>
        alert('Login berhasil sebagai Admin');
        window.location.href='../?page=home/index';
        </script>";
    } elseif ($data['level'] == 'member') {
        echo "<script>
        alert('Login berhasil sebagai Member');
        window.location.href='../../?page=home/index';
        </script>";
    } 
} else {
    echo "<script>
    alert('Login gagal');
    window.location.href='index.php';
    </script>";
}
?>
