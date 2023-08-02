<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$golongan = $_POST['golongan'];
$bidang = $_POST['bidang'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];
$email = $_POST['email'];
$namaBank = $_POST['nama_bank'];
$kodeRekening = $_POST['kode_rekening'];
$id = $_POST['id'];

// Periksa apakah ada file yang diunggah
if(isset($_FILES['foto'])) {
    
    $file = $_FILES['foto'];

     // Tentukan lokasi folder tujuan
     $folder = "../assets/pegawai/";

     // Tentukan nama file yang ingin Anda simpan
     $nama_file = $nip . ".jpg";

     $tujuanSimpan = $folder . $nama_file;

     // Pindahkan file ke folder tujuan dengan menggunakan move_uploaded_file
     move_uploaded_file($file['tmp_name'], $folder . $nama_file);
            // File foto berhasil disimpan, Anda dapat melanjutkan dengan memperbarui data dalam tabel pegawai

            // Query untuk memperbarui data dalam tabel pegawai
            $sql = "UPDATE tb_pegawai SET 
                    nama = '$nama',
                    jabatan = '$jabatan',
                    id_gol = '$golongan',
                    bidang = '$bidang',
                    alamat = '$alamat',
                    status = '$status',
                    nama_bank = '$namaBank',
                    kode_rekening = '$kodeRekening',
                    foto = '$tujuanSimpan',
                    email = '$email'
                    WHERE nip = '$nip'";

            if ($conn->query($sql) === TRUE) {
                echo "Data pegawai berhasil diperbarui.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $sql = "UPDATE tb_pegawai SET 
            nama = '$nama',
            jabatan = '$jabatan',
            id_gol = '$golongan',
            bidang = '$bidang',
            alamat = '$alamat',
            status = '$status',
            nama_bank = '$namaBank',
            kode_rekening = '$kodeRekening',
            email = '$email',
            nip = '$nip'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data pegawai berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        }

$conn->close();
?>