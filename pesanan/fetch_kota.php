<?php
include "../koneksi.php";

if (isset($_POST['id_provinsi'])) {
    $id_provinsi = $_POST['id_provinsi'];
    $result = mysqli_query($koneksi, "SELECT * FROM kota WHERE id_provinsi='$id_provinsi'");

    $kota = array();
    while ($row = mysqli_fetch_array($result)) {
        $kota[] = $row;
    }
    echo json_encode($kota);
}
?>
