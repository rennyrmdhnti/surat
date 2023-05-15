<?php

require_once 'config/koneksi.php';

// Cek apakah data login telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai username dan password dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan validasi sederhana
    $query = "SELECT * FROM tb_pegawai WHERE nip='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Jika login berhasil
        session_start(); // Memulai sesi

        // Menyimpan data pengguna dalam sesi
        $_SESSION['username'] = $username;
        
        echo 'success';
    } else {
        // Jika login gagal
        echo 'error';
    }

    // Menutup koneksi
    $conn->close();
}
?>
