<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$golongan = $_POST['golongan'];
$nama_pangkat = $_POST['nama_pangkat'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_golongan (kd_golongan, nama_pangkat) VALUES ('$golongan', '$nama_pangkat')";

if ($conn->query($sql) === TRUE) {
    echo "Data Golongan berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>