<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Memeriksa apakah ID pegawai telah diterima melalui metode POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // var_dump($id);exit;

    // Query untuk menghapus data pegawai berdasarkan ID
    $sql = "DELETE FROM tb_pesawat WHERE id_pesawat = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data Biaya Pesawat berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
