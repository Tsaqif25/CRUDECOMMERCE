<?php
session_start();

include "../koneksi.php";
$id_user = $_SESSION['id_user'];


$cek_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user='$id_user'");
if (mysqli_num_rows($cek_keranjang) == 0) {
    echo "<script>
    alert('Keranjang kosong. Silakan isi keranjang terlebih dahulu.')
    window.location.href='../?page=produk/index'
    </script>";
    exit();
}

$tgl_pemesanan = date('Y-m-d');
$no_tujuan = $_POST['no_tujuan'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$status_pesanan = 'pending';

$namafile = $_FILES['bukti_bayar']['name'];
$namaSementara = $_FILES['bukti_bayar']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, '../../admin/assets/images/bukti_bayar/' . $namafile);

switch ($alamat_tujuan) {
    case 'padang':
        $ongkir = 20000;
        break;
    case 'pekanbaru':
        $ongkir = 25000;
        break;
    case 'jambi':
        $ongkir = 28000;
        break;
    case 'jakarta':
        $ongkir = 15000;
        break;
    default:
        $ongkir = 0;
        break;
}

$keranjang = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, tanggal, no_tujuan, alamat_tujuan, bukti_bayar, status_pesanan, ongkir) 
VALUES ('$id_user', '$tgl_pemesanan', '$no_tujuan', '$alamat_tujuan', '$namafile', '$status_pesanan', '$ongkir')");

$cek_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_pesan DESC LIMIT 1");
$data_pesanan = mysqli_fetch_array($cek_pesanan);

$sql_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang 
JOIN user ON keranjang.id_user=user.id_user
JOIN produk ON keranjang.id_produk=produk.id_produk
WHERE user.id_user='$id_user'");

while ($data_keranjang = mysqli_fetch_array($sql_keranjang)) {
    $total_harga = $data_keranjang['harga'] * $data_keranjang['kuantitas'] + $ongkir;

    $detail = mysqli_query($koneksi, "INSERT INTO detail_pesan (id_pesan, id_produk, kuantitas, total_harga) 
    VALUES('$data_pesanan[id_pesan]', '$data_keranjang[id_produk]', '$data_keranjang[kuantitas]', '$total_harga' )");
}

$hapuskeranjang = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_user='$id_user'");

if ($keranjang) {
    echo "<script>
    alert('Barang Berhasil di Check Out')
    window.location.href='../?page=produk/index'
    </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan')
    window.location.href='../?page=produk/index'
    </script>";
}
?>
