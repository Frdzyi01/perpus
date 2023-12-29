<?php
include "koneksi.php"; // Pastikan ini adalah jalur yang benar ke file koneksi.php Anda

// Query untuk menghapus semua data dari tabel Denda
$query = "DELETE FROM tabel_kembali";

if ($koneksi->query($query) === TRUE) {
    echo "<script>alert('Semua data Denda telah berhasil dihapus.'); window.location.href='Denda.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan saat menghapus data: " . $koneksi->error . "'); window.location.href='Denda.php';</script>";
}

$koneksi->close();
