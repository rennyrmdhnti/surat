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

$no_npd = $_POST['no_npd'];
$sub_kegiatan = $_POST['sub_kegiatan'];
$no_dpa = $_POST['no_dpa'];
$kode_rek = $_POST['kode_rek'];
$pencairan = $_POST['pencairan'];
$tanggal_npd = $_POST['tanggal_npd'];
$nama_pptk = $_POST['nama_pptk'];

$sql = "INSERT INTO tb_pencairan_dana (no_npd,id_sub,no_dpa,id_rek,pencairan,tanggal_npd,id_pegawai) VALUES ('$no_npd', '$sub_kegiatan', '$no_dpa', '$kode_rek', '$pencairan', '$tanggal_npd', '$nama_pptk')";

// Menjalankan query dan memeriksa hasilnya
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
