<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$propinsi = $_POST['propinsi'];
$satuan = $_POST['satuan'];
$besaran = $_POST['besaran'];
$id_transportasi = $_POST['transportasi'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_transportasi SET nama_provinsi = '$propinsi', satuan = '$satuan', besaran = '$besaran' WHERE id = '$id_transportasi'";
// var_dump($sql);exit;

if ($conn->query($sql) === TRUE) {
        echo "Data Biaya Transportasi berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
