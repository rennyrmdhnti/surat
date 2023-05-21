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
} else {
    echo "Data yang diminta tidak valid";
}
?>
