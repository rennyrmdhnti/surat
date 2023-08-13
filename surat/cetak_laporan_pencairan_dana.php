<?php 
require_once 'config/koneksi.php';

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

$sql = "select * from tb_pencairan_dana 
left join tb_rek_kegiatan on tb_rek_kegiatan.id_rek = tb_pencairan_dana.id_rek  
left join tb_pegawai on tb_pegawai.id = tb_pencairan_dana.id_pegawai";

// Tambahkan kondisi WHERE jika startDate dan endDate tidak null
if ($startDate !== '' && $endDate !== '') {
    // Anda mungkin perlu memformat tanggal sesuai dengan format di tabel atau database Anda
    // Contoh format: 'Y-m-d'
    $sql .= " WHERE tb_pencairan_dana.tanggal_npd >= '$startDate' AND tb_pencairan_dana.tanggal_npd <= '$endDate'";
}

// var_dump($sql);exit;

    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // var_dump($data);exit;
    function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
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

<h3 style="text-align: center;">LAPORAN NOTA PENCAIRAN DANA</h3>

<table class="custom-table">
    <thead>
        <tr>
            <th>No</th>
            <th>No NPD</th>
            <th>Tanggal</th>
            <th>Kode Rekening</th>
            <th>Uraian</th>
            <th>Anggaran</th>
            <th>Pencairan Saat Ini</th>
            <th>Nama PPTK</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Misalnya, $data adalah array asosiatif yang berisi data dari database
        foreach ($data as $index => $item) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>'; // Nomor urut
            echo '<td>' . $item['no_npd'] . '</td>';
            echo '<td>' . $item['tanggal_npd'] . '</td>';
            echo '<td>' . $item['kode_rekening'] . '</td>';
            echo '<td>' . $item['uraian'] . '</td>';
            echo '<td>' . formatRupiah($item['anggaran']) . '</td>';
            echo '<td>' . formatRupiah($item['pencairan']) . '</td>';
            echo '<td>' . $item['nama'] . '</td>';
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