<?php
require('koneksi.php');

$query = mysqli_query($db, "SELECT * FROM db_web2");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Penjualan Minimarket</title>
    <style>
        /* CSS untuk tampilan web */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        /* CSS untuk tombol */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        /* CSS untuk tanggal */
        #current-date {
            font-weight: bold;
            font-size: 18px;
        }

        /* CSS untuk input search */
        #search {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 300px;
        }

        /* CSS untuk tombol edit dan delete */
        .edit-button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #F44336;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>

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
    <a href="index.php"><button class="button">Home</button></a>

    <h2>Data dalam Database</h2>
    <p>Tanggal hari ini: <span id="current-date"></span></p>
    <input type="text" id="search" placeholder="Cari...">
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Harga /item</th>
                <th>Total Harga</th>
                <th>Edit Data</th>
                <th>Delete Data</th>
            </tr>
        </thead>
        <tbody id="data-table">

            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row['npm'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['notelp'] . "</td>";
                echo "<td>" . $row['namabarang'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($row['totalharga'], 0, ',', '.') . "</td>";
                echo "<td><a href='edit.php?npm=" . $row['npm'] . "' class='edit-button'>Edit</a></td>";
                echo "<td><button onclick=\"deleteData('" . $row['npm'] . "')\" class='delete-button'>Delete</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
</body>

</html>