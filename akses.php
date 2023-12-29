<?php
// Memeriksa apakah sesi sudah dimulai
if (session_id() == '') {
	session_start();
}


// Disarankan untuk mengkonfigurasi tingkat error reporting di php.ini atau secara spesifik
// error_reporting(0); 

// Memeriksa apakah pengguna telah login sebagai 'admin'
if (!isset($_SESSION['admin'])) {
	// Menggunakan header redirect untuk pengalihan yang lebih efisien
	$_SESSION['error_message'] = "Anda harus Login!";
	header("Location: index.php");
	exit; // Menghentikan eksekusi script lebih lanjut
}
