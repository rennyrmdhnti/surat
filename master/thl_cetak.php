<?php
// Melakukan koneksi ke database

require_once 'config/koneksi.php';
// Mendapatkan data NIP yang dikirimkan
$nips = $_POST['nips'];

// Membentuk string nips untuk digunakan dalam query SQL
$nipsString = implode("','", $nips);

// Query untuk mengambil data pegawai berdasarkan NIP yang dipilih
$sql = "SELECT * FROM tb_thl WHERE nama IN ('$nipsString')";

$result = $conn->query($sql);

if ($result) {
  $data_pegawai = array();

  // Mengambil data dari hasil query
  while ($row = mysqli_fetch_assoc($result)) {
    $data_pegawai[] = $row;
  }

  // Mengubah data menjadi format tabel HTML
  // Mengubah data menjadi format tabel HTML
  $html = '<html><head><title>Data THL</title>';
  $html .= '<style>';
  $html .= 'table { border-collapse: collapse; width: 100%; border: 2px solid #ddd; }';
  $html .= 'th, td { text-align: left; padding: 8px; border: 2px solid #ddd; }';
  $html .= 'th { background-color: #f2f2f2; }';
  $html .= 'tr:nth-child(even) { background-color: #f9f9f9; }';
  $html .= 'tr:hover { background-color: #e5e5e5; }';
  $html .= 'td:first-child { text-align: center; }';
  $html .= '@page {
    margin-top: 0;
    margin-bottom: 0;
}';
  $html .= '</style>';
  $html .= '</head><body><br><br><br>';
  $html .= '<h3 style="margin-top:0pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:14pt;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:0;"><img src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1684666560_1.-surat-tugas-dengan-lampiran/1684666560_1.-surat-tugas-dengan-lampiran-1.jpeg" width="74" height="102" alt="cOVER ORG" style="margin: 0 0 0 auto; display: block; "></span><span style="font-family:\'Bookman Old Style\';">PEMERINTAH KOTA BANJARMASIN</span></h3>';
  $html .= '<h2 style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:20pt;"><span style="font-family:\'Bookman Old Style\';">BADAN PENGELOLAAN KEUANGAN,</span></h2>';
  $html .= '<h2 style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:20pt;"><span style="font-family:\'Bookman Old Style\';">PENDAPATAN DAN DAERAH</span></h2>';
  $html .= '<p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:8pt;">Jalan Pramuka Tirta Dharma Komplek PDAM Bandarmasih Banjarmasin No.17 RT.09</p>';
  $html .= '<p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:8pt;">Telp.(0511) 4281292 -6742525 Banjarmasin &ndash; Kalimantan selatan</p>';
  $html .= '<p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1;"><img src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1684666560_1.-surat-tugas-dengan-lampiran/1684666560_1.-surat-tugas-dengan-lampiran-2.png" width="640" height="8" alt="" style="margin: 0 0 0 auto; display: block; "></span><span style="font-family:Arial;">&nbsp;</span></p>';
  $html .= '<h1>Data THL</h1>';
  $html .= '<table>';
  $html .= '<tr><th>No.</th><th>Nama</th><th>Jabatan</th><th>Bidang</th><th>Status</th></tr>';
  foreach ($data_pegawai as $index => $pegawai) {
    $html .= '<tr>';
    $html .= '<td>' . ($index + 1) . '</td>';
    $html .= '<td>' . $pegawai['nama'] . '</td>';
    $html .= '<td>' . $pegawai['jabatan'] . '</td>';
    $html .= '<td>' . $pegawai['bidang'] . '</td>';
    $html .= '<td>' . $pegawai['status'] . '</td>';
    $html .= '</tr>';
  }
  $html .= '</table>';
  $html .= '<table width="100%" style="border: 0 !important;">';
  $html .= '<tr>';
  $html .= '<td width="70%" style="border: 0 !important;"></td>';
  $html .= '<td width="30%" align="left" style="border: 0 !important;">';
  $html .= '<p>PENGGUNA ANGGARAN,</p><br><br><br>';
  $html .= '<p>H. EDY WIBOWO, SE</p>';
  $html .= '<p>Pembina</p>';
  $html .= '<p>NIP. 19660602 199203 1 001</p>';
  $html .= '</td>';
  $html .= '</tr>';
  $html .= '</table>';
  $html .= '</body></html>';
  
  echo $html;
} else {
  echo 'Gagal mengambil data dari tabel pegawai.';
}

?>