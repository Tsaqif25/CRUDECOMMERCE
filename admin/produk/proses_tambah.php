
<?php
session_start();
$_SESSION['berhasil'] = 'data berhasil di tambahkan';
include "../koneksi.php";
$id_kategori = $_POST['id_kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

// ambil data file
$nama_file   = $_FILES['gambar_produk']['name'];
$nama_sementara = $_FILES['gambar_produk']['tmp_name'];
//pindah file
$terupload = move_uploaded_file($nama_sementara, '../assets/images/produk/' . $nama_file);

$tambah = mysqli_query($koneksi, "INSERT INTO produk (id_kategori,nama_produk,deskripsi,harga,gambar_produk) 
VALUES ('$id_kategori','$nama_produk','$deskripsi','$harga','$nama_file')");

if ($tambah) {
    echo "<script>
    alert('Data Berhasil Di tambahkan')
    window.location.href='../?page=produk/index'
    </script>";
} else {
    echo "<script>
    alert('Data gagal di tambah')
    window.location.href='../?page=produk/tambah'
    </script>";
}
