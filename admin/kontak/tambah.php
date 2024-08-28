<?php
include "../layout/header.php";
include "../layout/navbar.php";
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
                            <h5 class="m-b-10">Form Elements</h5>
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
                    <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Isi</label>
                                    <input type="text" class="form-control" name="isi" placeholder="">
                                </div>
                                <button type="submit" class="btn  btn-primary">Submit</button>
                            </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>
    <!-- [ Main Content ] end -->

    <?php include "../layout/footer.php"; ?>