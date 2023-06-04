<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

$noSPPD = $_POST['no_sppd'];


// Mendapatkan bulan dan tahun sekarang
$bulanSekarang = date('n');
$tahunSekarang = date('Y');

// Mengonversi bulan menjadi angka romawi
$romawi = romanNumerals($bulanSekarang);

// Membuat nomor urut
$nomorUrut = '090/'.$noSPPD.'/Sekr/BPKPAD/'.$romawi.'/'.$tahunSekarang;

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

$noSPT = $_POST['no_spt'];
$maksud = $_POST['maksud'];
$transportasi = $_POST['transportasi'];
$tempatBerangkat = $_POST['tempat_berangkat'];
$tempatTujuan = $_POST['tempat_tujuan'];
$tanggalBerangkat = $_POST['tanggal_berangkat'];
$tanggalKembali = $_POST['tanggal_kembali'];
$lama = $_POST['lama'];
$pengikut = $_POST['pengikut'];
$instansi = $_POST['instansi'];
$mataAnggaran = $_POST['mata_anggaran'];
$keterangan = $_POST['keterangan'];

$sql = "INSERT INTO tb_perjalan_dinas (no_sppd, no_spt, maksud, transportasi, tempat_berangkat, tempat_tujuan, tanggal_berangkat, tanggal_kembali, lama, pengikut, instansi, mata_anggaran, keterangan ) VALUES ('$nomorUrut', '$noSPT', '$maksud', '$transportasi', '$tempatBerangkat', '$tempatTujuan', '$tanggalBerangkat', '$tanggalKembali', '$lama', '$pengikut', '$instansi', '$mataAnggaran', '$keterangan')";

// Menjalankan query dan memeriksa hasilnya
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
