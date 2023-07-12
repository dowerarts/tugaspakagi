<?php
require('koneksi.php') ; 

?>
<html>

<head>
    <title>Penjualan Minimarket</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Fungsi untuk menghapus data
        function deleteData(npm) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: 'delete.php?npm=' + npm,
                    type: 'GET',
                    success: function (response) {
                        alert(response);
                        // Reload halaman setelah berhasil menghapus data
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#data-table tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Mengambil tanggal saat ini
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1;
            var year = currentDate.getFullYear();

            // Menampilkan tanggal saat ini pada elemen dengan id "current-date"
            $('#current-date').text(day + '/' + month + '/' + year);
        });
    </script>
</head>

<body>
    <a href="nampil.php"><button>Tampilkan Data</button></a>
    <table>
        <div>
            <h2>Input Data</h2>
            <p>Tanggal hari ini: <span id="current-date"></span></p>

            <form role="form" method="POST">
                <tr>
                    <td><label for="tnpm">Nama :</label></td>
                    <td><input type="text" id="tnpm" name="tnpm"></td>
                </tr>
                <tr>
                    <td><label for="tnama">NPM :</label></td>
                    <td><input type="text" id="tnama" name="tnama"></td>
                </tr>
                <tr>
                    <td><label for="talamat">Alamat :</label></td>
                    <td><input type="text" id="talamat" name="talamat"></td>
                </tr>
                <tr>
                    <td><label for="tnotelp">No HP :</label></td>
                    <td><input type="text" id="tnotelp" name="tnotelp"></td>
                </tr>
                <tr>
                    <td><label for="tnamabarang">Nama Barang :</label></td>
                    <td><input type="text" id="tnamabarang" name="tnamabarang"></td>
                </tr>
                <tr>
                    <td><label for="tquantity">Quantity :</label></td>
                    <td><input type="text" id="tquantity" name="tquantity"></td>
                </tr>
                <tr>
                    <td><label for="tharga">Harga :</label></td>
                    <td><input type="text" id="tharga" name="tharga"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Kirim" name="submit"></td>
                </tr>
        </div>
    </table>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $npm = $_POST['tnpm'];
    $nama = $_POST['tnama'];
    $alamat = $_POST['talamat'];
    $notelp = $_POST['tnotelp'];
    $namabarang = $_POST['tnamabarang'];
    $quantity = $_POST['tquantity'];
    $harga = $_POST['tharga'];

    $totalharga = $harga*$quantity;
    echo $totalharga;
    if (empty($npm) || empty($nama) || empty($alamat) || empty($notelp) || empty($namabarang) || empty($quantity) || empty($harga)) {
        echo "LENGKAPI DATA" ; 
    } else {
        $query = mysqli_query($db, "INSERT INTO db_web2(npm, nama, alamat, notelp, namabarang, quantity, harga, totalharga) VALUES ('$npm', '$nama', '$alamat', '$notelp', '$namabarang', '$quantity', '$harga', '$totalharga')") ;
        echo "Berhasil Input";
    }
}
?>