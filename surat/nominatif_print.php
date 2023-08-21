<?php 
require_once 'config/koneksi.php';

$id = $_GET['id'];
// $firstPart = substr($id, 0, 3);
// $secondPart = substr($id, 3, 3);
// $thirdPart = substr($id, 6, 4);
// $fourthPart = substr($id, 10, 6);
// $fifthPart = substr($id, 16, 2);
// $sixPart = substr($id, 18);

// $finalId = $firstPart . '/' . $secondPart . '/' . $thirdPart . '/' . $fourthPart . '/' . $fifthPart . '/' . $sixPart;

// var_dump($id);
// var_dump($finalId);
// exit;

$sqlsppd = "select no_sppd from tb_nominatif tn  WHERE tn.id = '$id'";
$resultsppd = $conn->query($sqlsppd);
$datasppd = array();
    while ($rowsppd = $resultsppd->fetch_assoc()) {
        $datasppd[] = $rowsppd;
    }

$no_sppd = $datasppd[0]["no_sppd"];
// var_dump($no_sppd);exit;

$sql = "select
nama,
tn.lama,
uang_harian / tn.lama as uang_harian_bagi,
uang_harian,
uang_presentatif,
IF(hotel_travel IS NULL OR hotel_travel = '', hotel_pribadi, hotel_travel) as hotel_selected,
IF(pesawat_travel IS NULL OR pesawat_travel = '', pesawat_pribadi, pesawat_travel) as pesawat_selected,
transport_asal + transport_tujuan as transport,
uang_harian + uang_presentatif + 
IF(hotel_travel IS NULL OR hotel_travel = '', hotel_pribadi, hotel_travel) + 
IF(pesawat_travel IS NULL OR pesawat_travel = '', pesawat_pribadi, pesawat_travel) + 
transport_asal + transport_tujuan as total
FROM
tb_nominatif tn
LEFT JOIN
tb_perjalan_dinas tpd ON tn.no_sppd = tpd.no_sppd
where tpd.no_sppd = '$no_sppd'
UNION
SELECT
'Total',
NULL,
NULL,
SUM(uang_harian),
SUM(uang_presentatif),
SUM(CASE WHEN hotel_travel IS NULL OR hotel_travel = '' THEN hotel_pribadi ELSE hotel_travel END),
SUM(CASE WHEN pesawat_travel IS NULL OR pesawat_travel = '' THEN pesawat_pribadi ELSE pesawat_travel END),
SUM(transport_asal + transport_tujuan),
SUM(uang_harian + uang_presentatif +
CASE WHEN hotel_travel IS NULL OR hotel_travel = '' THEN hotel_pribadi ELSE hotel_travel END +
CASE WHEN pesawat_travel IS NULL OR pesawat_travel = '' THEN pesawat_pribadi ELSE pesawat_travel END +
transport_asal + transport_tujuan) as total
FROM
tb_nominatif tn
LEFT JOIN
tb_perjalan_dinas tpd ON tn.no_sppd = tpd.no_sppd
where tpd.no_sppd = '$no_sppd'";

// var_dump($sql);exit;
$result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // var_dump($data);exit;

    $sqlJudul = "select tanggal_berangkat ,tanggal_kembali , maksud ,tempat_tujuan, trk.kode_rekening , tpd.no_sppd , tn.no_npd ,trk.id_rek, mata_anggaran from tb_nominatif tn 
    left join tb_perjalan_dinas tpd on tn.no_sppd = tpd.no_sppd 
    left join tb_pencairan_dana tpd2 on tn.no_npd = tpd2.no_npd 
    left join tb_rek_kegiatan trk on trk.id_rek = tpd2.id_rek where trk.kode_rekening is not null and tn.no_sppd = '$no_sppd'";

    $resultJudul = $conn->query($sqlJudul);
    $dataJudul = array();
    while ($rowJudul = $resultJudul->fetch_assoc()) {
        $dataJudul[] = $rowJudul;
    }
    
    // var_dump($dataJudul[0]['maksud']);exit;

        ?>


<style>
h2,
h1,
h6,
p {
    margin: 0;
    padding: 0;
}

table {
    border-collapse: collapse;
}

#table-data,
#table-data th,
#table-data td {
    border: 2px solid black;
    padding: 5px;
}

#my-table {
    border: none;
}

@page {
    margin-top: 0;
    margin-bottom: 0;
}

body {
    padding-top: 4rem;
    padding-bottom: 4rem;
}

.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80px;
    flex-direction: column;
    text-align: center;
}

.center-container h4,
.center-container h5 {
    margin: 3px 0;
}

.left-container h4,
.left-container h5 {
    margin: 3px 0;
}

.left1-container p {
    margin: 3px 5px;
}

#myTable {
    width: 100%;
    font-size: 10px;
    border-collapse: collapse;
}

#myTable td,
#myTable th {
    padding: 6px;
    border: 1px solid black;
}

#myTable th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center;
}

#anggaranCell {
    width: 80px;
}
</style>

<?php

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10). " BELAS";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " SERATUS" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " SERIBU" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}


function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
$dataCount = count($data);

$pencairanAngkaTotal = 0;
for ($i = 0; $i < $dataCount; $i++) {
    $key = $i;
    $value = $data[$i];
?>


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

<div class="center-container">
    <h4>DAFTAR NOMINATIF TANDA TERIMA PERJALANAN DINAS BIASA</h4>
</div>
<br>

<?php

$tanggal_mulai = $dataJudul[0]['tanggal_berangkat'];
$tanggal_selesai = $dataJudul[0]['tanggal_kembali'];

$format_tanggal_mulai = date('d', strtotime($tanggal_mulai));
$format_tanggal_selesai = date('d F Y', strtotime($tanggal_selesai));

$hasil_format = $format_tanggal_mulai . ' s.d ' . $format_tanggal_selesai;


?>

<table style="font-size: 10px;">
    <tbody>
        <tr>
            <td>SUB KEGIATAN</td>
            <td>:</td>
            <td><?php echo $dataJudul[0]['mata_anggaran']; ?></td>
        </tr>
        <tr>
            <td>DALAM RANGKA</td>
            <td>:</td>
            <td><?php echo $dataJudul[0]['maksud']; ?></td>
        </tr>
        <tr>
            <td>TUJUAN</td>
            <td>:</td>
            <td><?php echo $dataJudul[0]['tempat_tujuan']; ?></td>
        </tr>
        <tr>
            <td>TANGGAL</td>
            <td>:</td>
            <td><?php echo $hasil_format; ?></td>
        </tr>
        <tr>
            <td>KDOE REKENIGN</td>
            <td>:</td>
            <td><?php echo $dataJudul[0]['kode_rekening']; ?></td>
        </tr>
    </tbody>
</table>
<br><br><br>
<table style="font-size: 10px;" id="myTable">
    <tr>
        <th rowspan='2'>NO</th>
        <th rowspan='2'>Nama</th>
        <th rowspan='2' colspan='5'>Uang Harian</th>
        <th rowspan='2'>Uang Presentatif</th>
        <th rowspan='2'>Uang Penginapan</th>
        <th colspan='2'>Tiket</th>
        <th rowspan='2'>Transportasi</th>
        <th rowspan='2'>Jumlah Bersih</th>
        <th rowspan='2'>Tanda Tangan</th>
    </tr>
    <tr>
        <th>Pesawat</th>
        <th>Swab</th>
    </tr>
    <?php
    $rowNumber = 1; // Initialize the row number

    foreach ($data as $row) {
        ?>
    <tr>
        <td><?php echo $rowNumber; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['lama']; ?></td>
        <td>x</td>
        <td>
            <?php
                if (!empty($row['uang_harian_bagi'])) {
                    echo "Rp " . number_format($row['uang_harian_bagi'], 0, ',', '.');
                }
                ?>
        </td>
        <td>=</td>
        <td>
            <?php
                if (!empty($row['uang_harian'])) {
                    echo "Rp " . number_format($row['uang_harian'], 0, ',', '.');
                }
                ?>
        </td>
        <td>
            <?php
                if (!empty($row['uang_presentatif'])) {
                    echo "Rp " . number_format($row['uang_presentatif'], 0, ',', '.');
                }
                ?>
        </td>
        <td>
            <?php
                if (!empty($row['hotel_selected'])) {
                    echo "Rp " . number_format($row['hotel_selected'], 0, ',', '.');
                }
                ?>
        </td>
        <td>
            <?php
                if (!empty($row['pesawat_selected'])) {
                    echo "Rp " . number_format($row['pesawat_selected'], 0, ',', '.');
                }
                ?>
        </td>
        <td></td>
        <td>
            <?php
                if (!empty($row['transport'])) {
                    echo "Rp " . number_format($row['transport'], 0, ',', '.');
                }
                ?>
        </td>
        <td>
            <?php
                if (!empty($row['total'])) {
                    echo "Rp " . number_format($row['total'], 0, ',', '.');
                }
                ?>
        </td>
        <td></td>
    </tr>
    <?php
        $rowNumber++;
    }
    ?>
</table>

<?php
$bulanIndonesia = array(
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
);

$tanggalHariIni = date('j');
$bulanHariIni = date('n');
$tahunHariIni = date('Y');

$tanggalFormatHariIni = $tanggalHariIni . " " . $bulanIndonesia[$bulanHariIni - 1] . " " . $tahunHariIni;

$lokasi = "Banjarmasin";

?>

<br>
<br>
<br>

<table>
    <tr>
        <td colspan="2" style="width: 60%;"></td>
        <td><?php echo $lokasi . ", " . $tanggalFormatHariIni; ?></td>
    </tr>
    <tr>
        <td style="text-align: center;">Mengetahui & Menyetujui</td>
        <td colspan="2" style="width: 60%;"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Pengguna Anggaran</td>
        <td style="width: 30%;"></td>
        <td style="text-align: center;">Pejabat Pelaksana Teknis Kegiatan</td>
    </tr>
    <tr>
        <td colspan="3" style="height: 120px;"></td>
    </tr>
    <tr>
        <td style="text-align: center;"><u>H. EDY WIBOWO, SE</u></td>
        <td style="width: 30%;"></td>
        <td style="text-align: center;"><u>Hj. NURIN AULIA, SE</u></td>
    </tr>
    <tr>
        <td style="text-align: center;">NIP. 19690112 199303 1 004</td>
        <td style="width: 30%;"></td>
        <td style="text-align: center;">NIP.19710112 199103 2 002</td>
    </tr>
</table>
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>
<?php
}
?>