<?php include "akses.php" ?>

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
</head>

<body>
    <nav class="navbar navbar-inverse">
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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Buku</a></li>
                        <li><a href="Data_Buku.php"><span class="glyphicon glyphicon-folder-open"
                                    aria-hidden="true"></span>
                                Data Buku</a></li>
                        <li><a href="Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Siswa</a></li>
                        <li><a href="Data_Siswa.php"><span class="glyphicon glyphicon-folder-open"
                                    aria-hidden="true"></span> Data Siswa</a></li>
                        <li><a href="Pinjam_Buku.php"><span class="glyphicon glyphicon-upload"
                                    aria-hidden="true"></span>
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
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>Data Pengembalian dan Denda!</h1>
                </div>

                <!-- Tombol Hapus Semua Data -->
                <div style="margin-bottom: 10px;" align="left">
                    <button class="btn btn-danger btn-lg" onclick="confirmDeletion()">Hapus Semua Data</button>
                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Peminjaman</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tenggat Pengembalian</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        $i = 1;
                        $select = "SELECT * FROM tabel_kembali";
                        $query = mysqli_query($koneksi, $select);

                        function formatCurrencyIDR($amount)
                        {
                            // Format the number with thousand separators and two decimal places
                            $formattedAmount = number_format($amount, 2, ',', '.');

                            // Add the IDR symbol
                            $formattedAmount = 'Rp. ' . $formattedAmount;

                            return $formattedAmount;
                        }

                        while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <!-- <td align="left"><input type="checkbox" name="hapus_siswa[]" value="<?php echo $result['id']; ?>"> -->
                            </td>
                            <td align="left"><?php echo $i ?></td>
                            <td align="left"><?php echo $result["kode_peminjaman"] ?></td>
                            <td align="left"><?php echo $result["nama_siswa"] ?></td>
                            <td align="left"><?php echo $result["kelas"] ?></td>
                            <td align="left"><?php echo $result["judul_buku"] ?></td>
                            <td align="left"><?php echo $result["tanggal_peminjaman"] ?></td>
                            <td align="left"><?php echo $result["tenggat_pengembalian"] ?></td>
                            <td align="left"><?php echo $result["tanggal_pengembalian"] ?></td>
                            <td align="left"><?php echo formatCurrencyIDR($result["denda"]) ?></td>
                            <td align="left"><?php echo $result["status"] ?></td>
                        </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div align="center">
        <p>Jika ingin di Cetak semua data yang ada di tabel dengan berbentuk kertas, silahkan klik di bawah ini.</p>
        <a href="cetak_pengembalian.php" target="_blank" class="btn btn-primary btn-lg info" role="button">Cetak</a>
    </div>
</body>

<script src="biongo.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Skrip Konfirmasi Penghapusan -->
<script>
function confirmDeletion() {
    var confirmAction = confirm("Apakah Anda yakin ingin menghapus semua data Pengembalian dan Denda?");
    if (confirmAction) {
        window.location.href = 'hapus_semua_data_denda.php';
    }
}
</script>


</html>