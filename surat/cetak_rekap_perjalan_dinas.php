<?php 
require_once 'config/koneksi.php';

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

$sql = "SELECT *
FROM tb_perjalan_dinas 
LEFT JOIN tb_perintah_tugas ON tb_perjalan_dinas.no_spt = tb_perintah_tugas.no_spt
left join tb_pegawai on tb_pegawai.nama = tb_perintah_tugas.nama 
left join tb_golongan on tb_golongan.id_gol = tb_pegawai.id_gol 
WHERE tb_perintah_tugas.status = 1 ";

// Tambahkan kondisi WHERE jika startDate dan endDate tidak null
if ($startDate !== '' && $endDate !== '') {
    // Anda mungkin perlu memformat tanggal sesuai dengan format di tabel atau database Anda
    // Contoh format: 'Y-m-d'
    $sql .= " AND tb_perjalan_dinas.tanggal_buat >= '$startDate' AND tb_perjalan_dinas.tanggal_buat <= '$endDate'";
}

    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // var_dump($data);exit;
        ?>

<style>
h2,
h1,
h6,
p {
    margin: 0;
    padding: 0;
}

@media print {
    @page {
        size: landscape;
    }
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
}

.custom-table th,
.custom-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.custom-table th {
    background-color: #f2f2f2;
    text-align: center;
}

.custom-table td {
    vertical-align: top;
}
</style>

<table width="100%">
    <tr>
        <td width="20" align="center"><img
                src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1685286320_2.-sppd/1685286320_2.-sppd-1.jpeg"
                width="100%"></td>
        <td width="50" align="center">
            <h2>PEMERINTAH KOTA BANJARMASIN</h2>
            <h1>BADAN PENGELOLAAN KEUANGAN,
                PENDAPATAN DAN ASET DAERAH
            </h1>
            <h6>Jalan Pramuka Tirta Dharma Komplek PDAM Bandarmasih Banjarmasin No.17 RT.09</h6>
            <h6>Telp.(0511) 4281292 -6742525 Banjarmasin – Kalimantan selatan</h6>
        </td>
    </tr>
</table>
<img src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1685286320_2.-sppd/1685286320_2.-sppd-2.png" alt="">
<br><br>
<hr>

<h3 style="text-align: center;">LAPORAN REKAP PERJALAN DINAS</h3>

<table class="custom-table">
    <thead>
        <tr>
            <th>No</th>
            <th>No SPPD</th>
            <th>Nama/NIP</th>
            <th>Golongan</th>
            <th>Kota Tujuan</th>
            <th>Berankat</th>
            <th>Pulang</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Misalnya, $data adalah array asosiatif yang berisi data dari database
        foreach ($data as $index => $item) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>'; // Nomor urut
            echo '<td>' . $item['no_sppd'] . '</td>';
            echo '<td>' . $item['nama'] . ' / ' . $item['nip'] . '</td>';
            echo '<td>' . $item['kd_golongan'] . '</td>';
            echo '<td>' . $item['tempat_tujuan'] . '</td>';
            echo '<td>' . $item['tanggal_berangkat'] . '</td>';
            echo '<td>' . $item['tanggal_kembali'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>



<?php
$bulanIndonesia = array(
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
);

$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');

$tanggalFormat = $tanggal . " " . $bulanIndonesia[$bulan - 1] . " " . $tahun;
$lokasi = "Banjarmasin";

?>

<br>
<br>
<br>

<table>
    <tr>
        <td style="width: 82%;"></td>
        <td style="text-align: center;">Dikeluarkan Di Banjarmasin</td>
    </tr>
    <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: center;">Pada Tanggal,<?php echo $tanggalFormat; ?></td>
    </tr>
    <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: center;">Mengetahui,</td>
    </tr>
    <tr>
        <td colspan="2" style="height: 120px;"></td>
    </tr>
    <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: center;"><u>H. EDY WIBOWO, SE</u></td>
    </tr>
    <tr>
        <td style="width: 60%;"></td>
        <td style="text-align: center;">NIP. 19690112 199303 1 004</td>
    </tr>
</table>