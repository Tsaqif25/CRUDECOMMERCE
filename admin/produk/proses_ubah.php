<?php
include "../koneksi.php";
$id_produk = $_POST['id_produk'];
$id_kategori = $_POST['id_kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

if ($_FILES['gambar_produk']['name'] == '') {
    // Jika tidak ada file yang diunggah, gunakan gambar_produk lama
    $nama_file = $_POST['foto_lama'];
} else {
    // Ambil data file
    $nama_file   = $_FILES['gambar_produk']['name'];
    $nama_sementara = $_FILES['gambar_produk']['tmp_name'];
    // Pindahkan file
    $terupload = move_uploaded_file($nama_sementara, '../assets/images/produk/' . $nama_file);
    if (!$terupload) {
        // Jika file gagal diunggah, tampilkan pesan kesalahan dan hentikan eksekusi
        echo "<script>
        alert('File gagal diunggah');
        window.location.href='../?page=produk/ubah&id_produk=$id_produk';
        </script>";
        exit();
    }
}

$update = mysqli_query($koneksi, "UPDATE produk SET id_kategori='$id_kategori', nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', gambar_produk='$nama_file' WHERE id_produk='$id_produk'");


if ($update) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href='../?page=produk/index';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diupdate');
        window.location.href='../?page=produk/ubah&id_produk=$id_produk';
    </script>";
}
