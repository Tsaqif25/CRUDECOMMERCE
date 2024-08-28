<?php

$id_kategori = $_GET['id_kategori'];
$search = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
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
                            <h5 class="m-b-10">Edit Data</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../home/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="index.php">User</a></li>
                            <li class="breadcrumb-item"><a href="ubah.php">Edit data</a></li>
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
                    <h5>EDIT DATA</h5>
                </div>
                <div class="card-body">
                    <form action="kategori/proses_ubah.php?id_kategori=<?= $item['id_kategori'] ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" value="<?= $item['nama_kategori'] ?>">
                                </div>
                                <button type="submit" class="btn  btn-primary">Edit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>
    <!-- [ Main Content ] end -->

