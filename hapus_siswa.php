<?php
include "koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE id = ?");
	mysqli_stmt_bind_param($query, "i", $id); // Assuming 'id' is an integer, change the type 'i' if it's not.

	if (mysqli_stmt_execute($query)) {
		echo "Data Berhasil dihapus";
		header("Location: data_siswa.php"); // Redirect to data_siswa.php
		exit(); // Terminate the script to ensure the redirect happens
	} else {
		echo "Data gagal dihapus";
	}
	mysqli_stmt_close($query);
} else {
	echo "ID tidak ditemukan.";
}
