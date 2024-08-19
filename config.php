<?php
$host = 'localhost'; // atau IP server database
$user = 'root'; // nama pengguna database
$pass = ''; // password database
$db = 'pln'; // nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
