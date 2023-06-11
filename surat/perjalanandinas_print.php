<?php 
require_once 'config/koneksi.php';

$id = $_GET['id'];
$firstPart = substr($id, 0, 3);
$secondPart = substr($id, 3, 3);
$thirdPart = substr($id, 6, 4);
$fourthPart = substr($id, 10, 6);
$fifthPart = substr($id, 16, 2);
$sixPart = substr($id, 18);

$finalId = $firstPart . '/' . $secondPart . '/' . $thirdPart . '/' . $fourthPart . '/' . $fifthPart . '/' . $sixPart;

// var_dump($id);
// var_dump($finalId);
// exit;

$sql = "SELECT * FROM tb_perjalan_dinas LEFT JOIN tb_perintah_tugas ON tb_perjalan_dinas.no_spt = tb_perintah_tugas.no_spt WHERE tb_perjalan_dinas.no_sppd = '$finalId'";
$result = $conn->query($sql);
    $data = array();
    $dataNama = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
        $dataNama[] = $row['nama'];
    }
    // mengirim data dalam format JSON
    // var_dump($data[0]);exit;
    // var_dump($data[0]["maksud"]);exit;

// Loop through each name
foreach ($dataNama as $name) {
        // Prepare the query
        $tabelsql = "SELECT nama, nip, jabatan, tb_golongan.nama_pangkat, tb_golongan.kd_golongan FROM tb_pegawai LEFT JOIN tb_golongan ON tb_golongan.id_gol = tb_pegawai.id_gol 
                     WHERE nama = '$name'
                     UNION ALL
                     SELECT nama, '' AS nip, 'Tenaga Harian Lepas (THL)' AS jabatan, '' AS nama_pangkat, '' AS kd_golongan FROM tb_thl
                     WHERE nama = '$name'";
    
        // Execute the query
        $datatabel = $conn->query($tabelsql);
    
        // Check if the query execution was successful
        if (!$datatabel) {
            die("Query failed: " . $conn->error);
        }
    
        // Fetch and display the results
        while ($dtabel = $datatabel->fetch_assoc()) {
            $dataArray[] = $dtabel;
        }
        
    }
    // var_dump($dataArray);exit;
for ($i=0; $i < count($dataArray); $i++) { 
        // var_dump($dataArray[$i]);

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
</style>

<table width="100%">
    <tr>
        <td width="35" align="center"><img
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

<table width="100%">
    <tbody>
        <tr>
            <td width="50%"></td>
            <td width="15%">Lembar Ke </td>
            <td>:</td>
            <td>...................................................</td>
        </tr>
        <tr>
            <td width="50%"></td>
            <td width="15%">Kode no. </td>
            <td>:</td>
            <td>...................................................</td>
        </tr>
        <tr>
            <td width="50%"></td>
            <td width="15%">Nomor</td>
            <td>:</td>
            <td><?php echo $data[0]["no_sppd"] ;?></td>
        </tr>
    </tbody>
</table>
<br>
<h2 style="font-size: 20px;font-weight: normal;text-decoration: underline; text-align:center;">SURAT PERINTAH PERJALANAN
    DINAS</h2>
<h2 style="font-size: 20px;font-weight: normal; text-align:center;">(SPPD)</h2>

<table id="table-data" width="100%">
    <tbody>
        <tr>
            <td width="35%">
                1. Pengguna Anggaran
            </td>
            <td>
                Kepala Badan Pengelolaan Keuangan, Pendapatan dan Aset Daerah
            </td>
        </tr>
        <tr>
            <td>
                2. Nama Pegawai yang diperintahkan
            </td>
            <td><?php echo $dataArray[$i]["nama"] ?> / <?php echo $dataArray[$i]["nip"] ?>
            </td>
        </tr>
        <tr>
            <td>3. a. Pangkat dan Golongan
                <p>menurut PP No.6 Tahun </p>
                <p>1997</p>
                <p>b. Jabatan</p>
                <p>c. menurut peraturan</p>
                <p>perjalanan</p>
            </td>
            <td><?php echo $dataArray[$i]["nama_pangkat"] ?>(<?php echo $dataArray[$i]["kd_golongan"] ?>) <br><br>
                <?php echo $dataArray[$i]["jabatan"] ?>
            </td>
        </tr>
        <tr>
            <td>4. Maksud Perjalanan Dinas
            </td>
            <td><?php echo $data[0]["maksud"] ;?>
            </td>
        </tr>
        <tr>
            <td>5. Alat Angkut yang digunakan
            </td>
            <td><?php echo $data[0]["transportasi"] ;?>
            </td>
        </tr>
        <tr>
            <td>6. a. Tempat berangkat <br> b. Tempat tujuan
            </td>
            <td>
                Banjarmasin <br>
                <?php echo $data[0]["tempat_tujuan"] ;?>
            </td>
        </tr>
        <tr>
            <td>7. a. Lamanya Perjalanan Dinas<br>
                b. Tanggalberangkat<br>
                c. Tanggalharuskembali
            </td>
            <td>
                <?php
                echo $data[0]["lama"] . " Hari" . "<br>";

                $tanggal_berangkat = $data[0]["tanggal_berangkat"];
                $tanggal_berangkat_parts = explode("-", $tanggal_berangkat);
                $bulan_berangkat = "";
                switch ($tanggal_berangkat_parts[1]) {
                    case '01':
                        $bulan_berangkat = "Januari";
                        break;
                    case '02':
                        $bulan_berangkat = "Februari";
                        break;
                    case '03':
                        $bulan_berangkat = "Maret";
                        break;
                    case '04':
                        $bulan_berangkat = "April";
                        break;
                    case '05':
                        $bulan_berangkat = "Mei";
                        break;
                    case '06':
                        $bulan_berangkat = "Juni";
                        break;
                    case '07':
                        $bulan_berangkat = "Juli";
                        break;
                    case '08':
                        $bulan_berangkat = "Agustus";
                        break;
                    case '09':
                        $bulan_berangkat = "September";
                        break;
                    case '10':
                        $bulan_berangkat = "Oktober";
                        break;
                    case '11':
                        $bulan_berangkat = "November";
                        break;
                    case '12':
                        $bulan_berangkat = "Desember";
                        break;
                    default:
                        $bulan_berangkat = "";
                        break;
                }

                echo $tanggal_berangkat_parts[2] . " " . $bulan_berangkat . " " . $tanggal_berangkat_parts[0] . "<br>";

                $tanggal_kembali = $data[0]["tanggal_kembali"];
                $tanggal_kembali_parts = explode("-", $tanggal_kembali);
                $bulan_kembali = "";
                switch ($tanggal_kembali_parts[1]) {
                    case '01':
                        $bulan_kembali = "Januari";
                        break;
                    case '02':
                        $bulan_kembali = "Februari";
                        break;
                    case '03':
                        $bulan_kembali = "Maret";
                        break;
                    case '04':
                        $bulan_kembali = "April";
                        break;
                    case '05':
                        $bulan_kembali = "Mei";
                        break;
                    case '06':
                        $bulan_kembali = "Juni";
                        break;
                    case '07':
                        $bulan_kembali = "Juli";
                        break;
                    case '08':
                        $bulan_kembali = "Agustus";
                        break;
                    case '09':
                        $bulan_kembali = "September";
                        break;
                    case '10':
                        $bulan_kembali = "Oktober";
                        break;
                    case '11':
                        $bulan_kembali = "November";
                        break;
                    case '12':
                        $bulan_kembali = "Desember";
                        break;
                    default:
                        $bulan_kembali = "";
                        break;
                }

                echo $tanggal_kembali_parts[2] . " " . $bulan_kembali . " " . $tanggal_kembali_parts[0];
                ?>
            </td>


        </tr>
        <tr>
            <td>8. Pengikut
            </td>
            <td>-
            </td>
        </tr>
        <tr>
            <td>9. Pembebanan Anggaran <br>a. Instansi <br> b. Mata Anggaran
            </td>
            <td>Badan Pengelolaan Keuangan, Pendapatan dan Daerah <br>
                <?php echo $data[0]["mata_anggaran"] ;?>
            </td>
        </tr>
        <tr>
            <td>
                10. Keterangan lain-lain
            </td>
            <td> <?php echo $data[0]["keterangan"] ;?>
            </td>
        </tr>
    </tbody>
</table>
<br>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td width="40%" align="left">
            <p>Dikeluarkan di Banjarmasin</p>
            <p>Pada tanggal : 18 Januari 2023</p>
            <p>PENGGUNA ANGGARAN,</p><br><br><br>
            <p>H. EDY WIBOWO, SE</p>
            <p>Pembina</p>
            <p>NIP. 19660602 199203 1 001</p>
        </td>
    </tr>
</table>
<br><br><br><br>
<br><br><br><br>
<table width="100%">
    <tbody>
        <tr>
            <td width="45%"></td>
            <td width="20%">SPD No.</td>
            <td>:</td>
            <td><?php echo $data[0]["no_sppd"] ;?></td>
        </tr>
        <tr>
            <td width="45%"></td>
            <td width="20%">Berangkat Dari</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="45%"></td>
            <td width="20%">(tempat ke dudukan)</td>
            <td>:</td>
            <td><?php echo $data[0]["tempat_berangkat"] ;?></td>
        </tr>
        <tr>
            <td width="45%"></td>
            <td width="20%">Pada tanggal</td>
            <td>:</td>
            <td>
                <?php
                $tanggal_berangkat = $data[0]["tanggal_berangkat"];
                $tanggal_berangkat_parts = explode("-", $tanggal_berangkat);
                $bulan_berangkat = "";
                switch ($tanggal_berangkat_parts[1]) {
                    case '01':
                        $bulan_berangkat = "Januari";
                        break;
                    case '02':
                        $bulan_berangkat = "Februari";
                        break;
                    case '03':
                        $bulan_berangkat = "Maret";
                        break;
                    case '04':
                        $bulan_berangkat = "April";
                        break;
                    case '05':
                        $bulan_berangkat = "Mei";
                        break;
                    case '06':
                        $bulan_berangkat = "Juni";
                        break;
                    case '07':
                        $bulan_berangkat = "Juli";
                        break;
                    case '08':
                        $bulan_berangkat = "Agustus";
                        break;
                    case '09':
                        $bulan_berangkat = "September";
                        break;
                    case '10':
                        $bulan_berangkat = "Oktober";
                        break;
                    case '11':
                        $bulan_berangkat = "November";
                        break;
                    case '12':
                        $bulan_berangkat = "Desember";
                        break;
                    default:
                        $bulan_berangkat = "";
                        break;
                }

                echo $tanggal_berangkat_parts[2] . " " . $bulan_berangkat . " " . $tanggal_berangkat_parts[0];
                ?>
            </td>

        </tr>
        <tr>
            <td width="45%"></td>
            <td width="20%">Ke</td>
            <td>:</td>
            <td><?php echo $data[0]["tempat_tujuan"] ;?></td>
        </tr>
    </tbody>
</table>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td width="40%" align="left">
            <p>PENGGUNA ANGGARAN,</p><br><br><br>
            <p>H. EDY WIBOWO, SE</p>
            <p>Pembina</p>
            <p>NIP. 19660602 199203 1 001</p>
        </td>
    </tr>
</table>
<table width="100%" id="table-data">
    <tr height="145px" style="vertical-align: top;">
        <td width="50%">I. Tiba di: <?php echo $data[0]["tempat_tujuan"] ;?><br>Pada tanggal:
            <?php
        $tanggal_berangkat = $data[0]["tanggal_berangkat"];
        $tanggal_berangkat_parts = explode("-", $tanggal_berangkat);
        $bulan_berangkat = "";
        switch ($tanggal_berangkat_parts[1]) {
            case '01':
                $bulan_berangkat = "Januari";
                break;
            case '02':
                $bulan_berangkat = "Februari";
                break;
            case '03':
                $bulan_berangkat = "Maret";
                break;
            case '04':
                $bulan_berangkat = "April";
                break;
            case '05':
                $bulan_berangkat = "Mei";
                break;
            case '06':
                $bulan_berangkat = "Juni";
                break;
            case '07':
                $bulan_berangkat = "Juli";
                break;
            case '08':
                $bulan_berangkat = "Agustus";
                break;
            case '09':
                $bulan_berangkat = "September";
                break;
            case '10':
                $bulan_berangkat = "Oktober";
                break;
            case '11':
                $bulan_berangkat = "November";
                break;
            case '12':
                $bulan_berangkat = "Desember";
                break;
            default:
                $bulan_berangkat = "";
                break;
        }

        echo $tanggal_berangkat_parts[2] . " " . $bulan_berangkat . " " . $tanggal_berangkat_parts[0];
        ?>
        </td>
        <td width="50%">Berangkat dari: <?php echo $data[0]["tempat_tujuan"] ;?><br>Ke:
            <?php echo $data[0]["tempat_berangkat"] ;?><br>Pada tanggal:
            <?php
        $tanggal_kembali = $data[0]["tanggal_kembali"];
        $tanggal_kembali_parts = explode("-", $tanggal_kembali);
        $bulan_kembali = "";
        switch ($tanggal_kembali_parts[1]) {
            case '01':
                $bulan_kembali = "Januari";
                break;
            case '02':
                $bulan_kembali = "Februari";
                break;
            case '03':
                $bulan_kembali = "Maret";
                break;
            case '04':
                $bulan_kembali = "April";
                break;
            case '05':
                $bulan_kembali = "Mei";
                break;
            case '06':
                $bulan_kembali = "Juni";
                break;
            case '07':
                $bulan_kembali = "Juli";
                break;
            case '08':
                $bulan_kembali = "Agustus";
                break;
            case '09':
                $bulan_kembali = "September";
                break;
            case '10':
                $bulan_kembali = "Oktober";
                break;
            case '11':
                $bulan_kembali = "November";
                break;
            case '12':
                $bulan_kembali = "Desember";
                break;
            default:
                $bulan_kembali = "";
                break;
        }

        echo $tanggal_kembali_parts[2] . " " . $bulan_kembali . " " . $tanggal_kembali_parts[0];
        ?>
        </td>
    </tr>

    <tr height="145px" style="vertical-align: top;">
        <td width="50%">II. Tiba di: <br>Pada tanggal: </td>
        <td width="50%">Berangkat dari: <br>Ke: <br>Pada tanggal: </td>
    </tr>
    <tr height="145px" style="vertical-align: top;">
        <td width="50%">III. Tiba di: <br>Pada tanggal: </td>
        <td width="50%">Berangkat dari: <br>Ke: <br>Pada tanggal: </td>
    </tr>
    <tr height="145px" style="vertical-align: top;">
        <td width="50%">IV. Tiba Kembali di: Banjarmasin <br>Pada tanggal:
            <?php
            $tanggal_kembali = $data[0]["tanggal_kembali"];
            $tanggal_kembali_parts = explode("-", $tanggal_kembali);
            $bulan_kembali = "";
            switch ($tanggal_kembali_parts[1]) {
                case '01':
                    $bulan_kembali = "Januari";
                    break;
                case '02':
                    $bulan_kembali = "Februari";
                    break;
                case '03':
                    $bulan_kembali = "Maret";
                    break;
                case '04':
                    $bulan_kembali = "April";
                    break;
                case '05':
                    $bulan_kembali = "Mei";
                    break;
                case '06':
                    $bulan_kembali = "Juni";
                    break;
                case '07':
                    $bulan_kembali = "Juli";
                    break;
                case '08':
                    $bulan_kembali = "Agustus";
                    break;
                case '09':
                    $bulan_kembali = "September";
                    break;
                case '10':
                    $bulan_kembali = "Oktober";
                    break;
                case '11':
                    $bulan_kembali = "November";
                    break;
                case '12':
                    $bulan_kembali = "Desember";
                    break;
                default:
                    $bulan_kembali = "";
                    break;
            }

            echo $tanggal_kembali_parts[2] . " " . $bulan_kembali . " " . $tanggal_kembali_parts[0];
            ?>
            <br><br><br>
            <table width="100%" style="border: none;">
                <tr>
                    <td width="40%" align="center">
                        <p>PENGGUNA ANGGARAN,</p><br><br><br>
                        <p>H. EDY WIBOWO, SE</p>
                        <p>Pembina</p>
                        <p>NIP. 19660602 199203 1 001</p>
                    </td>
                </tr>
            </table>
        </td>
        <td width="50%">Telah diperiksa, dengan keterangan bahwa perjalanan tersebut diatas benar dilakukan atas
            perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.
            <table width="100%" style="border: none;">
                <tr>
                    <td width="40%" align="center">
                        <p>PENGGUNA ANGGARAN,</p><br><br><br>
                        <p>H. EDY WIBOWO, SE</p>
                        <p>Pembina</p>
                        <p>NIP. 19660602 199203 1 001</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<hr />
<h2 style="font-size: 20px;font-weight: normal; text-align:left;">V. CATATAN LAIN-LAIN</h2>
<hr />
<h2 style="font-size: 20px;font-weight: normal; text-align:left;">VI. PERHATIAN</h2>
<p>Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan
    tanggal berangkat / tiba serta Bendaharawan bertanggungjawab berdasarkan peraturan-peraturan Keuangan Negara apabila
    Negara mendapat rugi akibat kesalahan, Kealpaannya. </p>
<br><br><br><br><br>
<br><br><br><br>

<?php
}

?>