<?php
require_once 'auth/config.php';

$id = $_POST['id_user'];
$username = addslashes($_POST['username']);
$nim = addslashes($_POST['nim']);
$nama_lengkap = addslashes($_POST['nama_lengkap']);

// Membuat SQL update secara langsung
$sql = "UPDATE users SET 
        username = '$username', 
        nim = '$nim', 
        nama_lengkap = '$nama_lengkap' 
        WHERE id_user = '$id'";

// Eksekusi query
$pdo->exec($sql);

header("Location: pengguna.php?status=update");
exit;
