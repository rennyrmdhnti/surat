<?php
// mengatur variabel koneksi ke MySQL
$servername = "localhost"; // ganti dengan nama server MySQL Anda jika tidak menggunakan localhost
$username = "root"; // ganti dengan nama pengguna MySQL Anda
$password = ""; // ganti dengan kata sandi MySQL Anda
$database = "db_surat"; // ganti dengan nama database MySQL Anda

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// echo "Koneksi berhasil";
?>
