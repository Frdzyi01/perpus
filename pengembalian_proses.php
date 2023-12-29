<?php

if (isset($_POST['tambah'])) {
	// Untuk memasukan file koneksi ke database
	include("koneksi.php");

	// Ambil data dari form
	$kode_peminjaman = $_POST['kode_peminjaman']; // Asumsi kode peminjaman menjadi 'id'
	$nama_siswa = $_POST['nama_siswa'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kelas = $_POST['kelas'];
	$tujuan_pinjam = $_POST['tujuan_pinjam'];
	$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
	$jumlah_buku_dipinjam = $_POST['jumlah_buku_dipinjam'];
	$status = $_POST['status'];
	$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

	// Ambil data buku dari database
	$select = "SELECT * FROM buku WHERE id_buku=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $_POST["id_buku"]);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$judul_buku = $row['judul_buku'];
	$penerbit = $row['penerbit'];
	$pengarang = $row['pengarang'];
	$tahun_terbit = $row['tahun_terbit'];

	// Insert data pengembalian ke database
	$query = "INSERT INTO tabel_kembali VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$insert_stmt = $conn->prepare($query);
	$insert_stmt->bind_param("ssssssssssss", $kode_peminjaman, $nama_siswa, $jenis_kelamin, $kelas, $judul_buku, $penerbit, $pengarang, $tahun_terbit, $tujuan_pinjam, $tanggal_peminjaman, $tanggal_pengembalian, $jumlah_buku_dipinjam, $status);
	$result = $insert_stmt->execute();

	if ($result) {
		echo "Pengembalian buku berhasil<br>";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_pengembalian.php">';
	} else {
		echo "Maaf anda Gagal untuk menambahkan Data";
	}

	$stmt->close();
	$insert_stmt->close();
}

$conn->close();


if (isset($_POST['edit'])) {

	include("koneksi.php");

	$nama_siswa = $_POST['nama_siswa'];
	$kelas = $_POST['kelas'];
	$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
	$jumlah = $_POST['jumlah'];
	$status = $_POST['status'];

	$select_buku = "SELECT * FROM buku WHERE id_buku='" . $_POST['id_buku'] . "'";
	$result_buku = mysqli_query($koneksi, $select_buku);
	$row_buku = mysqli_fetch_assoc($result_buku);

	$judul_buku = $row_buku['judul_buku'];
	$penerbit = $row_buku['penerbit'];
	$pengarang = $row_buku['pengarang'];
	$tahun_terbit = $row_buku['tahun_terbit'];

	$update_peminjaman = "UPDATE tabel_pengembalian SET
nama_siswa = '$nama_siswa',
kelas = '$kelas',
tanggal_pengembalian = '$tanggal_pengembalian',
jumlah = '$jumlah',
status = '$status',
judul_buku = '$judul_buku',
penerbit = '$penerbit',
pengarang = '$pengarang',
tahun_terbit = '$tahun_terbit'
WHERE kode_verifikasi = '" . $_POST['kode_verifikasi'] . "'";
	$query = mysqli_query($koneksi, $update_peminjaman) or die(mysqli_error($koneksi));

	if ($query) {
		echo "Proses pengeditan data pengembalian berhasil<br>";
		echo '
<META HTTP-EQUIV="Refresh" Content="2; URL=data_pengembalian.php">';
	} else {
		echo "Maaf, Anda gagal untuk melakukan pengeditan";
	}
}
