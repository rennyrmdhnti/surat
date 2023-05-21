<?php
require_once '../config/koneksi.php';

try {
    // Query untuk mengambil data dari tabel "tb_pegawai"
    $sql = "SELECT ROW_NUMBER() OVER (ORDER BY nama) AS nomor, nama, bidang
    FROM (
        SELECT nama, bidang FROM tb_pegawai 
        UNION ALL 
        SELECT nama, 'THL' AS bidang FROM tb_thl
    ) AS hasil
    ";
    $result = $conn->query($sql); 
    // memeriksa apakah kueri berhasil dieksekusi
    if ($result->num_rows > 0) {
        // membuat array untuk menampung data
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'value' => $row['nomor'],
                'nama' => $row['nama'],
                'bidang' => $row['bidang']
            );
        }
        // mengirim data dalam format JSON
        echo json_encode($data);
    } else {
        echo "Tidak ada data";
    }
} catch (PDOException $e) {
    // Tindakan jika terjadi kesalahan dalam koneksi atau query
    echo "Error: " . $e->getMessage();
}