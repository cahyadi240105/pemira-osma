<?php
require_once 'auth/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perbaikan utama: gunakan prepared statement
    $stmt = $pdo->prepare("DELETE FROM users WHERE id_user = ?");

    if ($stmt->execute([$id]) && $stmt->rowCount() > 0) {
        header("Location: pengguna.php?status=hapus");
    } else {
        header("Location: pengguna.php?status=gagal");
    }
    exit;
}

// Jika tidak ada POST, redirect ke halaman utama
header("Location: pengguna.php");
exit;
?>