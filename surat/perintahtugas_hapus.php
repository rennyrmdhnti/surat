<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Memeriksa apakah ID pegawai telah diterima melalui metode POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstPart = substr($id, 0, 3);
    $secondPart = substr($id, 3, 3);
    $thirdPart = substr($id, 6, 4);
    $fourthPart = substr($id, 10, 6);
    $fifthPart = substr($id, 16, 4);
    $sixPart = substr($id, 20);

    $finalId = $firstPart . '/' . $secondPart . '/' . $thirdPart . '/' . $fourthPart . '/' . $fifthPart . '/' . $sixPart;
    // var_dump($finalId);exit;

    // Query untuk menghapus data pegawai berdasarkan ID
    $sql = "DELETE FROM tb_perintah_tugas WHERE no_spt = '$finalId'";
    // var_dump($sql);
    // exit;

    if ($conn->query($sql) === TRUE) {
        echo "Data SPT berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
