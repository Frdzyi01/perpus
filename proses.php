<?php

if (isset($_POST['kembalikan'])) {

    //untuk memasukan file koneksi ke database
    include("koneksi.php");
    $kode            = $_POST['kode'];
    $nama            = $_POST['nama'];
    $kelas           = $_POST['kelas'];
    $buku            = $_POST['buku'];
    $penerbit        = $_POST['penerbit'];
    $pengarang       = $_POST['pengarang'];
    $tahun_terbit    = $_POST['tahun_terbit'];
    $tanggal         = $_POST['tanggal'];
    $jumlah          = $_POST['jumlah'];
    $status          = $_POST['jumlah'];

    $query = mysql_query("INSERT INTO tabel_pengembalian VALUES('$kode', '$nama', '$kelas', '$buku', '$penerbit', '$pengarang', '$tahun_terbit', '$tanggal', '$jumlah', '$status')") or die(mysql_error());

    if ($query) {

        echo "Proses pengembalian buku berhasil<br>";
        echo "<a href='data_pengembalian.php'>Pergi ke Data Pengembalian</a>";
    } else {

        echo "Maaf, anda gagal untuk melakukan pengembalian";
    }
}
