<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$bidang = $_POST['bidang'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$namaBank = $_POST['nama_bank'];
$kodeRekening = $_POST['kode_rekening'];

// Periksa apakah ada file yang diunggah
if(isset($_FILES['foto'])) {
    $file = $_FILES['foto'];

    // Periksa apakah tidak ada kesalahan saat mengunggah file
    if($file['error'] === UPLOAD_ERR_OK) {
        // Tentukan lokasi folder tujuan
        $folder = "../assets/thl/";

        // Tentukan nama file yang ingin Anda simpan
        $nama_file = $nama . ".jpg";

        $tujuanSimpan = $folder . $nama_file;

        // Pindahkan file ke folder tujuan dengan menggunakan move_uploaded_file
        if(move_uploaded_file($file['tmp_name'], $folder . $nama_file)) {
            // File foto berhasil disimpan, Anda dapat melanjutkan dengan penyimpanan data ke dalam tabel THL
            
            $sql = "INSERT INTO tb_thl (nama, jabatan, bidang, status, alamat, email, nama_bank, kode_rekening, foto) VALUES ('$nama', '$jabatan', '$bidang', '$status', '$alamat', '$email', '$namaBank', '$kodeRekening', '$tujuanSimpan')";

            if ($conn->query($sql) === TRUE) {
                echo "Data THL berhasil disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal menyimpan foto.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah foto.";
    }
} else {
    $sql = "INSERT INTO tb_thl (nama, jabatan, bidang, status, alamat, email, nama_bank, kode_rekening, foto) VALUES ('$nama', '$jabatan', '$bidang', '$status', '$alamat', '$email', '$namaBank', '$kodeRekening', null)";

    if ($conn->query($sql) === TRUE) {
        echo "Data THL berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
