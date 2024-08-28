<?php
include "../layout/header.php";
include "../layout/navbar.php";
include "../koneksi.php";

// Ambil data berdasarkan ID yang dipilih
$id_kontak = $_GET['id_kontak'];
$query = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_kontak = '$id_kontak'");
$data = mysqli_fetch_array($query);
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
                            <h5 class="m-b-10">Ubah Data Kontak</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Kontak</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Data</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="proses_ubah.php" method="POST">
                            <input type="hidden" name="id_kontak" value="<?= $data['id_kontak']; ?>">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="<?= $data['judul']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea name="isi" id="isi" class="form-control" required><?= $data['isi']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?php
include "../layout/footer.php";
?>