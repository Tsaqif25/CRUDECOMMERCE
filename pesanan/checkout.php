<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <script>
        function loadCities() {
            var provinceId = document.getElementById('provinsi').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_cities.php?id_provinsi=' + provinceId, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    var cities = JSON.parse(this.responseText);
                    var citySelect = document.getElementById('kota');
                    citySelect.innerHTML = '<option value="">Pilih Kota</option>';
                    cities.forEach(function (city) {
                        var option = document.createElement('option');
                        option.value = city.id_city;
                        option.text = city.name;
                        citySelect.add(option);
                    });
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>

<h2>Form Checkout</h2>

<form action="process_checkout.php" method="POST" enctype="multipart/form-data">
    <label for="expedition">Ekspedisi:</label>
    <select id="expedition" name="expedition" required>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS Indonesia</option>
    </select><br><br>

    <label for="province">Provinsi:</label>
    <select id="province" name="provinsi" onchange="loadCities()" required>
        <option value="">Pilih Provinsi</option>
        <?php
        // Mengambil data provinsi dari database
        $conn = new mysqli('localhost', 'root', '', 'ecommerce');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query("SELECT * FROM kota
        JOIN provinsi ON provinsi.id_provinsi=kota.id_provinsi");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_provinsi']}'>{$row['nama_provinsi']}</option>";
        }
        $conn->close();
        ?>
    </select><br><br>

    <label for="city">Kota:</label>
    <select id="city" name="kota" required>
        <option value="">Pilih Kota</option>
    </select><br><br>

    <label for="address">Alamat:</label>
    <input type="text" id="address" name="alamat" required><br><br>

    <input type="submit" value="Checkout">
</form>

</body>
</html>
