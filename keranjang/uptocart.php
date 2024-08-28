<?php
session_start();
if(!isset($_SESSION['id_user'])) {
    echo "<script>
    alert('harap login dulu');
    window.location.href='../login/index.php';
    </script>";
    exit;
}

include "../koneksi.php";
$id_produk = $_POST['produk'];
$kuantitas = $_POST['kuantitas'];
$id_user = $_SESSION['id_user'];

$search = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user = '$id_user' AND id_produk = '$id_produk'");

if (mysqli_num_rows($search) > 0) {
    
    $arkeranjang = mysqli_fetch_array($search);
    $db_kuantitas = $arkeranjang['kuantitas'];
    $db_kuantitas += $kuantitas;

    $update = mysqli_query($koneksi, "UPDATE keranjang SET kuantitas = '$db_kuantitas' WHERE id_user = '$id_user' AND id_produk = '$id_produk'");

    if ($update) {
        echo "<script>
        alert('Kuantity berhasil diupdate');
        window.location.href = '../?page=produk/index';
        </script>";
    } else {
        echo "<script>
        alert('Gagal mengupdate kuantity');
        window.location.href = '../?page=detail_satu/index';
        </script>";
    }
} else {
    $keranjang = mysqli_query($koneksi, "INSERT INTO keranjang (id_user, id_produk, kuantitas) VALUES ('$id_user', '$id_produk', '$kuantitas')");

    if ($keranjang) {
        echo "<script>
        alert('Produk berhasil ditambahkan ke keranjang');
        window.location.href = '../?page=produk/index';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menambahkan produk ke keranjang');
        window.location.href = '../?page=detail_satu/index';
        </script>";
    }
}
?>
