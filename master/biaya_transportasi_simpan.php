<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$propinsi = $_POST['propinsi'];
$satuan = $_POST['satuan'];
$besaran = $_POST['besaran'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_transportasi (nama_provinsi, satuan, besaran) VALUES ('$propinsi', '$satuan', '$besaran')";

if ($conn->query($sql) === TRUE) {
    echo "Data Biaya Transportasi berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>