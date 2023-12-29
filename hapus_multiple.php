<?php
include "koneksi.php";

function hapusData($koneksi, $tabel, $ids, $redirectURL)
{
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $query = mysqli_prepare($koneksi, "DELETE FROM $tabel WHERE id IN ($placeholders)");
    mysqli_stmt_bind_param($query, str_repeat('i', count($ids)), ...$ids);

    if (mysqli_stmt_execute($query)) {
        echo "Data berhasil dihapus";
        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=' . $redirectURL . '">';
    } else {
        echo "Data gagal dihapus";
    }
}

if (isset($_POST['hapus_siswa']) && is_array($_POST['hapus_siswa'])) {
    hapusData($koneksi, 'tabel_siswa', $_POST['hapus_siswa'], 'data_siswa.php');
}

if (isset($_POST['hapus_pinjam']) && is_array($_POST['hapus_pinjam'])) {
    hapusData($koneksi, 'tabel_pinjam', $_POST['hapus_pinjam'], 'data_peminjaman.php');
}

if (isset($_POST['hapus_pengembalian']) && is_array($_POST['hapus_pengembalian'])) {
    hapusData($koneksi, 'tabel_pengembalian', $_POST['hapus_pengembalian'], 'data_pengembalian.php');
}
