<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$propinsi = $_POST['propinsi'];
$satuan = $_POST['satuan'];
$kategori1 = $_POST['kategori1'];
$kategori2 = $_POST['kategori2'];
$kategori3 = $_POST['kategori3'];
$kategori4 = $_POST['kategori4'];
$kategori5 = $_POST['kategori5'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_penginapan (propinsi, satuan, kategori1, kategori2, kategori3, kategori4, kategori5) VALUES ('$propinsi', '$satuan', '$kategori1', '$kategori2', '$kategori3', '$kategori4', '$kategori5')";

if ($conn->query($sql) === TRUE) {
    echo "Data Biaya Penginapan berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>