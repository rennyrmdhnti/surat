<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$golongan = $_POST['golongan'];
$nama_pangkat = $_POST['nama_pangkat'];
$id = $_POST['id_gol'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_golongan SET kd_golongan = '$golongan', nama_pangkat = '$nama_pangkat' WHERE id_gol = '$id'";

if ($conn->query($sql) === TRUE) {
        echo "Data Golongan berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
