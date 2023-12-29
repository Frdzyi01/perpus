<?php

include "koneksi.php";

// Mendapatkan ID buku dari query string dan melakukan sanitasi
$id = $koneksi->real_escape_string($_GET['id']);

// Query untuk menghapus buku
$query = "DELETE FROM buku WHERE id='$id'";

// Eksekusi query
$result = $koneksi->query($query);

if ($result) {
	echo "Data Berhasil dihapus";
	echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_buku.php">';
} else {
	echo "Data gagal dihapus";
}