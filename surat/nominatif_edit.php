<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request

// Mengambil nilai input dari request

$noNPD = $_POST['no_npd'];


// Mendapatkan bulan dan tahun sekarang
$bulanSekarang = date('n');
$tahunSekarang = date('Y');

// Mengonversi bulan menjadi angka romawi
$romawi = romanNumerals($bulanSekarang);

// Membuat nomor urut
$nomorUrut = '090/'.$noNPD.'/Sekr/BPKPAD/'.$romawi.'/'.$tahunSekarang;

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



$no_sppd = $_POST['no_sppd'];
$nama = $_POST['nama'];
$tujuan = $_POST['tujuan'];
$lama = $_POST['lama'];
$uang_harian = $_POST['uang_harian'];
$hotel_pribadi = $_POST['hotel_pribadi'];
$pesawat_pribadi = $_POST['pesawat_pribadi'];
$transport_asal = $_POST['transport_asal'];
$transport_tujuan = $_POST['transport_tujuan'];
$uang_presentatif = $_POST['uang_presentatif'];
$hotel_travel = $_POST['hotel_travel'];
$pesawat_travel = $_POST['pesawat_travel'];
$lebih_pagu_hotel = $_POST['lebih_pagu_hotel'];
$lebih_pagu_pesawat = $_POST['lebih_pagu_pesawat'];
$select_hotel_travel = $_POST['select_hotel_travel'];
$select_pesawat_travel = $_POST['select_pesawat_travel'];
$id_nominatif = $_POST['id_nominatif'];
// var_dump($id);exit;

$sql = "UPDATE tb_nominatif SET no_npd = '$nomorUrut' , no_sppd = '$no_sppd', nama = '$nama', tujuan = '$tujuan', tujuan = '$tujuan', hotel_pribadi = '$hotel_pribadi', uang_harian = '$uang_harian',
 pesawat_pribadi = '$pesawat_pribadi', transport_asal = '$transport_asal', lama = '$lama', transport_asal = '$transport_asal', transport_tujuan = '$transport_tujuan', uang_presentatif = '$uang_presentatif', 
 hotel_travel = '$hotel_travel', pesawat_travel = '$pesawat_travel', lebih_pagu_hotel = '$lebih_pagu_hotel', lebih_pagu_pesawat = '$lebih_pagu_pesawat', select_hotel_travel = '$select_hotel_travel',
 select_pesawat_travel = '$select_pesawat_travel' WHERE id = '$id_nominatif'";
// var_dump($sql);exit;// Menjalankan query dan memeriksa hasilnya
// echo $sql ;
// exit;
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>