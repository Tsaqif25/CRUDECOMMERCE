<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Silahkan Login Terlebih Dahalu')
    window.location.href='login/index.php'
    </script>";
}
include "koneksi.php";
include "layout/header.php";
include "layout/navbar.php";
include "content.php";
include "layout/footer.php";
