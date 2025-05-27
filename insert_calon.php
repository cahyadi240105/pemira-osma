<?php
require_once 'auth/config.php'; // Pastikan koneksi $pdo tersedia

$no_calon    = $_POST['no_calon'] ?? '';
$nama_calon  = $_POST['nama_calon'] ?? '';
$visi        = $_POST['visi'] ?? '';
$misi        = $_POST['misi'] ?? '';

$foto_name = basename($_FILES['foto']['name']);
$foto_tmp  = $_FILES['foto']['tmp_name'];
$foto_dir  = 'images/';
$foto_dest = $foto_dir . $foto_name;

// Validasi sederhana
if (empty($no_calon) || empty($nama_calon) || empty($visi) || empty($misi)) {
    header("Location: kandidat.php?status=error_input");
    exit;
}

// Coba upload file dulu
if (!empty($foto_name)) {
    if (move_uploaded_file($foto_tmp, $foto_dest)) {
        // Upload berhasil, coba insert ke DB
        $sql = "INSERT INTO calon (no_calon, nama_calon, foto, visi, misi, jumlah_suara)
                VALUES ('$no_calon','$nama_calon','$foto_name','$visi','$misi', 0)";
        $pdo->query($sql); 
        // $stmt->execute([
        //     ':no_calon'   => $no_calon,
        //     ':nama_calon' => $nama_calon,
        //     ':foto'       => $foto_name,
        //     ':visi'       => $visi,
        //     ':misi'       => $misi
        // ]);

        if ($result) {
            header("Location: kandidat.php?status=berhasil");
            exit;
        } else {
            if (file_exists($foto_dest)) {
                unlink($foto_dest);
            }
            header("Location: kandidat.php?status=gagal");
            exit;
        }
    } else {
        // Gagal upload foto
        header("Location: kandidat.php?status=gagal_upload");
        exit;
    }
} else {
    // Tidak ada foto yang diupload
    header("Location: kandidat.php?status=tidak_ada_foto");
    exit;
}
