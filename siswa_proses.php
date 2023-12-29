<?php
include("koneksi.php");

if (isset($_POST['tambah'])) {
  $Nama_Lengkap = $_POST['Nama_Lengkap'];
  $Nisn = $_POST['Nisn'];
  $kelas = $_POST['kelas'];
  $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
  $Agama = $_POST['Agama'];
  $Alamat = $_POST['Alamat'];
  $Nomor_Telepon = $_POST['Nomor_Telepon'];

  $query = mysqli_query($koneksi, "INSERT INTO siswa (Nama_Lengkap, Nisn, kelas, Jenis_Kelamin, Agama, Alamat, Nomor_Telepon) VALUES ('$Nama_Lengkap', '$Nisn', '$kelas', '$Jenis_Kelamin', '$Agama', '$Alamat', '$Nomor_Telepon')") or die(mysqli_error($koneksi));

  if ($query) {
    echo "Data Siswa berhasil ditambahkan<br>";
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_siswa.php">';
  } else {
    echo "Maaf, Anda gagal untuk menambahkan Data Siswa";
  }
}

if (isset($_POST['edit'])) {
  // Assumsikan 'old_id' atau 'old_Nama' dikirim melalui form
  $old_id = mysqli_real_escape_string($koneksi, $_POST['old_id']); // Ganti dengan 'old_Nama' jika itu yang Anda gunakan

  $Nama_Lengkap = mysqli_real_escape_string($koneksi, $_POST['Nama_Lengkap']);
  $Nisn = mysqli_real_escape_string($koneksi, $_POST['Nisn']);
  $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
  $Jenis_Kelamin = mysqli_real_escape_string($koneksi, $_POST['Jenis_Kelamin']);
  $Agama = mysqli_real_escape_string($koneksi, $_POST['Agama']);
  $Alamat = mysqli_real_escape_string($koneksi, $_POST['Alamat']);
  $Nomor_Telepon = mysqli_real_escape_string($koneksi, $_POST['Nomor_Telepon']);

  // Query update dengan prepared statement
  $stmt = mysqli_prepare($koneksi, "UPDATE siswa SET Nama_Lengkap = ?, Nisn = ?, kelas = ?, Jenis_Kelamin = ?, Agama = ?, Alamat = ?, Nomor_Telepon = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "sssssssi", $Nama_Lengkap, $Nisn, $kelas, $Jenis_Kelamin, $Agama, $Alamat, $Nomor_Telepon, $old_id);

  if (mysqli_stmt_execute($stmt)) {
    echo "Data Siswa berhasil diubah<br>";
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_Siswa.php">';
  } else {
    echo "Maaf, Anda gagal untuk mengubah Data Siswa. Error: " . mysqli_error($koneksi);
  }
  mysqli_stmt_close($stmt);
}