<?php

include "koneksi.php";

// Mendapatkan ID  dari query string dan melakukan sanitasi
$id = $koneksi->real_escape_string($_GET['id']);

// Query untuk menghapus 
$query = "DELETE FROM tabel_pinjam WHERE id='$id'";

// Eksekusi query
$result = $koneksi->query($query);

if ($result) {
    echo "Data Berhasil dihapus";
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_peminjaman.php">';
} else {
    echo "Data gagal dihapus";
}