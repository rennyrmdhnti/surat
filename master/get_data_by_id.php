<?php
// Memanggil file koneksi.php
require_once 'config/koneksi.php';

// Memeriksa nilai "data" yang dikirim melalui permintaan POST
if ($_POST['get_data'] === 'pegawai') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT tb_pegawai.*, tb_golongan.kd_golongan FROM tb_pegawai LEFT JOIN tb_golongan ON tb_golongan.id_gol = tb_pegawai.id_gol WHERE tb_pegawai.id = $id";

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

if ($_POST['get_data'] === 'thl') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_thl WHERE id = $id";

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
        echo "ID thl tidak tersedia";
    }
}

if ($_POST['get_data'] === 'pagu') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_pagu WHERE id = $id";

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
        echo "ID pagu tidak tersedia";
    }
}

if ($_POST['get_data'] === 'rek_kegiatan') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_rek_kegiatan WHERE id_rek = $id";

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
        echo "ID rek kegiatan tidak tersedia";
    }
}

if ($_POST['get_data'] === 'golongan') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_golongan WHERE id_gol = $id";

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
        echo "ID Golongan tidak tersedia";
    }
}

if ($_POST['get_data'] === 'uang_harian') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_uang_harian WHERE id = $id";

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
        echo "ID Uang Harian tidak tersedia";
    }
}

if ($_POST['get_data'] === 'biaya_transportasi') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_transportasi WHERE id = $id";
        // var_dump($sql);exit;

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
        echo "ID Biaya Transportasi tidak tersedia";
    }
}

if ($_POST['get_data'] === 'biaya_penginapan') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_penginapan WHERE id = $id";
        // var_dump($sql);exit;

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
        echo "ID Biaya Penginapan tidak tersedia";
    }
}

if ($_POST['get_data'] === 'biaya_pesawat') {
    // Memeriksa apakah ID pegawai telah dikirim melalui permintaan POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data pegawai dari MySQL
        $sql = "SELECT * FROM tb_pesawat WHERE id_pesawat = $id";
        // var_dump($sql);exit;

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
        echo "ID Biaya Penginapan tidak tersedia";
    }
}
