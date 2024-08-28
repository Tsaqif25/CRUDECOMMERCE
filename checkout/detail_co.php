<?php
// Cek jika user tidak login
if (!isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Silakan login terlebih dahulu.')
    window.location.href='../login.php'
    </script>";
    exit();
}

$id_user = $_SESSION['id_user'];

// Ambil detail pesanan terbaru
$cek_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_user='$id_user' ORDER BY id_pesan DESC LIMIT 1");
$data_pesanan = mysqli_fetch_array($cek_pesanan);

$id_pesan = $data_pesanan['id_pesan'];
$tanggal = $data_pesanan['tanggal'];
$no_tujuan = $data_pesanan['no_tujuan'];
$alamat_tujuan = $data_pesanan['alamat_tujuan'];
$status_pesanan = $data_pesanan['status_pesanan'];
$ongkir = $data_pesanan['ongkir'];


// Ambil detail produk dalam pesanan
$detail_pesan = mysqli_query($koneksi, "SELECT * FROM detail_pesan 
JOIN produk ON detail_pesan.id_produk=produk.id_produk 
WHERE id_pesan='$id_pesan'");

$totalakhir = 0; // Inisialisasi total akhir

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Result</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Order Confirmation</h3>
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><strong>Order ID : </strong><?php echo $id_pesan; ?></li>
                                <li><strong>Order Date : </strong><?php echo $tanggal; ?></li>
                                <li><strong>Shipping Address: </strong><?php echo $alamat_tujuan; ?></li>
                                <li><strong>Phone Number : </strong><?php echo $no_tujuan; ?></li>
                                <li><strong>Ongkir : </strong>Rp<?php echo number_format($ongkir); ?></li>
                                <li><strong>Status : </strong><?php echo ucfirst($status_pesanan); ?></li>
                            </ul>
                            <h2>Products</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Gambar</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data_detail = mysqli_fetch_array($detail_pesan)) :
                                        $total_produk = $data_detail['total_harga']; // Total harga untuk produk ini
                                        $totalakhir += $total_produk; // Tambahkan ke total akhir
                                    ?>
                                        <tr>
                                            <td><?php echo $data_detail['nama_produk']; ?></td>
                                            <td><?php echo $data_detail['kuantitas']; ?></td>
                                            <td><img src="admin/assets/images/produk/<?= $data_detail['gambar_produk'] ?>" width="100px" alt=""></td>
                                            <td>Rp<?php echo number_format($total_produk); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Grand Total</th>
                                        <td>Rp. <?php echo number_format($totalakhir + $ongkir); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary" href="?page=produk/index">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>