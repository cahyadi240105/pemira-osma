<?php
$host     = 'localhost';
$dbname   = 'pemira-osma';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
} catch (mysqli_sql_exception) {
    die("Koneksi gagal: " . $e->getMessage());
}
