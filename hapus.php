<?php

include "koneksi.php";

if (isset($_GET['id_buku'])) {
	$tes = mysql_query("DELETE FROM buku where id_buku='$_GET[id_buku]'");

	if ($tes) {
		echo "Data Berhasil di hapus";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_buku.php">';
	}
}
if (isset($_GET['id_pinjam'])) {
	$tes = mysql_query("DELETE FROM tabel_pinjam where id='$_GET[id_pinjam]'");

	if ($tes) {
		echo "Data Berhasil di hapus";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_peminjaman.php">';
	}
}
if (isset($_GET['id_pengembalian'])) {
	$tes = mysql_query("DELETE FROM tabel_pengembalian where kode_verifikasi='$_GET[id_pengembalian]'");

	if ($tes) {
		echo "Data Berhasil di hapus";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_pengembalian.php">';
	}
}