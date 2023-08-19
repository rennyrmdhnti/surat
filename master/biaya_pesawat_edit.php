<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama_kota = $_POST['nama_kota'];
$ekonomi = $_POST['ekonomi'];
$id = $_POST['id'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_pesawat SET kota = '$nama_kota', ekonomi = '$ekonomi' WHERE id_pesawat = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data Biaya Pesawat berhasil diperbarui.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
