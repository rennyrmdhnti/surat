<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request

// Mengambil nilai input dari request

$noSPPD = $_POST['no_sppd'];


// Mendapatkan bulan dan tahun sekarang
$bulanSekarang = date('n');
$tahunSekarang = date('Y');

// Mengonversi bulan menjadi angka romawi
$romawi = romanNumerals($bulanSekarang);

// Membuat nomor urut
$nomorUrut = '800/'.$noSPPD.'/Sekr/BPKPAD/'.$romawi.'/'.$tahunSekarang;

// echo $nomorUrut;

// Fungsi untuk mengonversi angka menjadi angka romawi
function romanNumerals($number) {
    $map = [
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];
    $result = '';
    foreach ($map as $roman => $arabic) {
        while ($number >= $arabic) {
            $result .= $roman;
            $number -= $arabic;
        }
    }
    return $result;
}



$no_spt = $_POST['no_spt'];
$maksud = $_POST['maksud'];
$transportasi = $_POST['transportasi'];
$tempat_berangkat = $_POST['tempat_berangkat'];
$tempat_tujuan = $_POST['tempat_tujuan'];
$tanggal_berangkat = $_POST['tanggal_berangkat'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$lama = $_POST['lama'];
$pengikut = $_POST['pengikut'];
$instansi = $_POST['instansi'];
$mata_anggaran = $_POST['mata_anggaran'];
$keterangan = $_POST['keterangan'];
$id = $_POST['id'];

$sql = "UPDATE tb_perjalan_dinas SET no_sppd = '$nomorUrut' , no_spt = '$no_spt', maksud = '$maksud', transportasi = '$transportasi', tempat_berangkat = '$tempat_berangkat', tempat_tujuan = '$tempat_tujuan', tanggal_berangkat = '$tanggal_berangkat', tanggal_kembali = '$tanggal_kembali', lama = '$lama', pengikut = '$pengikut', instansi = '$instansi', mata_anggaran = '$mata_anggaran', keterangan = '$keterangan' WHERE id = '$id'";

// Menjalankan query dan memeriksa hasilnya
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
