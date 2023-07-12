<?php
require('koneksi.php');

// Periksa apakah ada data yang dikirim melalui form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirim melalui form
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $namabarang = $_POST['namabarang'];
    $quantity = $_POST['quantity'];
    $harga = $_POST['harga'];
    $totalharga = $harga*$quantity;

    // Proses update data ke dalam database
    $query = "UPDATE db_web2 SET 
                npm = '$npm',
                nama = '$nama',
                alamat = '$alamat',
                notelp = '$notelp',
                namabarang = '$namabarang',
                quantity = '$quantity',
                harga = '$harga',
                totalharga = '$totalharga'
              WHERE npm = '$npm'";

    $result = mysqli_query($db, $query);

    if ($result) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Terjadi kesalahan dalam mengupdate data.";
    }
}

// Periksa apakah ada parameter npm yang dikirim melalui URL
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Ambil data user berdasarkan npm dari database
    $query = mysqli_query($db, "SELECT * FROM db_web2 WHERE npm = '$npm'");

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        // Tampilkan data sebelumnya di dalam form
        ?>

<html>

<head>
    <title>Edit Data</title>
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
    <a href="index.php"><button>Home</button></a>

    <h2>Edit Data</h2>

    <table>
        <form method="POST" action="">
            <tr>
                <td><label>NPM:</label></td>
                <td><input type="text" name="npm" value="<?php echo $row['npm']; ?>"></td>
            </tr>
            <tr>
                <td><label>Nama:</label></td>
                <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td><label>Alamat:</label></td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td><label>No. Telepon:</label></td>
                <td><input type="text" name="notelp" value="<?php echo $row['notelp']; ?>"></td>
            </tr>
            <tr>
                <td><label>Nama Barang:</label></td>
                <td><input type="text" name="namabarang" value="<?php echo $row['namabarang']; ?>"></td>
            </tr>
            <tr>
                <td><label>Quantity:</label></td>
                <td><input type="text" name="quantity" value="<?php echo $row['quantity']; ?>"></td>
            </tr>
            <tr>
                <td><label>Harga /item:</label></td>
                <td><input type="text" name="harga" value="<?php echo $row['harga']; ?>"></td>
            </tr>
            <!-- <tr>
                <td><label>Total Harga:</label>
                <td><input type="text" name="totalharga" value="<?php echo $row['totalharga']; ?>"></td>
            </tr> -->
            <tr>
                <td><input type="submit" value="Update" name="submit"></td>
            </tr>
        </form>
    </table>
</body>

</html>

<?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "NPM tidak ditemukan.";
}
?>