<?php
require_once 'auth/config.php';
session_start();

$id_user = $_SESSION['user']['id_user'];
$id_calon = $_GET['id'];

// Cek apakah user sudah memilih sebelumnya
$cek = $pdo->query("SELECT COUNT(*) FROM vote_logs WHERE id_user = '$id_user'")->fetchColumn();

if ($cek > 0) {
    // Sudah memilih
    header("Location: voting.php?status=sudah_memilih");
    exit;
}

// Tambahkan vote ke calon (jumlah_suara +1)
$pdo->query("UPDATE calon SET jumlah_suara = jumlah_suara + 1 WHERE id_calon = '$id_calon'");

// Simpan ke log pemilihan
$pdo->query("INSERT INTO vote_logs (id_user, id_calon) VALUES ('$id_user', '$id_calon')");

// Update status_vote jadi 'sudah' di tabel users
$pdo->query("UPDATE users SET status_vote = 'sudah' WHERE id_user = '$id_user'");

header("Location: voting.php?status=berhasil_memilih");
exit;
?>
