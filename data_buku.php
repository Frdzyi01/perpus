<?php
include "koneksi.php"; // Pastikan ini adalah jalur yang benar ke file koneksi.php

// Query untuk mengambil data buku
$query = "SELECT * FROM buku";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" media="screen" href="cso/jquery.dataTables.css" />
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <script type="text/javascript" src="javascript/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Data Buku</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="administrator.php"><span class="glyphicon glyphicon-home"
                        aria-hidden="true"></span> Home</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            Buku</a></li>
                    <li><a href="Data_Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            Data Buku</a></li>
                    <li><a href="Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            Siswa</a></li>
                    <li><a href="Data_Siswa.php"><span class="glyphicon glyphicon-folder-open"
                                aria-hidden="true"></span> Data Siswa</a></li>
                    <li><a href="Pinjam_Buku.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                            Pinjam Buku</a></li>
                    <li><a href="Data_Peminjaman.php"><span class="glyphicon glyphicon-folder-open"
                                aria-hidden="true"></span> Data Peminjaman Buku</a></li>
                    <li><a href="Pengembalian_Buku.php"><span class="glyphicon glyphicon-upload"
                                aria-hidden="true"></span> Pengembalian Buku</a></li>
                    <li><a href="Denda.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            Denda</a></li>
                    <li><a href="Ketentuan.php"><span class="glyphicon glyphicon-exclamation-sign"
                                aria-hidden="true"></span> Ketentuan</a></li>
                    <li><a href="Tentang.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Tentang</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-12">
                <div align="center">
                    <h1>Data Buku!</h1>
                </div>

                <!-- Tombol Hapus Semua Data -->
                <div style="margin-bottom: 10px;" align="left">
                    <button class="btn btn-danger btn-lg" onclick="confirmDeletion()">Hapus Semua Data</button>
                </div>

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Buku</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>ISBN</th>
                            <th>Rusak</th>
                            <th>Baik</th>
                            <th>Tersedia</th>
                            <th>Perintah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['id_buku'] . "</td>";
                                echo "<td>" . $row['judul_buku'] . "</td>";
                                echo "<td>" . $row['kategori_buku'] . "</td>";
                                echo "<td>" . $row['penerbit'] . "</td>";
                                echo "<td>" . $row['pengarang'] . "</td>";
                                echo "<td>" . $row['tahun_terbit'] . "</td>";
                                echo "<td>" . $row['isbn'] . "</td>";
                                echo "<td>" . $row['judul_buku_rusak'] . "</td>";
                                echo "<td>" . $row['judul_buku_baik'] . "</td>";
                                echo "<td>" . $row['jumlah_buku_tersedia'] . "</td>";
                                echo "<td>";
                                echo "<a href='buku_edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                                echo "<a href='hapus_buku.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='11'>Tidak ada data buku</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#example').dataTable();
    });
    </script>

    <div align="center">
        <p>Jika ingin di Cetak semua data yang ada di tabel dengan berbentuk kertas, silahkan klik di bawah ini.</p>
        <a href="cetak_data_buku.php" target="_blank" class="btn btn-primary btn-lg info" role="button">Cetak</a>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Skrip Konfirmasi Penghapusan -->
    <script>
    function confirmDeletion() {
        var confirmAction = confirm("Apakah Anda yakin ingin menghapus semua data buku?");
        if (confirmAction) {
            window.location.href = 'hapus_semua_data_buku.php';
        }
    }
    </script>


</body>

</html>