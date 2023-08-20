<?php
// Membuat koneksi ke database
require_once 'config/koneksi.php';

// Mengambil nilai input dari request

$perihal = $_POST['perihal'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$dasar = $_POST['dasar'];
$waktu_dan_tempat = $_POST['waktu_dan_tempat'];
$hasil_kegiatan = $_POST['hasil_kegiatan'];
$kesimpulan = $_POST['kesimpulan'];

// Periksa apakah ada file yang diunggah
if(isset($_FILES['foto'])) {
    
    $file = $_FILES['foto'];

     // Tentukan lokasi folder tujuan
     $folder = "../assets/perjalanan_dinas/";

     // Tentukan nama file yang ingin Anda simpan
     $nama_file = $nama_kegiatan . ".jpg";

     $tujuanSimpan = $folder . $nama_file;

     // Pindahkan file ke folder tujuan dengan menggunakan move_uploaded_file
     move_uploaded_file($file['tmp_name'], $folder . $nama_file);
         // File foto berhasil disimpan, Anda dapat melanjutkan dengan penyimpanan data ke dalam tabel pegawai

         // Query untuk menyimpan data ke dalam tabel pegawai
         $sql = "INSERT INTO tb_hasil_dinas (perihal,nama_kegiatan,dasar,waktu_dan_tempat,hasil_kegiatan,kesimpulan,tanggal_buat,foto) 
         VALUES ('$perihal', '$nama_kegiatan', '$dasar', '$waktu_dan_tempat', '$hasil_kegiatan', '$kesimpulan', CURDATE(),'$tujuanSimpan')";

         if ($conn->query($sql) === TRUE) {
             echo "Data Hasil Dinas berhasil disimpan.";
         } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
         }
} else {
   // Query untuk menyimpan data ke dalam tabel pegawai
   $sql = "INSERT INTO tb_hasil_dinas (nama_kegiatan,dasar,waktu_dan_tempat,hasil_kegiatan,kesimpulan,tanggal_buat,foto) 
   VALUES ('$nama_kegiatan', '$dasar', '$waktu_dan_tempat', '$hasil_kegiatan', '$kesimpulan', CURDATE(),'')";

     if ($conn->query($sql) === TRUE) {
     echo "Data Hasil Dinas berhasil disimpan.";
     } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     }
}

$conn->close();
?>