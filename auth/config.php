<?php
$host     = 'localhost';
$dbname   = 'pemira-osma';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // aktifkan error exception
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>