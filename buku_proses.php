<?php
include("koneksi.php"); // Pastikan ini adalah jalur yang benar ke file koneksi.php

if ($koneksi->connect_error) {
  die("Gagal terhubung ke database: " . $koneksi->connect_error);
}

if (isset($_POST['tambah'])) {
  // Ambil data dari form
  $id_buku = $koneksi->real_escape_string($_POST['id_buku']);
  $judul_buku = $koneksi->real_escape_string($_POST['judul_buku']);
  $kategori_buku = $koneksi->real_escape_string($_POST['kategori_buku']);
  $penerbit = $koneksi->real_escape_string($_POST['penerbit']);
  $pengarang = $koneksi->real_escape_string($_POST['pengarang']);
  $tahun_terbit = $koneksi->real_escape_string($_POST['tahun_terbit']);
  $isbn = $koneksi->real_escape_string($_POST['isbn']);
  $judul_buku_baik = $koneksi->real_escape_string($_POST['judul_buku_baik']);
  $judul_buku_rusak = $koneksi->real_escape_string($_POST['judul_buku_rusak']);
  $jumlah_buku_tersedia = $koneksi->real_escape_string($_POST['jumlah_buku_tersedia']);

  // Pastikan untuk menyesuaikan nama kolom dan urutan nilai dengan struktur tabel Anda
  $query = "INSERT INTO buku ( id_buku, judul_buku, kategori_buku, penerbit, pengarang, tahun_terbit, isbn, judul_buku_baik, judul_buku_rusak, jumlah_buku_tersedia) VALUES('$id_buku', '$judul_buku', '$kategori_buku', '$penerbit', '$pengarang', '$tahun_terbit', '$isbn', '$judul_buku_baik', '$judul_buku_rusak', '$jumlah_buku_tersedia')";

  if ($koneksi->query($query)) {
    echo "Buku berhasil ditambahkan<br>";
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_buku.php">';
  } else {
    echo "Gagal menambahkan data buku: " . $koneksi->error;
  }
}

if (isset($_POST['edit'])) {
  // Ambil data dari form
  $old_id = isset($_POST['old_id']) && $_POST['old_id'] !== null ? $koneksi->real_escape_string($_POST['old_id']) : '';
  $id_buku = $koneksi->real_escape_string($_POST['id_buku']);
  $judul_buku = $koneksi->real_escape_string($_POST['judul_buku']);
  $kategori_buku = $koneksi->real_escape_string($_POST['kategori_buku']);
  $penerbit = $koneksi->real_escape_string($_POST['penerbit']);
  $pengarang = $koneksi->real_escape_string($_POST['pengarang']);
  $tahun_terbit = $koneksi->real_escape_string($_POST['tahun_terbit']);
  $isbn = $koneksi->real_escape_string($_POST['isbn']);
  $judul_buku_baik = $koneksi->real_escape_string($_POST['judul_buku_baik']);
  $judul_buku_rusak = $koneksi->real_escape_string($_POST['judul_buku_rusak']);
  $jumlah_buku_tersedia = $koneksi->real_escape_string($_POST['jumlah_buku_tersedia']);

  // Pastikan untuk menyesuaikan nama kolom dengan struktur tabel Anda
  // Dalam buku_proses.php
  $updateQuery = "UPDATE buku SET 
    id_buku = '$id_buku', 
    judul_buku = '$judul_buku', 
    kategori_buku = '$kategori_buku', 
    penerbit = '$penerbit', 
    pengarang = '$pengarang', 
    tahun_terbit = '$tahun_terbit', 
    isbn = '$isbn', 
    judul_buku_baik = '$judul_buku_baik', 
    judul_buku_rusak = '$judul_buku_rusak', 
    jumlah_buku_tersedia = '$jumlah_buku_tersedia' 
    WHERE id = '$old_id'";

  // Execute query
  if ($koneksi->query($updateQuery)) {
    echo "Data buku berhasil diubah<br>";
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_buku.php">';
  } else {
    echo "Gagal mengubah data buku: " . $koneksi->error;
  }
}
