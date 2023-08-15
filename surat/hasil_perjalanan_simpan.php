<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// $noSPPD = $_POST['no_sppd'];


// // Mendapatkan bulan dan tahun sekarang
// $bulanSekarang = date('n');
// $tahunSekarang = date('Y');

// // Mengonversi bulan menjadi angka romawi
// $romawi = romanNumerals($bulanSekarang);

// // Membuat nomor urut
// $nomorUrut = '090/'.$noSPPD.'/Sekr/BPKPAD/'.$romawi.'/'.$tahunSekarang;

// // echo $nomorUrut;

// // Fungsi untuk mengonversi angka menjadi angka romawi
// function romanNumerals($number) {
//     $map = [
//         'X' => 10,
//         'IX' => 9,
//         'V' => 5,
//         'IV' => 4,
//         'I' => 1
//     ];
//     $result = '';
//     foreach ($map as $roman => $arabic) {
//         while ($number >= $arabic) {
//             $result .= $roman;
//             $number -= $arabic;
//         }
//     }
//     return $result;
// }

$nama_kegiatan = $_POST['nama_kegiatan'];
$dasar = $_POST['dasar'];
$waktu_dan_tempat = $_POST['waktu_dan_tempat'];
$hasil_kegiatan = $_POST['hasil_kegiatan'];
$kesimpulan = $_POST['kesimpulan'];

$sql = "INSERT INTO tb_hasil_dinas (nama_kegiatan,dasar,waktu_dan_tempat,hasil_kegiatan,kesimpulan,tanggal_buat) VALUES ('$nama_kegiatan', '$dasar', '$waktu_dan_tempat', '$hasil_kegiatan', '$kesimpulan', CURDATE())";

// Menjalankan query dan memeriksa hasilnya
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
