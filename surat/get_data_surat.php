<?php
// memanggil file koneksi.php
require_once '../config/koneksi.php';


// var_dump($_GET['data']);exit;

if ($_GET['data'] == 'spt') {
    
// mengambil data dari MySQL
    $sql = "SELECT * FROM tb_spt";
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
    



$conn->close();
?>