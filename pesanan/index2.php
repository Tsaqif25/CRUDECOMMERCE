<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Product Checkout</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="../admin/?page=login/index">Click here to login</a></h2>
            </div>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.</p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" id="name" name="name">
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" id="password" name="password">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-login">Login</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="#">Lost your password?</a>
                </div>
            </form>
        </div>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form action="pesanan/proses.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <label>Upload Bukti Bayar</label>
                            <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>No Tujuan</label>
                            <input type="text" class="form-control" id="no_tujuan" name="no_tujuan">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Ekspedisi</label>
                            <br>
                            <select name="ekspedisi" class="form-control col-md-12" id="ekspedisi">
                                <option value="">Pilih Ekspedisi</option>
                                <option value="jne">JNE</option>
                                <option value="jnt">JNT</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <br>
                            <label>Provinsi</label>
                            <br>
                            <select name="provinsi" id="provinsi" class="form-control" onchange="fetchCities(this.value)">
                                <option value="">Pilih Provinsi</option>
                                <option value="aceh">Aceh</option>
                                <option value="sumatera_utara">Sumatera Utara</option>
                                <option value="sumatera_barat">Sumatera Barat</option>
                                <option value="riau">Riau</option>
                                <option value="kepulauan_riau">Kepulauan Riau</option>
                                <option value="jambi">Jambi</option>
                                <option value="sumatera_selatan">Sumatera Selatan</option>
                                <option value="bengkulu">Bengkulu</option>
                                <option value="lampung">Lampung</option>
                                <option value="bangka_belitung">Bangka Belitung</option>
                                <option value="banten">Banten</option>
                                <option value="dki_jakarta">DKI Jakarta</option>
                                <option value="jawa_barat">Jawa Barat</option>
                                <option value="jawa_tengah">Jawa Tengah</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="jawa_timur">Jawa Timur</option>
                                <option value="bali">Bali</option>
                                <option value="ntb">Nusa Tenggara Barat</option>
                                <option value="ntt">Nusa Tenggara Timur</option>
                                <option value="kalimantan_barat">Kalimantan Barat</option>
                                <option value="kalimantan_tengah">Kalimantan Tengah</option>
                                <option value="kalimantan_selatan">Kalimantan Selatan</option>
                                <option value="kalimantan_timur">Kalimantan Timur</option>
                                <option value="kalimantan_utara">Kalimantan Utara</option>
                                <option value="sulawesi_utara">Sulawesi Utara</option>
                                <option value="gorontalo">Gorontalo</option>
                                <option value="sulawesi_tengah">Sulawesi Tengah</option>
                                <option value="sulawesi_barat">Sulawesi Barat</option>
                                <option value="sulawesi_selatan">Sulawesi Selatan</option>
                                <option value="sulawesi_tenggara">Sulawesi Tenggara</option>
                                <option value="maluku">Maluku</option>
                                <option value="maluku_utara">Maluku Utara</option>
                                <option value="papua_barat">Papua Barat</option>
                                <option value="papua">Papua</option>
                                <option value="papua_tengah">Papua Tengah</option>
                                <option value="papua_pegunungan">Papua Pegunungan</option>
                                <option value="papua_selatan">Papua Selatan</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <br>
                            <label>Kota</label>
                            <br>
                            <select name="kota" id="kota" class="form-control">
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="status_pesanan" name="status_pesanan" value="pending">
                        <div class="col-md-12 form-group mb-0">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector">
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                        <button class="button btn-primary mt-3" type="submit">Check Out</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
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
                            <ul class="list">
                                <li><a href="#">
                                        <h4>Product <span>Total</span></h4>
                                    </a></li>
                                <li><a href="#"><?= $data['nama_produk'] ?> <span class="middle"><?= $data['kuantitas'] ?></span> <span class="last">Rp <?= number_format($total) ?></span></a></li>
                            </ul>
                        <?php endwhile; ?>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <div class="text-center">
                            <a class="button button-paypal" href="?page=pesanan/proses">Proceed Pembayaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<script>
    function fetchCities(provinsi) {
        var cities = {
            aceh: ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Sabang', 'Subulussalam'],
            sumatera_utara: ['Medan', 'Binjai', 'Gunungsitoli', 'Padangsidimpuan', 'Pematangsiantar'],
            sumatera_barat: ['Padang', 'Bukittinggi', 'Payakumbuh', 'Pariaman', 'Sawahlunto'],
            riau: ['Pekanbaru', 'Dumai'],
            kepulauan_riau: ['Tanjung Pinang', 'Batam'],
            jambi: ['Jambi', 'Muaro Jambi'],
            sumatera_selatan: ['Palembang', 'Lubuklinggau', 'Pagar Alam', 'Prabumulih'],
            bengkulu: ['Bengkulu'],
            lampung: ['Bandar Lampung', 'Metro'],
            bangka_belitung: ['Pangkal Pinang'],
            banten: ['Serang', 'Tangerang Selatan', 'Cilegon', 'Tangerang'],
            dki_jakarta: ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur'],
            jawa_barat: ['Bandung', 'Bekasi', 'Bogor', 'Cimahi', 'Cirebon'],
            jawa_tengah: ['Semarang', 'Surakarta', 'Tegal', 'Salatiga', 'Magelang'],
            yogyakarta: ['Yogyakarta'],
            jawa_timur: ['Surabaya', 'Malang', 'Kediri', 'Blitar', 'Madiun'],
            bali: ['Denpasar'],
            ntb: ['Mataram', 'Bima'],
            ntt: ['Kupang'],
            kalimantan_barat: ['Pontianak', 'Singkawang'],
            kalimantan_tengah: ['Palangka Raya'],
            kalimantan_selatan: ['Banjarmasin', 'Banjarbaru'],
            kalimantan_timur: ['Samarinda', 'Balikpapan', 'Bontang'],
            kalimantan_utara: ['Tanjung Selor', 'Tarakan'],
            sulawesi_utara: ['Manado', 'Bitung', 'Tomohon', 'Kotamobagu'],
            gorontalo: ['Gorontalo'],
            sulawesi_tengah: ['Palu'],
            sulawesi_barat: ['Mamuju'],
            sulawesi_selatan: ['Makassar', 'Parepare', 'Palopo'],
            sulawesi_tenggara: ['Kendari', 'Baubau'],
            maluku: ['Ambon', 'Tual'],
            maluku_utara: ['Sofifi', 'Ternate', 'Tidore Kepulauan'],
            papua: ['Jayapura'],
            papua_barat: ['Manokwari', 'Sorong'],
            papua_tengah: ['Nabire'],
            papua_pegunungan: ['Wamena'],
            papua_selatan: ['Merauke']
        };
        var kotaSelect = document.getElementById('kota');
        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
        if (provinsi && cities[provinsi]) {
            cities[provinsi].forEach(function(kota) {
                var option = document.createElement('option');
                option.value = kota.toLowerCase().replace(/ /g, '_');
                option.textContent = kota;
                kotaSelect.appendChild(option);
            });
        }
    }
</script>