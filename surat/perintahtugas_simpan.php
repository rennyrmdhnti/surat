<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$namaArray = $_POST['nama'];
// var_dump($namaArray);exit;

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



$nama = implode(" | ", $data);

$noSPT = $_POST['no_spt'];
$dasar = $_POST['dasar'];
$untuk = $_POST['untuk'];

// Lakukan validasi atau manipulasi data sebelum menyimpan ke database

// Query SQL untuk menyimpan data
$sql = "INSERT INTO tb_perintah_tugas (nama, no_spt, dasar, untuk)
        VALUES ('$nama', '$noSPT', '$dasar', '$untuk')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
