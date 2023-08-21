<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$program = $_POST['program'];
$kegiatan = $_POST['kegiatan'];
$sub_kegiatan = $_POST['sub_kegiatan'];
$tahun = $_POST['tahun'];
$pagu_anggaran = $_POST['pagu_anggaran'];

$sql = "INSERT INTO tb_pagu (program, kegiatan, sub_kegiatan, tahun, pagu_anggaran, tanggal_buat) VALUES ('$program', '$kegiatan', '$sub_kegiatan', '$tahun', '$pagu_anggaran', CURDATE())";
if ($conn->query($sql) === TRUE) {
    echo "Data Pagu Kegiatan berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
       
$conn->close();
?>