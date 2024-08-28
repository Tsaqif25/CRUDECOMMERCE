<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">TABEL DATA KATEGORI</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../home/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="index.php">Kategori</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <a href="?page=kategori/tambah" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pesan</th>
                                        <th>ID USER</th>
                                        <th>TANGGAL</th>
                                        <th>BUKTI BAYAR</th>
                                        <th>NO TUJUAN</th>
                                        <th>ALAMAT TUJUAN</th>
                                        <th>STATUS</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_pesan DESC");
                                    while ($item = mysqli_fetch_array($kategori)) {
                                    ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['id_pesan'] ?></td>
                                            <td><?= $item['id_user'] ?></td>
                                            <td><?= $item['tanggal'] ?></td>
                                            <td><img src="assets/images/bukti_bayar/<?= $item['bukti_bayar'] ?>" width="100px"=""></td>
                                            <td><?= $item['no_tujuan'] ?></td>
                                            <td><?= $item['alamat_tujuan'] ?></td>
                                            <td><?= $item['status_pesanan'] ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="?page=pesanan/ubah&id_pesan=<?php echo $item['id_pesan']; ?>">Ubah</a>
                                                <a class="btn btn-danger" href="?page=pesanan/hapus&id_pesan=<?php echo $item['id_pesan']; ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?php
include "../layout/footer.php";
?>