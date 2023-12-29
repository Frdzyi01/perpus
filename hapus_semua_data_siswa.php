<?php
include "koneksi.php"; // Pastikan ini adalah jalur yang benar ke file koneksi.php Anda

// Query untuk menghapus semua data dari tabel siswa
$query = "DELETE FROM siswa";

if ($koneksi->query($query) === TRUE) {
    echo "<script>alert('Semua data Siswa telah berhasil dihapus.'); window.location.href='Data_Siswa.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan saat menghapus data: " . $koneksi->error . "'); window.location.href='Data_Siswa.php';</script>";
}

$koneksi->close();
