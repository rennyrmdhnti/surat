<?php
// Memanggil file koneksi.php
require_once 'config/koneksi.php';
// Mengambil nilai "no_sppd" yang dikirimkan melalui permintaan AJAX
$no_sppd = $_POST['no_sppd'];

// Query untuk mengambil data dari tabel berdasarkan "no_sppd" yang dipilih
$query = "SELECT tpt.nama, tpd.tempat_tujuan, tpd.lama 
          FROM tb_perjalan_dinas tpd 
          LEFT JOIN tb_perintah_tugas tpt ON tpt.no_spt = tpd.no_spt 
          WHERE tpd.no_sppd = '$no_sppd'";
$result = mysqli_query($conn, $query);

$data = array(); // Array untuk menyimpan data

// Iterasi hasil query dan menambahkan data ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'nama' => $row['nama'],
        'tempat_tujuan' => $row['tempat_tujuan'],
        'lama' => $row['lama']
    );
}

// Mengembalikan data sebagai respons JSON
echo json_encode($data);

?>