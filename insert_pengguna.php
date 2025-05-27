<?php
require_once 'auth/config.php';

// Ambil data dari form
$username = $_POST['username'] ?? '';
$nim = $_POST['nim'] ?? '';
$nama_lengkap = $_POST['nama_lengkap'] ?? '';

// Validasi input kosong
if (empty($username) || empty($nim) || empty($nama_lengkap)) {
    header("Location: pengguna.php?status=error_input");
    exit;
}

$password = $nim . strtolower(str_replace(' ', '', $nama_lengkap));

$sql = "INSERT INTO users (username, nim, password, nama_lengkap) 
        VALUES ('$username', '$nim', '$password', '$nama_lengkap')";
$pdo-> query($sql);
// $stmt -> execute([
//     ':username' => $username,
//     ':nim' => $nim,
//     ':password' => $pw,
//     ':nama_lengkap' => $nama_lengkap
// ]);
// Eksekusi langsung
if ($pdo->exec($sql)) {
    header("Location: pengguna.php?status=berhasil");
} else {
    header("Location: pengguna.php?status=gagal");
}
exit;
