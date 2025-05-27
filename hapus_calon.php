<?php
require_once 'auth/config.php';

if (isset($_GET['id'])) {
    $id_calon = $_GET['id'];

    // Hapus data calon berdasarkan ID
    $sql = "DELETE FROM calon WHERE id_calon = '$id_calon'";

    if ($pdo->exec($sql)) {
        header("Location: kandidat.php?status=hapus");
    } else {
        header("Location: kandidat.php?status=gagal");
    }
    exit;
} else {
    // Jika tidak ada parameter ID
    header("Location: calon.php");
    exit;
}
?>