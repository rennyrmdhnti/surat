<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request

// Mengambil nilai input dari request
$id = $_POST['id'];
// $noSPT = $_POST['no_spt'];
// $untuk = $_POST['untuk'];
// $dasar = $_POST['dasar'];
$namaArray = $_POST['nama'];
// var_dump($namaArray);
// var_dump($noSPT);
// var_dump($untuk);
// var_dump($dasar);
// var_dump($id);
$id_array = explode(",", $id);

foreach ($id_array as $key => $value) {
    $sqlHapus = "DELETE FROM tb_perintah_tugas WHERE id = '$value'";
    $conn->query($sqlHapus);
}
$query = "
SELECT *
FROM (
    SELECT ROW_NUMBER() OVER (ORDER BY nama) AS nomor, nama, bidang
    FROM (
        SELECT nama, bidang FROM tb_pegawai 
        UNION ALL 
        SELECT nama, 'THL' AS bidang FROM tb_thl
    ) AS hasil
) AS hasil_nomor
WHERE nomor IN ($namaArray);
";

// Eksekusi query dan proses hasilnya
$result = $conn->query($query);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row["nama"];
}

// Cetak data
// print_r($data);exit;
// $data = array("John", "Doe", "Jane");

$noSPT = $_POST['no_spt'];


// Mendapatkan bulan dan tahun sekarang
$bulanSekarang = date('n');
$tahunSekarang = date('Y');

// Mengonversi bulan menjadi angka romawi
$romawi = romanNumerals($bulanSekarang);

// Membuat nomor urut
$nomorUrut = '800/' . $noSPT . '/Sekr/BPKPAD/' . $romawi . '/' . $tahunSekarang;

// echo $nomorUrut;

// Fungsi untuk mengonversi angka menjadi angka romawi
function romanNumerals($number)
{
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



$dasar = $_POST['dasar'];
$untuk = $_POST['untuk'];
$sql = "INSERT INTO tb_perintah_tugas (nama, no_spt, dasar, untuk) VALUES ";

// Menambahkan setiap nama dalam array ke query SQL
foreach ($data as $nama) {
    $nama = $conn->real_escape_string($nama); // Melakukan escape string untuk menghindari SQL injection
    $sql .= "('$nama', '$nomorUrut', '$dasar', '$untuk'),";
}

// Menghapus koma terakhir dari query SQL
$sql = rtrim($sql, ",");

// Menjalankan query dan memeriksa hasilnya
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
