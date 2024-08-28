<?php
$id_user = $_GET['id_user'];
$search = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
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
                    <form action="user/proses_ubah.php?id_user=<?= $id_user ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $item['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" value="<?= $item['password'] ?>"">
                                </div>
                                <div class=" form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?= $item['nama_lengkap'] ?>"">
                                </div>
                                <button type=" submit" class="btn  btn-primary">Edit</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="foto">Up Foto</label><br>
                                        <img src="assets/images/user/<?= $item['foto'] ?>" width="100px" alt="">
                                        <input type="hidden" name="foto_lama" value="<?= $item['foto'] ?>">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                    <div class="form-group">
                                    <label for="nama_lengkap"><?= $item['level'] ?></label>
                                    <select name="level" class="form-control" id="" required>
                                        <option value="value">PILIH LEVEL</option>
                                        <option value="admin" <?= $item['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="member" <?= $item['level'] == 'member' ? 'selected' : '' ?>>Member</option>
                                    </select>
                                </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>
    <!-- [ Main Content ] end -->