<?php 
require_once 'config/koneksi.php';

$id = $_GET['id'];
$panjang = strlen($id);
// var_dump($panjang);exit;
$firstPart = substr($id, 0, 3);
$secondPart = substr($id, 3, 3);
$thirdPart = substr($id, 6, 4);
$fourthPart = substr($id, 10, 6);

switch ($panjang) {
    case 22:
        $fifthPart = substr($id, 16, 2);
        $sixPart = substr($id, 18);
        break;
    
    case 23: 
        $fifthPart = substr($id, 16, 3);
        $sixPart = substr($id, 19);
        break;

    case 24:
        $fifthPart = substr($id, 16, 4);
        $sixPart = substr($id, 20);
        break;
    
    default:
    
        $fifthPart = substr($id, 16, 1);
        $sixPart = substr($id, 17);
        break;
}


$finalId = $firstPart . '/' . $secondPart . '/' . $thirdPart . '/' . $fourthPart . '/' . $fifthPart . '/' . $sixPart;

// var_dump($id);
// var_dump($finalId);
// exit;

$sql = "SELECT * FROM tb_perintah_tugas WHERE id = $id";
$result = $conn->query($sql);
    $data = array();
    $dataNama = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
        $dataNama[] = $row['nama'];
    }
    // mengirim data dalam format JSON
//     var_dump($dataNama);exit;

// Loop through each name
foreach ($dataNama as $name) {
        // Prepare the query
        $tabelsql = "SELECT nama, nip, jabatan
                     FROM tb_pegawai
                     WHERE nama = '$name'
                     UNION ALL
                     SELECT nama, '' as nip, 'Tenaga Harian Lepas (THL)' as jabatan
                     FROM tb_thl
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
    // var_dump($data[0]['no_spt']);exit;
?>

<style>
@page {
    margin-top: 0;
    margin-bottom: 0;
}
</style>

<div style="margin-top: 100px;">
    <h3 style="margin-top:0pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:14pt;"><span
            style="height:0pt; text-align:left; display:block; position:absolute; z-index:0;"><img
                src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1684666560_1.-surat-tugas-dengan-lampiran/1684666560_1.-surat-tugas-dengan-lampiran-1.jpeg"
                width="74" height="102" alt="cOVER ORG" style="margin: 0 0 0 auto; display: block; "></span><span
            style="font-family:'Bookman Old Style';">PEMERINTAH KOTA BANJARMASIN</span></h3>
    <h2
        style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:20pt;">
        <span style="font-family:'Bookman Old Style';">BADAN PENGELOLAAN KEUANGAN,</span>
    </h2>
    <h2
        style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:20pt;">
        <span style="font-family:'Bookman Old Style';">PENDAPATAN DAN DAERAH</span>
    </h2>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:8pt;">Jalan Pramuka
        Tirta Dharma Komplek PDAM Bandarmasih Banjarmasin No.17 RT.09</p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:8pt;">Telp.(0511)
        4281292 -6742525 Banjarmasin &ndash; Kalimantan selatan</p>
    <p style="margin-top:0pt; margin-left:35.45pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span
            style="height:0pt; text-align:left; display:block; position:absolute; z-index:1;"><img
                src="https://myfiles.space/user_files/160776_2c764bf7c16fcedc/1684666560_1.-surat-tugas-dengan-lampiran/1684666560_1.-surat-tugas-dengan-lampiran-2.png"
                width="640" height="8" alt="" style="margin: 0 0 0 auto; display: block; "></span><span
            style="font-family:Arial;">&nbsp;</span></p>
    <h4
        style="margin-top:10pt; margin-bottom:0pt; text-align:center; page-break-inside:avoid; page-break-after:avoid; font-size:12pt;">
        <em><span style="font-family:Arial;">SURAT&nbsp;</span></em><em><span
                style="font-family:Arial;">&nbsp;</span></em><em><span style="font-family:Arial;">PERINTAH
                TUGAS</span></em>
    </h4>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;"><span style="font-family:Arial;"></span><span
            style="font-family:Arial;"></span><span style="font-family:Arial;">
            <?php
            $urutan_ke_5 = substr($data[0]['no_spt'], 4, 1);
            if ($urutan_ke_5 === '/') {
                $id_with_tabs = str_replace('//', "/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/", $data[0]['no_spt']);
                echo $id_with_tabs;
            } else {
                echo $data[0]['no_spt'];
            }
            ?></span>
    </p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong><span
                style="font-family:Arial;">Dasar</span></strong><strong><span
                style="width:25.31pt; font-family:Arial; display:inline-block;">&nbsp;</span></strong><strong><span
                style="font-family:Arial;">:</span></strong><strong><span
                style="font-family:Arial;">&nbsp;&nbsp;</span></strong></p>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; font-size:5pt;"><span
            style="font-family:Arial;">&nbsp;</span></p>


    <!-- <ol style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify;font-family:Arial;">
        <li>Nota Dinas Badan Keuangan, Pendapatan dan Aset Daerah Kota Banjarmasin tanggal
            10 Februari 2023 Nomor: 900/147/Sekr/BPKPAD/II/2022 Perihal: Mohon Izin Studi
            Komperatif ke Badan Pengelolaan Keuangan dan Aset (BPKAD) Kota Surabaya tentang
            Penatausahaan Penerimaan Daerah.</li>
        <li>Disposisi Walikota Banjarmasin.</li>
    </ol> -->

    <?php
        $text = $data[0]['dasar'];
        // var_dump($text);exit;

        $items = preg_split('/\d+\.\s/', $text, -1, PREG_SPLIT_NO_EMPTY);

        // Buat tag <ol> dengan gaya yang diberikan
        echo '<ol style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify;font-family:Arial;">';

        // Iterasi melalui setiap item dan buat tag <li> untuk masing-masing
        foreach ($items as $item) {
        echo '<li>' . trim($item) . '</li>';
        }

        // Tutup tag <ol>
        echo '</ol>';
        ?>



    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify;"><span
            style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify; font-size:5pt;"><span
            style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-align:center; line-height:150%;"><strong><span
                style="font-family:Arial;">MEMERINTAHKAN :</span></strong></p>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; text-align:center; line-height:150%;"><strong><span
                style="font-family:Arial;">&nbsp;</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><strong><span
                style="font-family:Arial;">Kepada</span></strong><strong><span
                style="width:28.65pt; font-family:Arial; display:inline-block;">&nbsp;</span></strong><strong><span
                style="font-family:Arial;">:&nbsp;</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify;"><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><strong><span
                style="font-family:Arial;">Daftar Nama Terlampir</span></strong></p>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify; font-size:5pt;"><span
            style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><strong><span
                style="font-family:Arial;">Untuk</span></strong><strong><span
                style="font-family:Arial;">&nbsp;&nbsp;</span></strong><strong><span
                style="font-family:Arial;">:</span></strong></p>
    <?php
        $untuk = $data[0]['untuk'];
        // var_dump($untuk);exit;

        $items = preg_split('/\d+\.\s/', $untuk, -1, PREG_SPLIT_NO_EMPTY);

        // Buat tag <ol> dengan gaya yang diberikan
        echo '<ol style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; text-align:justify;font-family:Arial;">';

        // Iterasi melalui setiap item dan buat tag <li> untuk masing-masing
        foreach ($items as $item) {
        echo '<li>' . trim($item) . '</li>';
        }

        // Tutup tag <ol>
        echo '</ol>';
        ?>
    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt;"><span style="font-family:Arial;"> di
            Banjarmasin</span></p>
    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt;"><span style="font-family:Arial;">
            Tanggal,</span><span style="font-family:Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
            style="font-family:Arial;">Februari 2023</span></p>
    <p style="margin-top:0pt; margin-left:216pt; margin-bottom:0pt; text-align:center;"><span
            style="font-family:Arial;">KEPALA BADAN,</span></p>
    <p style="margin-top:0pt; margin-left:171pt; margin-bottom:0pt; text-align:center;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span style="font-family:Arial;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-left:216pt; margin-bottom:0pt; text-indent:36pt;"><span
            style="font-family:Arial;">H. EDY WIBOWO, SE</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="font-family:Arial;">NIP. 19690112 1993 03 1 004</span></p>
</div>
<p><br style="page-break-before:always; clear:both; mso-break-type:section-break;"></p>
<div style="margin-top: 60px;">
    <h2 style="margin-top:0pt; margin-bottom:0pt; text-align:center; page-break-after:avoid; font-size:12pt;"><span
            style="font-family:Arial; font-size:11pt;">Daftar Nama yang Melaksanakan Studi&nbsp;</span>Komperatif ke
        Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD) Surabaya tentang Penatausahaan Penerimaan Pajak Daerah
        pada Tanggal 22 s.d 24 Februari 2023 di Surabaya</h2>

    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;"><span style="font-family:Arial;"> :</span><span
            style="font-family:Arial;"></span><span style="font-family:Arial;">
            <?php
            $urutan_ke_5 = substr($data[0]['no_spt'], 4, 1);
            if ($urutan_ke_5 === '/') {
                $id_with_tabs = str_replace('//', "/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/", $data[0]['no_spt']);
                echo $id_with_tabs;
            } else {
                echo $data[0]['no_spt'];
            }
            ?>
        </span>
    </p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center;"><span style="font-family:Arial;">&nbsp;</span></p>
    <!-- <table cellspacing="0" cellpadding="0" style="border:0.75pt solid #000000; border-collapse:collapse;">
        <tbody>
            <tr style="height:28.8pt;">
                <td
                    style="width:15.85pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">No</span></p>
                </td>
                <td
                    style="width:209.8pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">NAMA/NIP</span></p>
                </td>
                <td
                    style="width:192.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">JABATAN</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:38.7pt;">
                <td
                    style="width:15.85pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span
                            style="font-family:Arial;">1</span></p>
                </td>
                <td
                    style="width:209.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:Arial;">Vera
                            Wahyuliana, SE</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:Arial;">NIP.
                            19800206 201001 2 012</span></p>
                </td>
                <td
                    style="width:192.75pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span
                            style="font-family:Arial;">Kasubbag Umum Kepegawaian</span></p>
                </td>
            </tr>
        </tbody>
    </table> -->

    <table style="border-collapse: collapse; margin: 0 auto; width: 80%; font-family: Arial; font-size: 11pt;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">No</th>
                <th style="border: 1px solid black; padding: 8px;">Nama/NIP</th>
                <th style="border: 1px solid black; padding: 8px;">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataArray as $key => $row) : ?>
            <tr>
                <td style="border: 1px solid black; padding: 8px;"><?php echo $key + 1; ?></td>
                <td style="border: 1px solid black; padding: 8px;"><?php echo $row['nama'] . '<br>' . $row['nip']; ?>
                </td>
                <td style="border: 1px solid black; padding: 8px;"><?php echo $row['jabatan']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:Arial;">&nbsp;&nbsp;</span></p>
    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt;"><span style="font-family:Arial;">Ditetapkan di
            Banjarmasin</span></p>
    <p style="margin-top:0pt; margin-left:255.15pt; margin-bottom:0pt;"><span style="font-family:Arial;">Pada
            Tanggal,</span><span style="font-family:Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
            style="font-family:Arial;">Februari 2023</span></p>
    <p style="margin-top:0pt; margin-left:216pt; margin-bottom:0pt; text-align:center;"><span
            style="font-family:Arial;">KEPALA BADAN,</span></p>
    <p style="margin-top:0pt; margin-left:171pt; margin-bottom:0pt; text-align:center;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:216pt; margin-bottom:0pt; text-indent:36pt;"><span
            style="font-family:Arial;">H. EDY WIBOWO, SE</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="width:36pt; font-family:Arial; display:inline-block;">&nbsp;</span><span
            style="font-family:Arial;">NIP. 19690112 1993 03 1 004</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
</div>