<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Memeriksa apakah ID pegawai telah diterima melalui metode POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // var_dump($id);exit;

    // Query untuk menghapus data pegawai berdasarkan ID
    $sql = "DELETE FROM tb_transportasi WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data Biaya Transportasi berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
