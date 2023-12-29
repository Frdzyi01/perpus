<?php
include "koneksi.php"; // Sertakan koneksi database
include "akses.php"; // Sertakan skrip akses

// Cek apakah ID buku ada dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $old_id = $koneksi->real_escape_string($_GET['id']);

    // Ubah query untuk menggunakan 'id' daripada 'id_buku'
    $query = "SELECT * FROM buku WHERE id = '$old_id'";
    $result = $koneksi->query($query);

    if ($row = $result->fetch_assoc()) {
        $id_buku = $row["id_buku"];
        $judul_buku = $row["judul_buku"];
        $kategori_buku = $row["kategori_buku"];
        $penerbit = $row["penerbit"];
        $pengarang = $row["pengarang"];
        $tahun_terbit = $row["tahun_terbit"];
        $isbn = $row["isbn"];
        $judul_buku_baik = $row["judul_buku_baik"];
        $judul_buku_rusak = $row["judul_buku_rusak"];
        $jumlah_buku_tersedia = $row["jumlah_buku_tersedia"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="gaya/al.css" rel="stylesheet">
    <script src="form.js"></script>
    <title>Edit Buku</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="administrator.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Buku</a></li>
                        <li><a href="Data_Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Data Buku</a></li>
                        <li><a href="Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Siswa</a></li>
                        <li><a href="Data_Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Data Siswa</a></li>
                        <li><a href="Pinjam_Buku.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                                Pinjam Buku</a></li>
                        <li><a href="Data_Peminjaman.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Data Peminjaman Buku</a></li>
                        <li><a href="Pengembalian_Buku.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Pengembalian Buku</a></li>
                        <li><a href="Denda.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Denda</a></li>
                        <li><a href="Ketentuan.php"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ketentuan</a></li>
                        <li><a href="Tentang.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Tentang</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <div class="col-md-8">
        <h3>Edit Buku</h3>
        <form id="myform" onSubmit="return validasi()" action="buku_proses.php" method="post">
            <!-- Dalam form edit di buku_edit.php -->
            <input type="hidden" value="<?= $old_id ?>" name="old_id">

            <table>
                <tr>
                    <td>Nomor buku</td>
                    <td><input type="number" value="<?= $id_buku ?>" name="id_buku" id="id_buku" class="form-control" placeholder="Masukan Nomor buku"></td>

                    </td>
                </tr>
                <tr>
                    <td>Judul buku</td>
                    <td><input type="text" value="<?= $judul_buku ?>" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukan judul buku"></td>
                </tr>
                <tr>
                    <td>Kategori buku</td>
                    <td><input type="text" value="<?= $kategori_buku ?>" name="kategori_buku" id="kategori_buku" class="form-control" placeholder="Masukkan kategori buku"></td>
                </tr>
                <tr>
                    <td>Penerbit buku</td>
                    <td><input type="text" value="<?= $penerbit ?>" name="penerbit" id="penerbit" class="form-control" placeholder="Masukkan Penerbit Buku"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td><input type="text" value="<?= $pengarang ?>" name="pengarang" id="pengarang" class="form-control" placeholder="Masukkan Pengarang Buku"></td>
                </tr>
                <tr>
                    <td>Tahun terbit</td>
                    <td><input type="text" value="<?= $tahun_terbit ?>" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit Buku"></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" value="<?= $isbn ?>" name="isbn" id="isbn" class="form-control" placeholder="Masukkan isbn"></td>
                </tr>
                <tr>
                    <td>Jumlah buku yang baik</td>
                    <td><input type="number" value="<?= $judul_buku_baik ?>" name="judul_buku_baik" id="judul_buku_baik" class="form-control" placeholder="Masukkan jumlah buku baik"></td>
                </tr>
                <tr>
                    <td>Jumlah buku yang rusak</td>
                    <td><input type="number" value="<?= $judul_buku_rusak ?>" name="judul_buku_rusak" id="judul_buku_rusak" class="form-control" placeholder="Masukkan jumlah buku rusak"></td>
                </tr>
                <tr>
                    <td>Tersedia</td>
                    <td><input type="number" value="<?= $jumlah_buku_tersedia ?>" name="jumlah_buku_tersedia" id="jumlah_buku_tersedia" class="form-control" placeholder="Masukkan jumlah buku tersedia">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="<?= isset($edit) ? $edit : 'Update' ?>" name="edit" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>

    <script src="biongo.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>