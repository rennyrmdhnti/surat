<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Memeriksa apakah ID pegawai telah diterima melalui metode POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // var_dump($finalId);exit;

    // Query untuk menghapus data pegawai berdasarkan ID
    $sql = "DELETE FROM tb_pencairan_dana WHERE id = '$id'";
    // var_dump($sql);
    // exit;

    if ($conn->query($sql) === TRUE) {
        echo "Data Pencairan Dana berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
