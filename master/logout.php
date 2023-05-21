<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau tindakan lainnya setelah logout
header("Location: http://localhost/surat/index.php");
exit();
?>
