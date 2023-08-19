<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama_kota = $_POST['nama_kota'];
$ekonomi = $_POST['ekonomi'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_pesawat (kota,ekonomi) VALUES ('$nama_kota', '$ekonomi')";

if ($conn->query($sql) === TRUE) {
    echo "Data Biaya Pesawat berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
