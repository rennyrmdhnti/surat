<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama = $_POST['nama_travel'];
$norek = $_POST['no_rek'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_rek_travel (nama, norek) VALUES ('$nama', '$norek')";

if ($conn->query($sql) === TRUE) {
    echo "Data Rekening Travel berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>