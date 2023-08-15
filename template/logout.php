<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Menghapus cookie sesi (jika digunakan)
setcookie('session_name', '', time() - 3600);

// Matikan cache dan hilangkan tanda pagar dari URL
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Location: http://localhost/surat/index.php");
exit();
?>
