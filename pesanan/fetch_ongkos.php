<?php
include "../koneksi.php";

if (isset($_POST['id_kota'])) {
    $id_kota = $_POST['id_kota'];
    $result = mysqli_query($koneksi, "SELECT ongkos FROM kota WHERE id_kota='$id_kota'");

    if ($row = mysqli_fetch_array($result)) {
        echo json_encode(['ongkos' => $row['ongkos']]);
    } else {
        echo json_encode(['ongkos' => 0]);
    }
}
?>
