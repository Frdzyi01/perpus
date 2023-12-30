<?php
include "koneksi.php"; // Pastikan ini adalah jalur yang benar ke file koneksi.php Anda

// Query untuk menghapus semua data dari tabel buku
$query = "DELETE FROM buku";

if ($koneksi->query($query) === TRUE) {
    echo "<script>alert('Semua data buku telah berhasil dihapus.'); window.location.href='data_buku.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan saat menghapus data: " . $koneksi->error . "'); window.location.href='data_buku.php';</script>";
}

$koneksi->close();
