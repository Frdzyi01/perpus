<?php
include("koneksi.php");

if (isset($_POST['tambah'])) {
	// Mengambil data dari formulir
	$nama_siswa = $_POST['Nama_Lengkap'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kelas = $_POST['kelas'];
	$kode_peminjaman = $_POST['kode_peminjaman'];
	$tujuan_pinjam = $_POST['tujuan_pinjam'];
	$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
	$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
	$jumlah_buku_dipinjam = $_POST['jumlah_buku_dipinjam'];
	$status = $_POST['status'];

	// Mencari buku berdasarkan ID
	$select = "SELECT * FROM buku WHERE id='" . $_POST["id"] . "'";
	$result = mysqli_query($koneksi, $select);
	$row = mysqli_fetch_assoc($result);

	// Mengambil detail buku
	$judul_buku = $row['judul_buku'];
	$penerbit = $row['penerbit'];
	$pengarang = $row['pengarang'];
	$tahun_terbit = $row['tahun_terbit'];

	// Menambahkan data peminjaman ke database
	$query = mysqli_query($koneksi, "INSERT INTO tabel_pinjam VALUES(null, '$nama_siswa', '$jenis_kelamin', '$kelas', '$kode_peminjaman', '$judul_buku', '$penerbit', '$pengarang', '$tahun_terbit', '$tujuan_pinjam', '$tanggal_peminjaman', '$tanggal_pengembalian', '$jumlah_buku_dipinjam', '$status')");

	// Jika berhasil, arahkan ke halaman data peminjaman
	if ($query) {
		header("Location: data_peminjaman.php");
		exit(); // Mengakhiri script setelah pengalihan
	}
}

if (isset($_POST['edit'])) {
	if (isset(
		$_POST['id'],
		$_POST['nama_siswa'],
		$_POST['jenis_kelamin'],
		$_POST['kelas'],
		$_POST['kode_peminjaman'],
		$_POST['judul_buku'],
		$_POST['penerbit'],
		$_POST['pengarang'],
		$_POST['tahun_terbit'],
		$_POST['tujuan_pinjam'],
		$_POST['tanggal_peminjaman'],
		$_POST['tanggal_pengembalian'],
		$_POST['jumlah_buku_dipinjam'],
		$_POST['status']
	)) {
		// Cek apakah ID tersedia dan tidak kosong
		if (empty($_POST['id'])) {
			echo "ID tidak boleh kosong!";
			exit;
		}

		$id = $_POST['id'];
		$nama_siswa = $_POST['nama_siswa'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$kelas = $_POST['kelas'];
		$kode_peminjaman = $_POST['kode_peminjaman'];
		$tujuan_pinjam = $_POST['tujuan_pinjam'];
		$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
		$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
		$jumlah_buku_dipinjam = $_POST['jumlah_buku_dipinjam'];
		$status = $_POST['status'];

		// Mencari buku berdasarkan ID
		$id = mysqli_real_escape_string($koneksi, $_POST['id']);
		$select_buku = "SELECT * FROM buku WHERE id='$id'";
		$result_buku = mysqli_query($koneksi, $select_buku);

		$row_buku = mysqli_fetch_assoc($result_buku);

		if ($result_buku && $row_buku) {
			// Mengambil detail buku
			$judul_buku = $row_buku['judul_buku'];
			$penerbit = $row_buku['penerbit'];
			$pengarang = $row_buku['pengarang'];
			$tahun_terbit = $row_buku['tahun_terbit'];

			// Proses update data peminjaman
			// Menyiapkan query UPDATE dengan parameter tanda tanya (?)
			$query = mysqli_prepare($koneksi, "UPDATE tabel_pinjam SET
                    nama_siswa = ?,
                    jenis_kelamin = ?,
                    kelas = ?,
                    kode_peminjaman = ?,
                    judul_buku = ?,
                    penerbit = ?,
                    pengarang = ?,
                    tahun_terbit = ?,
                    tujuan_pinjam = ?,
                    tanggal_peminjaman = ?,
                    tanggal_pengembalian = ?,
                    jumlah_buku_dipinjam = ?,
                    status = ?
                    WHERE id = ?");

			// Binding parameter ke dalam statement
			mysqli_stmt_bind_param(
				$query,
				"ssssssssssssss",
				$nama_siswa,
				$jenis_kelamin,
				$kelas,
				$kode_peminjaman,
				$judul_buku,
				$penerbit,
				$pengarang,
				$tahun_terbit,
				$tujuan_pinjam,
				$tanggal_peminjaman,
				$tanggal_pengembalian,
				$jumlah_buku_dipinjam,
				$status,
				$id
			);

			// Mengeksekusi statement
			if (mysqli_stmt_execute($query)) {
				// Menutup statement
				mysqli_stmt_close($query);

				// Redirect jika berhasil
				header("Location: data_peminjaman.php");
				exit;
			} else {
				// Menampilkan pesan kesalahan jika eksekusi gagal
				echo "Update failed: " . mysqli_error($koneksi);
			}
		}
	}
}
