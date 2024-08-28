<?php
$id_produk = $_GET['id_produk'];
$search = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$item = mysqli_fetch_array($search);
?>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="index.php">Armada</a></li>
                            <li class="breadcrumb-item"><a href="tambah.php">Form Input</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <!-- [ form-element ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Component</h5>
                </div>
                <div class="card-body">
                    <h5>Form controls</h5>
                    <hr>
                    <form action="produk/proses_ubah.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value="<?= $item['id_produk'] ?>">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="id_kategori">Id Kategori</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option value="<?= $item['id_kategori'] ?>"><?= $item['id_kategori'] ?></option>
                                        <?php 
                                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                        while($i = mysqli_fetch_array($kategori)){
                                        ?>
                                        <option value="<?=$i['id_kategori']?>">
                                            <?= $i['nama_kategori'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" value="<?= $item['nama_produk'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>                                    
                                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" required><?= $item['deskripsi'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" name="harga" value="<?= $item['harga'] ?>" required>
                                </div>
                                <div class="form-group">                                        
                                <div class="form-group">
                                        <label for="foto">Up Foto</label><br>
                                        <img src="assets/images/produk/<?= $item['gambar_produk'] ?>" width="100px" alt="">
                                        <input type="hidden" name="foto_lama" value="<?= $item['gambar_produk'] ?>">
                                        <input type="file" class="form-control" name="gambar_produk">
                                    </div>
                                </div>   
                                <button type="submit" class="btn  btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
