<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "web";  // Sesuaikan dengan nama database kamu

$koneksi = new mysqli($host, $username, $password, $database);

// Cek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
