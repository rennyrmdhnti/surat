<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

$noNPD = $_POST['no_npd'];


$sub_kegiatan = $_POST['sub_kegiatan'];
$no_dpa = $_POST['no_dpa'];
$kode_rek = $_POST['kode_rek'];
$pencairan = $_POST['pencairan'];
$tanggal_npd = $_POST['tanggal_npd'];
$nama_pptk = $_POST['nama_pptk'];
$id_npd = $_POST['id_npd'];
// var_dump($id);exit;

$sql = "UPDATE tb_pencairan_dana SET no_npd = '$noNPD' , id_sub = '$sub_kegiatan', no_dpa = '$no_dpa', id_rek = '$kode_rek', pencairan = '$pencairan', tanggal_npd = '$tanggal_npd', 
id_pegawai = '$nama_pptk' WHERE id = '$id_npd'";
// var_dump($sql);exit;// Menjalankan query dan memeriksa hasilnya
// echo $sql ;
// exit;
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diedit.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>