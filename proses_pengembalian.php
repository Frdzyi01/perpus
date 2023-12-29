<?php

if (isset($_POST['tambah'])) {
    include("koneksi.php");

    $kodePeminjaman = $_POST['kode_verifikasi'];
    $namaSiswa = $_POST['nama_siswa'];
    $jenisKelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $judulBuku = $_POST['judul_buku'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahunTerbit = $_POST['tahun_terbit'];
    $tujuanPinjam = $_POST['tujuan_pinjam'];
    $tanggalPeminjaman = new DateTime($_POST['tanggal_peminjaman']);
    $tanggalPeminjaman = $tanggalPeminjaman->format('Y-m-d');
    $tenggatPengembalian = new DateTime($_POST['tenggat_pengembalian']);
    $tenggatPengembalian = $tenggatPengembalian->format('Y-m-d');
    $tanggalPengembalian = new DateTime($_POST['tanggal_pengembalian']);
    $tanggalPengembalian = $tanggalPengembalian->format('Y-m-d');
    $jumlahBukuDipinjam = $_POST['jumlah_buku_dipinjam'];
    $jumlahBukuDikembalikan = $_POST['jumlah_buku_dikembalikan'];

    $query = "SELECT * FROM tabel_pinjam WHERE kode_peminjaman = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $kodePeminjaman);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if ($jumlahBukuDipinjam < $jumlahBukuDikembalikan) {
            echo 'Jumlah buku yang dikembalikan melebihi jumlah buku yang dipinjam';
        } else if ($jumlahBukuDipinjam == $jumlahBukuDikembalikan) {
            $status = 'Dikembalikan';
        } else {
            $status = 'Belum semua dikembalikan';
        }

        $updateQuery = "UPDATE tabel_pinjam SET status = ?, tanggal_pengembalian = ? WHERE kode_peminjaman = ?";
        $updateStmt = $koneksi->prepare($updateQuery);
        $updateStmt->bind_param("sss", $status, $tanggalPengembalian, $kodePeminjaman);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            echo "Pengembalian buku berhasil.</br>";
        } else {
            echo "Gagal memperbarui data pengembalian.";
        }
    } else {
        echo "Kode peminjaman tidak ditemukan.";
    }

    $stmt->close();
    $updateStmt->close();

    if ($jumlahBukuDipinjam < $jumlahBukuDikembalikan) {
        echo 'Jumlah buku yang dikembalikan melebihi jumlah buku yang dipinjam';
    } else if ($jumlahBukuDipinjam == $jumlahBukuDikembalikan) {
        $status = 'Dikembalikan';
    } else {
        $status = 'Belum semua dikembalikan';
    }

    $tanggalAwal = new DateTime($tenggatPengembalian);
    $tanggalAkhir = new DateTime($tanggalPengembalian);
    $jumlahBukuSekarang = $jumlahBukuDipinjam - $jumlahBukuDikembalikan;
    $denda = 500 * ($tanggalAwal->diff($tanggalAkhir)->days);

    $insertQuery = "INSERT INTO tabel_kembali (kode_peminjaman, nama_siswa, jenis_kelamin, kelas, judul_buku, penerbit, pengarang, tahun_terbit, tujuan_pinjam, tanggal_peminjaman, tenggat_pengembalian, jumlah_buku_dipinjam, tanggal_pengembalian, jumlah_buku_dikembalikan, denda, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $koneksi->prepare($insertQuery);
    $insertStmt->bind_param("ssssssssssssssss", $kodePeminjaman, $namaSiswa, $jenisKelamin, $kelas, $judulBuku, $penerbit, $pengarang, $tahunTerbit, $tujuanPinjam, $tanggalPeminjaman, $tenggatPengembalian, $jumlahBukuSekarang, $tanggalPengembalian, $jumlahBukuDikembalikan, $denda, $status);
    $insertStmt->execute();

    if ($insertStmt->affected_rows > 0) {
        echo "Data Pengembalian berhasil ditambahkan<br>";
        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=denda.php">';
    } else {
        echo "Maaf, Anda gagal untuk mengembalikan data buku";
    }

    $insertStmt->close();
    $koneksi->close();
}
