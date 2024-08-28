<?php
session_start();

include "../koneksi.php";
$id_user = $_SESSION['id_user'];
$tgl_pemesanan = date('Y-m-d');
$no_tujuan = $_POST['no_tujuan'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$ongkir = $_POST['ongkir'];
$status_pesanan = 'pending';

$namafile = $_FILES['bukti_bayar']['name'];
$namaSementara = $_FILES['bukti_bayar']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, 'admin/assets/images/bukti_bayar' . $namafile);

// Masukkan Data Pesanan
$keranjang = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, tanggal, no_tujuan, alamat_tujuan, ongkir, bukti_bayar, status_pesanan) 
VALUES ('$id_user', '$tgl_pemesanan', '$no_tujuan', '$alamat_tujuan',$ongkir, '$namafile', '$status_pesanan')");

//Ambil Data Pesanan Yang Terakhir Masuk
$cek_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_pesan DESC LIMIT 1");
$data_pesanan = mysqli_fetch_array($cek_pesanan);

//Ambil Data Keranjang
$sql_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang 
JOIN user ON keranjang.id_user=user.id_user
JOIN produk ON keranjang.id_produk=produk.id_produk
WHERE user.id_user='$id_user'");
// var_dump($sql_keranjang);

//total harga
while ($data_keranjang = mysqli_fetch_array($sql_keranjang)) {
    $total_harga = $data_keranjang['harga'] * $data_keranjang['kuantitas'];

    $detail = mysqli_query($koneksi, "INSERT INTO detail_pesan (id_pesan, id_produk, kuantitas, total_harga) 
    VALUES('$data_pesanan[id_pesan]', '$data_keranjang[id_produk]', '$data_keranjang[kuantitas]', '$total_harga' )");
}

$hapuskeranjang = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_user='$id_user'");


if ($keranjang) {
    echo "<script>
    alert('Barang Berhasil di Checkout')
    window.location.href='../?page=checkout/detail_co'
    </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan')
    window.location.href='../?page=shop/index'
    </script>";
}
