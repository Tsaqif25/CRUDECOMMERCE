

    <style>
        .form-group {
            margin-bottom: 15px;
        }
    </style>
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form action="" method="post">
                        <div class="col-md-12 form-group p_star">
                            <label for="provinsi">Pilih Provinsi:</label>
                            <select name="provinsi" class="form-control" onchange="this.form.submit()">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                $conn = new mysqli("localhost", "root", "", "ecommerce");

                                // Fetch provinsi
                                $provinsi_query = "SELECT * FROM provinsi";
                                $provinsi_result = $conn->query($provinsi_query);

                                while ($row = $provinsi_result->fetch_assoc()) {
                                    $selected = isset($_POST['provinsi']) && $_POST['provinsi'] == $row['id_provinsi'] ? 'selected' : '';
                                    echo "<option value='".$row['id']."' $selected>".$row['nama_provinsi']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <label for="kota">Pilih Kota:</label>
                            <select name="kota" class="form-control" onchange="this.form.submit()">
                                <option value="">Pilih Kota</option>
                                <?php
                                if (isset($_POST['provinsi'])) {
                                    $id_provinsi = $_POST['provinsi'];
                                    $kota_query = "SELECT * FROM kota WHERE id_provinsi = $id_provinsi";
                                    $kota_result = $conn->query($kota_query);

                                    while ($row = $kota_result->fetch_assoc()) {
                                        $selected = isset($_POST['kota']) && $_POST['kota'] == $row['id_kota'] ? 'selected' : '';
                                        echo "<option value='".$row['id']."' $selected>".$row['nama_kota']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <?php
                            if (isset($_POST['kota'])) {
                                $id_kota = $_POST['kota'];
                                $ongkos_query = "SELECT * FROM kota WHERE id_kota = $id_kota";
                                $ongkos_result = $conn->query($ongkos_query);
                                $kota = $ongkos_result->fetch_assoc();
                                echo "Ongkos Kirim: Rp" . $kota['ongkos'];
                            }
                            ?>
                        </div>

                        <button class="button btn-primary" type="submit">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>



<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch provinsi
$provinsi_query = "SELECT * FROM provinsi";
$provinsi_result = $conn->query($provinsi_query);

// Fetch kota berdasarkan provinsi yang dipilih
if (isset($_POST['provinsi'])) {
    $id_provinsi = $_POST['provinsi'];
    $kota_query = "SELECT * FROM kota WHERE id_provinsi = $id_provinsi";
    $kota_result = $conn->query($kota_query);
}

// Fetch ongkos berdasarkan kota yang dipilih
if (isset($_POST['kota'])) {
    $id_kota = $_POST['kota'];
    $ongkos_query = "SELECT * FROM kota WHERE id_kota = $id_kota";
    $ongkos_result = $conn->query($ongkos_query);
    $ongkos = $ongkos_result->fetch_assoc();
}

$conn->close();
?>
