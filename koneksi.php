<?php

// Konfigurasi koneksi ke database
$host = 'localhost'; // Nama host database
$username = 'root'; // Username database
$password = ''; // Password database
$dbname = 'pwl_db'; // Nama database

// Membuat koneksi ke database
$db = mysqli_connect($host, $username, $password, $dbname);

// Menangani error jika gagal terhubung ke database
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>