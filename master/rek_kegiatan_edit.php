<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$sub_kegiatan = $_POST['sub_kegiatan'];
$kode_rekening = $_POST['kode_rekening'];
$uraian = $_POST['uraian'];
$anggaran = $_POST['anggaran'];
$id = $_POST['id_rek'];

// Query untuk mengubah data rek kegiatan berdasarkan ID
$sql = "UPDATE tb_rek_kegiatan SET id_sub = '$sub_kegiatan', kode_rekening = '$kode_rekening', uraian = '$uraian', anggaran = '$anggaran' WHERE id_rek = '$id'";

if ($conn->query($sql) === TRUE) {
        echo "Data Rekening Kegiatan berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>
