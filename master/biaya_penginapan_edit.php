<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$propinsi = $_POST['propinsi'];
$satuan = $_POST['satuan'];
$kategori1 = $_POST['kategori1'];
$kategori2 = $_POST['kategori2'];
$kategori3 = $_POST['kategori3'];
$id_penginapan = $_POST['id_penginapan'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_penginapan SET propinsi = '$propinsi', satuan = '$satuan', kategori1 = '$kategori1', kategori2 = '$kategori2', kategori3 = '$kategori3' WHERE id = '$id_penginapan'";

if ($conn->query($sql) === TRUE) {
    echo "Data Biaya Penginapan berhasil diperbarui.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
