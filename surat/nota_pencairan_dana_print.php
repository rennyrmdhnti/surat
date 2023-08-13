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

$sqldpa = "select no_dpa from tb_pencairan_dana tpd  WHERE tpd.id = '$id'";
$resultdpa = $conn->query($sqldpa);
$datadpa = array();
    while ($rowdpa = $resultdpa->fetch_assoc()) {
        $datadpa[] = $rowdpa;
    }

$no_dpa = $datadpa[0]["no_dpa"];
// var_dump($datadpa[0]);exit;

$sql = "select
tpd.id,
no_npd ,
tp.program ,
tp.kegiatan ,
tp.sub_kegiatan ,
tp.tahun ,
no_dpa ,
trk.kode_rekening ,
trk.uraian ,
trk.anggaran ,
pencairan ,
tanggal_npd ,
tp2.nama
from
tb_pencairan_dana tpd
left join tb_pagu tp on
tp.id = tpd.id_sub
left join tb_rek_kegiatan trk on
trk.id_rek = tpd.id_rek
left join tb_pegawai tp2 on
tp2.id = tpd.id_pegawai WHERE tpd.no_dpa = '$no_dpa'";
$result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // mengirim data dalam format JSON
    // var_dump($data[0]['no_npd']);exit;
    // var_dump($data);exit;
    // var_dump($data[0]["maksud"]);exit;

    $sqlrek = "SELECT * FROM tb_rek_kegiatan";
    $resultrek = $conn->query($sqlrek);
    $datarek = array();
    while ($rowrek = $resultrek->fetch_assoc()) {
        $datarek[] = $rowrek;
    }

    $sqlrektotal = "SELECT SUM(anggaran) as total FROM tb_rek_kegiatan";
    $resultrektotal = $conn->query($sqlrektotal);
    $datarektotal = array();
    while ($rowrektotal = $resultrektotal->fetch_assoc()) {
        $datarektotal[] = $rowrektotal;
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
    <h4>NOTA PENCAIRAN DANA (NPD)</h4>
    <h5>Nomor: <?php echo $value['no_npd'] ?></h5>
</div>
<br>

<div class="left-container">
    <h5>BENDAHARA PENGELUARAN</h5>
    <h5>SKPD : BADAN PENGELOLAAN KEUANGAN, PENDAPATAN, DAN ASET DAERAH</h5>
</div>
<br>

<?php
$anggaran = intval($value['anggaran']);

$pencairanAngka = intval($value['pencairan']);
$pencairanTerbilang = terbilang($pencairanAngka);
$pencairanRupiah = formatRupiah($pencairanAngka);

$pencairanAngkaTotal += $pencairanAngka;


?>



<table style="font-size: 10px;">
    <tbody>
        <tr>
            <td style="width: 1%;"></td>
            <td style="width: 15%;">Jenis NPD</td>
            <td style="width: 1%;">:</td>
            <td style="width: 24%;">Panjar</td>
            <td style="width: 24%;">Tanpa Panjar</td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="width: 1%;">1</td>
            <td style="width: 15%;">Pejabat Pelaksana Teknis Kegiatan</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['nama']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">2</td>
            <td style="width: 15%;">Program</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['program']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">3</td>
            <td style="width: 15%;">Kegiatan</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['kegiatan']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">4</td>
            <td style="width: 15%;">Sub Kegiatan</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['sub_kegiatan']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">5</td>
            <td style="width: 15%;">Nomor DPA-/DPAL-/DPPA-SKPD</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['no_dpa']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">6</td>
            <td style="width: 15%;">Tahun Anggaran</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $value['tahun']?></td>
        </tr>
        <tr>
            <td style="width: 1%;">7</td>
            <td style="width: 15%;">Jumlah dana yang diminta</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%;" colspan="2"><?php echo $pencairanRupiah;?></td>
        </tr>
        <tr>
            <td style="width: 1%;">8</td>
            <td style="width: 15%;">Terbilang</td>
            <td style="width: 1%;">:</td>
            <td style="width: 46%; font-weight: bold;" colspan="2"><?php echo $pencairanTerbilang;?> RUPIAH</td>
        </tr>
    </tbody>
</table>
<br><br><br>

<table style="font-size: 10px;" id="myTable">
    <tr>
        <td>No Urut</td>
        <td>KODE REKENING</td>
        <td>URAIAN</td>
        <td id="anggaranCell">ANGGARAN</td>
        <td id="anggaranCell">AKUMULASI PENCAIRAN SEBELUMNYA</td>
        <td id="anggaranCell">PENCAIRAN SAAT INI</td>
        <td id="anggaranCell">SISA</td>
    </tr>
    <?php
        $rowNumber = 1; // Initialize the row number

        foreach ($datarek as $row) {
            ?>
    <tr>
        <td><?php echo $rowNumber; ?></td>
        <td><?php echo $row['kode_rekening']; ?></td>
        <td><?php echo $row['uraian']; ?></td>
        <td><?php echo "Rp " . number_format($row['anggaran'], 0, ',', '.'); ?></td>
        <?php
                if ($rowNumber == 1 || $rowNumber == 3){
                    ?>
        <td>Rp. 0</td>
        <td>Rp. 0</td>
        <td><?php echo "Rp " . number_format($row['anggaran'], 0, ',', '.'); ?></td>
        <?php
                } else {
                    if ($i == 0) {
                        ?>
        <td>Rp. 0</td>
        <td><?php echo $pencairanRupiah; ?></td>
        <td><?php echo  formatRupiah($row['anggaran'] - $pencairanAngka);?></td>
        <?php
                    } else {
                        ?>
        <td><?php echo formatRupiah($pencairanAngkaTotal - $pencairanAngka); ?></td>
        <td><?php echo $pencairanRupiah; ?></td>
        <td><?php echo  formatRupiah($row['anggaran'] - $pencairanAngkaTotal);?></td>
        <?php
                    }
                }
                ?>
    </tr>
    <?php
                    $rowNumber++; // Increment the row number
        }
    ?>
    <tr>
        <td colspan="3" style="text-align: center;">Jumlah</td>
        <td><?php  echo formatRupiah($datarektotal[0]['total']) ?></td>
        <?php 
            if ($i == 0) {
                ?>
        <td>Rp. 0</td>
        <td><?php echo $pencairanRupiah; ?></td>
        <td><?php echo  formatRupiah($datarektotal[0]['total'] - $pencairanAngka);?></td>
        <?php
            } else {
                ?>
        <td><?php echo formatRupiah($pencairanAngkaTotal - $pencairanAngka); ?></td>
        <td><?php echo $pencairanRupiah; ?></td>
        <td><?php echo  formatRupiah($datarektotal[0]['total'] - $pencairanAngkaTotal);?></td>
        <?php
            }
       ?>
    </tr>
    <tr>
        <td colspan="7" style="text-align: left;">POTONGAN - POTONGAN</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: left;">PPH</td>
        <td colspan="4" style="text-align: left;">0</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left;">PPh - 23/22/21</td>
        <td style="text-align: center;">Rp.</td>
        <td colspan="4" style="text-align: left;">-</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left;">JUMLAH YANG DITERIMA</td>
        <td style="text-align: left;" colspan="6"><?php echo $pencairanRupiah; ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left;">POTONGAN PPN & PPH</td>
        <td style="text-align: left;" colspan="6">Rp -</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left;">JUMLAH YANG DIBAYARKAN</td>
        <td style="text-align: left;" colspan="6"><?php echo $pencairanRupiah; ?></td>
    </tr>
    <tr>
        <td style="font-weight: bold;" colspan="8"><?php echo $pencairanTerbilang;?> RUPIAH</td>
    </tr>
</table>
<?php
$bulanIndonesia = array(
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
);

$tanggal = 11;
$bulan = 2;
$tahun = 2023;

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
        <td style="text-align: center;"><u><?php echo $value['nama']?></u></td>
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