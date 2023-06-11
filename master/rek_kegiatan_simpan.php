<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$sub_kegiatan = $_POST['sub_kegiatan'];
$kode_rekening = $_POST['kode_rekening'];
$uraian = $_POST['uraian'];
$anggaran = $_POST['anggaran'];

// Query untuk menyimpan data rek kegiatan
$sql = "INSERT INTO tb_rek_kegiatan (id_sub, kode_rekening, uraian, anggaran) VALUES ('$sub_kegiatan', '$kode_rekening', '$uraian', '$anggaran')";

if ($conn->query($sql) === TRUE) {
    echo "Data Rekening Kegiatan berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>