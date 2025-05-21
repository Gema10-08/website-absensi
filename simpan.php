<?php
require 'db_config.php';

$nama = $_POST['nama'];
$waktu = $_POST['waktu'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$foto = $_POST['foto']; // base64

// Decode gambar dan simpan ke folder /foto
$folder = "foto/";
if (!is_dir($folder)) mkdir($folder);

$namaFile = $folder . time() . "_" . uniqid() . ".png";
$foto = str_replace('data:image/png;base64,', '', $foto);
$foto = str_replace(' ', '+', $foto);
file_put_contents($namaFile, base64_decode($foto));

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO karyawan_absen (nama, waktu, latitude, longitude, foto_path) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdds", $nama, $waktu, $latitude, $longitude, $namaFile);
$stmt->execute();

echo "Berhasil disimpan";
?>
