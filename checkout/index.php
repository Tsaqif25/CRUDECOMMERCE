<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Detail Pesanan</h1>
        <form action="checkout/proses_checkout.php" method="post" enctype="multipart/form-data">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-group">
                        <label class="form-label my-3" for="no_tujuan">No Tujuan<sup>*</sup></label>
                        <input type="text" name="no_tujuan" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label my-3" for="alamat_tujuan">Alamat Tujuan<sup>*</sup></label>
                        <input type="text" name="alamat_tujuan" class="form-control" placeholder="Alamat Lengkap">
                    </div>
                    <p></p>
                    <div class="">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="nama_provinsi" class="form-control" id="">

                            </select>
                        </div>
                    </div>
                    <p></p>
                    <div class="">
                        <div class="form-group">
                            <label>Kota / Kabupaten</label>
                            <select name="nama_kota" class="form-control" id="">

                            </select>
                        </div>
                    </div>
                    <p></p>
                    <div class="">
                        <div class="form-group">
                            <label>Ekspedisi</label>
                            <select name="nama_ekspedisi" class="form-control" id="">

                            </select>
                        </div>
                    </div>
                    <p></p>
                    <div class="">
                        <div class="form-group">
                            <label>Paket</label>
                            <select name="nama_paket" class="form-control" id="">
                                <option value="">Pilih Paket</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ongkir</label>
                            <input type="text" class="form-control" name="ongkir">
                        </div>
                    </div>

                    <input type="hidden" name="total_berat" value="1200">
                    <div class="form-group">
                        <label class="form-label my-3" for="bukti_bayar">Bukti Bayar<sup>*</sup></label>
                        <input type="file" name="bukti_bayar" class="form-control">
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">CHEKOUT</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang 
                    JOIN produk ON keranjang.id_produk=produk.id_produk
                    JOIN user ON keranjang.id_user=user.id_user 
                    WHERE user.id_user='$_SESSION[id_user]'
                    ORDER BY id_keranjang DESC");

                                $ongkir = ['ongkir'];
                                $totalbayar = 0;
                                while ($item = mysqli_fetch_array($keranjang)) {
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="admin/assets/images/produk/<?= $item['gambar_produk'] ?>" width="100px" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5"><?= $item['nama_produk'] ?></td>
                                        <td class="py-5"><?= $item['harga'] ?></td>
                                        <td class="py-5"><?= $item['kuantitas'] ?></td>
                                        <td class="py-5"><?= $item['kuantitas'] * $item['harga'] ?> </td>
                                    </tr>


                                <?php
                                    $totalbayar += $item['kuantitas'] * $item['harga'];
                                } ?>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">

                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark"><?= $totalbayar ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
<script src="checkout/js/jquery.min.js"></script>
<script src="checkout/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: 'checkout/data_provinsi.php',
            success: function(hasil_provinsi) {
                $("select[name=nama_provinsi").html(hasil_provinsi);
            }
        });

        $("select[name=nama_provinsi]").on("change", function() {
            //ambil id_provinsi yang dipilih (dari atribut pribadi)
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi")
            $.ajax({
                type: 'post',
                url: 'checkout/data_kota.php',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=nama_kota]").html(hasil_kota)
                }
            })
        });

        $.ajax({
            type: 'post',
            url: 'checkout/data_ekspedisi.php',
            success: function(hasil_ekspedisi) {
                $("select[name=nama_ekspedisi").html(hasil_ekspedisi);
            }
        });

        $("select[name=nama_ekspedisi").on("change", function() {
            //mendapatkan data ongkos kirim

            //mendapatkan ekspedisi yang dipilih
            var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();

            //mendapatkan id_kota yang dipilih pengguna
            var kota_terpilih = $("option:selected", "select[name=nama_kota]").attr("id_kota")

            //mendapatkan total berat dari inputan
            var total_berat = $("input[name=total_berat]").val();

            $.ajax({
                type: 'post',
                url: 'checkout/data_paket.php',
                data: 'ekspedisi=' + ekspedisi_terpilih + '&kota=' + kota_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=nama_paket]").html(hasil_paket);

                    //letakkan nama ekspedisi terpilih di input ekspedisi
                    $("input[name=ekspedisi").val(ekspedisi_terpilih);
                }
            })
        });

        $("select[name=nama_kota]").on("change", function() {
            var prov = $("option:selected", this).attr("nama_provinsi");
            var kot = $("option:selected", this).attr("nama_kota");
            var tipe = $("option:selected", this).attr("tipe_kota");
            var kode_pos = $("option:selected", this).attr("kode_pos");

            $("input[name=provinsi]").val(prov);
            $("input[name=kota]").val(kot);
            $("input[name=tipe]").val(tipe);
            $("input[name=kode_pos]").val(kode_pos);
        });

        $("select[name=nama_paket]").on("change", function() {
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");
            $("input[name=paket]").val(paket);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=estimasi]").val(etd);
        });
    });
</script>