<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian Buku</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="cso/jquery.dataTables.css" /> <!-- DataTables CSS -->
    <script type="text/javascript" src="javascript/jquery.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="javascript/jquery.dataTables.js"></script> <!-- DataTables JS -->
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <!-- Navbar Content -->
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
                </div>
            </div>
        </nav>
    </nav>

    <!-- Formulir Pengembalian Buku -->
    <div class="container">
        <h2>Formulir Pengembalian Buku</h2>
        <form action="proses_pengembalian.php" method="post">
            <!-- action diarahkan ke skrip pengolahan data -->
            <div class="form-group">
                <label for="kode_peminjaman">Kode Verifikasi:</label>
                <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman"
                    placeholder="Masukkan Kode">
            </div>

            <div class="form-group">
                <label for="nama_pengembalian">Nama Pengembalian:</label>
                <input type="text" class="form-control" id="nama_pengembalian" name="nama_pengembalian"
                    placeholder="Nama Pengembali">
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select class="form-control" id="kelas" name="kelas">
                    <option value="">Pilih Kelas</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group">
                <label for="judul_buku">Judul Buku:</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                    placeholder="Judul Buku yang Dikembalikan">
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku">
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang:</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang Buku">
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                    placeholder="Tahun Terbit">
            </div>

            <div class="form-group">
                <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
            </div>

            <div class="form-group">
                <label for="jumlah_buku_dikembalikan">Jumlah Buku yang Dikembalikan:</label>
                <input type="number" class="form-control" id="jumlah_buku_dikembalikan" name="jumlah_buku_dikembalikan"
                    placeholder="Jumlah Buku">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </form>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
    <script>
    // DataTable Initialization
    $(document).ready(function() {
        $('#example').dataTable();
    });
    </script>

</body>

</html>