<?php
require('koneksi.php');


if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $deleteQuery = mysqli_query($db, "DELETE FROM db_web2 WHERE npm='$npm'");

    if ($deleteQuery) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Parameter npm tidak ditemukan.";
}
?>