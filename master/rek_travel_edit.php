<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama = $_POST['nama'];
$norek = $_POST['norek'];
$id = $_POST['id'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_rek_travel SET nama = '$nama', norek = '$norek' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
        echo "Data Rekening Travel berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
