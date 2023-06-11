<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$propinsi = $_POST['propinsi'];
$satuan = $_POST['satuan'];
$besaran = $_POST['besaran'];
$id_uang_harian = $_POST['id_uang_harian'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_uang_harian SET id_propinsi = '$propinsi', satuan = '$satuan', besaran = '$besaran' WHERE id = '$id_uang_harian'";

if ($conn->query($sql) === TRUE) {
        echo "Data Uang Harian berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
