<?php
// memanggil file koneksi.php
require_once 'config/koneksi.php';


// var_dump($_GET['data']);exit;

if ($_GET['data'] == 'pegawai') {
    
// mengambil data dari MySQL
    $sql = "SELECT tb_pegawai.*,tb_golongan.kd_golongan FROM tb_pegawai LEFT JOIN tb_golongan ON tb_golongan.id_gol = tb_pegawai.id_gol";
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

if ($_GET['data'] == 'thl') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_thl";
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

if ($_GET['data'] == 'bidang') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_bidang";
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

if ($_GET['data'] == 'golongan') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_golongan";
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

if ($_GET['data'] == 'transportasi') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_transportasi";
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

if ($_GET['data'] == 'pesawat') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_pesawat";
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

if ($_GET['data'] == 'rek_travel') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_rek_travel";
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





if ($_GET['data'] == 'pagu') {
    // mengambil data dari MySQL
    $sql = "SELECT * FROM tb_pagu";
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

if ($_GET['data'] == 'rek_kegiatan') {
    // mengambil data dari MySQL
    $sql = "SELECT tb_rek_kegiatan.*, tb_pagu.sub_kegiatan FROM tb_rek_kegiatan LEFT JOIN tb_pagu ON tb_pagu.id = tb_rek_kegiatan.id_sub";
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