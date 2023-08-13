<?php
// memanggil file koneksi.php
require_once '../config/koneksi.php';


// var_dump($_GET['data']);exit;

if ($_GET['data'] == 'spt') {
    
// mengambil data dari MySQL
    $sql = "SELECT id,no_spt, dasar, untuk, GROUP_CONCAT(CONCAT(nomor, '. ', nama) SEPARATOR '<br>') AS nama , status
    FROM (
        SELECT id,no_spt, dasar, untuk, nama, ROW_NUMBER() OVER (PARTITION BY no_spt, dasar, untuk ORDER BY nama) AS nomor, status
        FROM tb_perintah_tugas ORDER BY id DESC
    ) t
    GROUP BY no_spt, dasar, untuk;       
    ";
    $result = $conn->query($sql);
    // memeriksa apakah kueri berhasil dieksekusi
    if ($result->num_rows > 0) {
        // membuat array untuk menampung data
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        // mengirim data dalam format JSON
        echo json_encode(array("data" => $data));
    } else {
        echo "Tidak ada data";
    }
}

if ($_GET['data'] == 'sppd') {
    
    // mengambil data dari MySQL
        $sql = "SELECT * FROM tb_perjalan_dinas ORDER BY id DESC";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
        } else {
            echo "Tidak ada data";
        }
    }


if ($_GET['data'] == '1') {
    
    // mengambil data dari MySQL
        $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Kepala Badan' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Kepala Badan'; ";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }

if ($_GET['data'] == '2') {
    
    // mengambil data dari MySQL
    $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Sekretariat' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Sekretariat'; ";
    $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }

if ($_GET['data'] == '3') {
    
    // mengambil data dari MySQL
        $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'PBMD' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'PBMD'; ";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }
if ($_GET['data'] == '4') {
    
    // mengambil data dari MySQL
        $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Pajak' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Pajak'; ";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }
if ($_GET['data'] == '5') {
    
    // mengambil data dari MySQL
        $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Hanwas' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Hanwas'; ";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }
if ($_GET['data'] == '6') {
    
    // mengambil data dari MySQL
    $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Anggaran' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Anggaran'; ";
    $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }
if ($_GET['data'] == '7') {
    
    // mengambil data dari MySQL
    $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Akuntansi' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Akuntansi'; ";
    $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }
if ($_GET['data'] == '8') {
    
    // mengambil data dari MySQL
    $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'Perbendaharaan' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'Perbendaharaan'; ";
    $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array($data));
        } else {
            echo "Tidak ada data";
        }
    }

    if ($_GET['data'] == '9') {
    
        // mengambil data dari MySQL
        $sql = "SELECT id, nama, bidang FROM tb_pegawai WHERE bidang = 'UPT' UNION SELECT id, nama, bidang FROM tb_thl WHERE bidang = 'UPT'; ";
        $result = $conn->query($sql);
            // memeriksa apakah kueri berhasil dieksekusi
            if ($result->num_rows > 0) {
                // membuat array untuk menampung data
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                // mengirim data dalam format JSON
                echo json_encode(array($data));
            } else {
                echo "Tidak ada data";
            }
        }
    
    if ($_GET['data'] == 'nominatif') {
    
        // mengambil data dari MySQL
        $sql = "SELECT id,nama,no_npd ,tujuan ,lama ,uang_harian , 
		case 
			when hotel_pribadi = '' then hotel_travel
			when hotel_travel = '' then hotel_pribadi
		end hotel,
		case 
			when pesawat_pribadi = '' then pesawat_travel
			when pesawat_travel = '' then pesawat_pribadi
		end pesawat, transport_tujuan as transport , status 
        from tb_nominatif tn order by id desc";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
        } else {
            echo "Tidak ada data";
        }
    }


    if ($_GET['data'] == 'npd') {
    
        // mengambil data dari MySQL
        $sql = "select
                    tpd.id,
                    no_npd ,
                    tp.sub_kegiatan ,
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
                    tp2.id = tpd.id_pegawai
                    order by tpd.id desc ";
        $result = $conn->query($sql);
        // memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
        } else {
            echo "Tidak ada data";
        }
    }
    



$conn->close();
?>