<?php
include "koneksi.php"; // Memastikan koneksi database terbentuk

// Mengecek apakah ada data yang dikirim melalui POST
if (isset($_POST['id'])) {
    $idBukuArray = $_POST['id'];

    // Mengubah array menjadi string untuk query SQL
    $idBukuString = implode(',', array_map('intval', $idBukuArray));

    // Query untuk menghapus buku berdasarkan ID yang dipilih
    $query = "DELETE FROM buku WHERE id IN ($idBukuString)";

    if ($koneksi->query($query) === TRUE) {
        echo "<script>alert('Data buku yang dipilih telah berhasil dihapus.'); window.location.href='Data_Buku.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data: " . $koneksi->error . "'); window.location.href='Data_Buku.php';</script>";
    }
} else {
    echo "<script>alert('Tidak ada data yang dipilih untuk dihapus.'); window.location.href='Data_Buku.php';</script>";
}

$koneksi->close();
