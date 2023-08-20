<?php
// Memanggil file koneksi.php
require_once 'config/koneksi.php';

// Memeriksa nilai "data" yang dikirim melalui permintaan POST
if ($_POST['get_data'] === 'surat_perintah') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // var_dump($id);

        $firstPart = substr($id, 0, 3);
        $secondPart = substr($id, 3, 3);
        $thirdPart = substr($id, 6, 4);
        $fourthPart = substr($id, 10, 6);
        $fifthPart = substr($id, 16, 4);
        $sixPart = substr($id, 20);

        $finalId = $firstPart . '/' . $secondPart . '/' . $thirdPart . '/' . $fourthPart . '/' . $fifthPart . '/' . $sixPart;

        // var_dump($finalId);
        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_perintah_tugas WHERE no_spt = '$finalId'";
        // var_dump($sql);
        // exit;

        // Mempersiapkan statement SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        // Memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // Membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
            // var_dump($data);exit;
        } else {
            echo "Tidak ada data";
        }
    } else {
        echo "ID pegawai tidak tersedia";
    }
}

if ($_POST['get_data'] === 'perjalanan_dinas') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "SELECT * FROM tb_perjalan_dinas WHERE id = '$id'";
        // var_dump($sql);exit;
        // Mempersiapkan statement SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        // var_dump($result);exit;

        // Memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // Membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
            // var_dump($data);exit;
        } else {
            echo "Tidak ada data";
        }
    } else {
        echo "ID Perjalanan Dinas tidak tersedia";
    }
}

if ($_POST['get_data'] === 'nominatif') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];


        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_nominatif WHERE id = '$id'";
        // var_dump($sql);exit;
        // Mempersiapkan statement SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        // var_dump($result);exit;

        // Memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // Membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
            // var_dump($data);exit;
        } else {
            echo "Tidak ada data";
        }
    } else {
        echo "ID nominatif tidak tersedia";
    }
}

if ($_POST['get_data'] === 'npd') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_pencairan_dana WHERE id = '$id'";
        // var_dump($sql);exit;
        // Mempersiapkan statement SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        // var_dump($result);exit;

        // Memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // Membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
            // var_dump($data);exit;
        } else {
            echo "Tidak ada data";
        }
    } else {
        echo "ID NPD tidak tersedia";
    }
}


if ($_POST['get_data'] === 'hasil_dinas') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_hasil_dinas WHERE id = '$id'";
        // var_dump($sql);exit;
        // Mempersiapkan statement SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        // var_dump($result);exit;

        // Memeriksa apakah kueri berhasil dieksekusi
        if ($result->num_rows > 0) {
            // Membuat array untuk menampung data
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Mengirim data dalam format JSON
            echo json_encode(array("data" => $data));
            // var_dump($data);exit;
        } else {
            echo "Tidak ada data";
        }
    } else {
        echo "ID Hasil Dinas tidak tersedia";
    }
}
