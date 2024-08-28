<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Shopping Cart</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->



<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_kuantitas = 0;
                        $total_harga = 0;
                        $project = mysqli_query($koneksi, "SELECT * FROM keranjang 
                          JOIN produk ON keranjang.id_produk=produk.id_produk 
                          JOIN user ON keranjang.id_user=user.id_user
                          WHERE user.id_user='$_SESSION[id_user]'
                          ORDER BY id_keranjang DESC");
                        while ($data = mysqli_fetch_array($project)) :
                            $total_kuantitas += $data['kuantitas'];
                            $total = $data['kuantitas'] * $data['harga'];
                            $total_harga += $data['kuantitas'] * $data['harga'];
                        ?>
                            <tr>
                                <td>
                                    <div>
                                        <input type="hidden" name="id_pesan" value="<?= $data['id_user'] ?>">
                                        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="admin/assets/images/produk/<?= $data['gambar_produk'] ?>" width="80%" height="80%" style="object-fit: cover;" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $data['nama_produk'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo $data['harga'] ?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <p type="text" name="qty" id="sst" maxlength="12" title="Quantity:" class="input-text qty"><?php echo $data['kuantitas'] ?></p>
                                        <!-- <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button> -->
                                    </div>
                                </td>
                                <td>

                                    <h5><?php echo $total; ?></h5>

                                </td>
                            </tr>

                        <?php
                        endwhile; ?>
                        <tr class="bottom_button">
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="btn gray_btn" href="#">Continue Shopping</a>
                                    <a class="btn primary-btn ml-2" href="?page=checkout/index">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-align-center"><?php echo $total_kuantitas; ?></td>
                            <td><?= $total_harga ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->