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


$sql = "select * from tb_hasil_dinas tpd  WHERE tpd.id = '$id'";
$result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // var_dump($data[0]['perihal']);exit;

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

.kotakatas {
    margin-left: 20px;
    margin-right: 20px;
}
.margin1 {
    margin-left: 40px;
    margin-right: 20px;
}
.align-top {
    vertical-align: top;
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
<hr>

<div class="center-container">
    <h5>LAPORAN PERJALANAN DINAS</h5>
</div>
<br>
<table class="kotakatas">
    <tr>
        <td width="15%" class="align-top">Kepada Yth</td>
        <td width="5%" class="align-top">:</td>
        <td width="80%">Kepala Badan Pengelolaan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin</td>
    </tr>
    <tr>
        <td width="15%" class="align-top">Dari</td>
        <td width="5%" class="align-top">:</td>
        <td width="80%">Pelaksana Perjalanan Dinas</td>
    </tr>
    <tr>
        <td width="15%" class="align-top">Tanggal</td>
        <td width="5%" class="align-top">:</td>
        <td width="80%"><?php echo $data[0]['tanggal_buat'] ?></td>
    </tr>
    <tr>
        <td width="15%" class="align-top">Perihal</td>
        <td width="5%" class="align-top">:</td>
        <td width="80%"><?php echo $data[0]['perihal'] ?></td>
    </tr>
</table>

<hr>

<h3 class="kotakatas" style="margin-bottom: 0; padding-bottom: 0;">A. DASAR</h3>
<p class="margin1"><?php echo $data[0]['dasar'] ?></p>
<br>

<h3 class="kotakatas" style="margin-bottom: 0; padding-bottom: 0;">B. NAMA KEGIATAN</h3>
<p class="margin1"><?php echo $data[0]['nama_kegiatan'] ?></p>
<br>

<h3 class="kotakatas" style="margin-bottom: 0; padding-bottom: 0;">C. WAKTU DAN TEMPAT KEGIATAN </h3>
<p class="margin1"><?php echo $data[0]['waktu_dan_tempat'] ?></p>
<br>

<h3 class="kotakatas" style="margin-bottom: 0; padding-bottom: 0;">D. HASIL KEGIATAN </h3>
<p class="margin1"><?php echo $data[0]['hasil_kegiatan'] ?></p>
<br>

<h3 class="kotakatas" style="margin-bottom: 0; padding-bottom: 0;">E. KESIMPULAN DAN SARAN </h3>
<p class="margin1" style="color: red;"><?php echo $data[0]['kesimpulan'] ?></p>
<br>

<?php

$bulanIndonesia = array(
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
);

$tanggal = date("d");
$bulan = date("n");
$tahun = date("Y");

$tanggalFormat = $tanggal . " " . $bulanIndonesia[$bulan - 1] . " " . $tahun;
$lokasi = "Banjarmasin";
?>
<br>
<br>
<br>

<table>
    <tr>
        <td colspan="2" style="width: 60%;"></td>
        <td><?php echo $lokasi . ", " . $tanggalFormat; ?></td>
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
        <td style="text-align: center;"><u></u></td>
    </tr>
    <tr>
        <td style="text-align: center;">NIP. 19690112 199303 1 004</td>
        <td style="width: 30%;"></td>
        <td style="text-align: center;"></td>
    </tr>
</table>
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>
<?php
}
?>