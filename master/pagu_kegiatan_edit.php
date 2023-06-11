<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$program = $_POST['program'];
$kegiatan = $_POST['kegiatan'];
$sub_kegiatan = $_POST['sub_kegiatan'];
$tahun = $_POST['tahun'];
$pagu_anggaran = $_POST['pagu_anggaran'];
$id = $_POST['id'];

$sql = "UPDATE tb_pagu SET program='$program', kegiatan='$kegiatan', sub_kegiatan='$sub_kegiatan', tahun='$tahun', pagu_anggaran='$pagu_anggaran' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
        echo "Data Pagu Kegiatan berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
