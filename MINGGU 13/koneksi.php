<?php
// Laporkan error mysqli sebagai exception
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kampus";
 
try {
    $koneksi = mysqli_connect($host, $user, $pass, $db);
    mysqli_set_charset($koneksi, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());        // detail untuk developer
    exit("Koneksi database gagal.");    // pesan umum untuk pengguna
}
