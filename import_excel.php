<?php
require 'auth/config.php';
require 'vendor/autoload.php'; // PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_FILES['file_excel']['tmp_name'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    // Lewati baris header
    foreach (array_slice($sheet, 1) as $row) {
        $nim = trim($row[0]);
        $nama = trim($row[1]);
        $username = $nim;
        $pw = $nim . strtolower(str_replace(' ', '', $nama));

        $stmt = $pdo->prepare("INSERT INTO users (username, nim, password, nama_lengkap) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $nim, $pw, $nama]);
    }

    header("Location: pengguna.php?status=berhasil");
    exit;
}
