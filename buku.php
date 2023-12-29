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
    <title>Buku</title>
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

            <!-- Collect the nav links, forms, and other content for toggling -->
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

    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <i>Ilmu Pengetahuan Tidak
                Memiliki Kata Akhir,Mohon Agar Kirannya Ketika Mengisi Agar DI Perhatikan Agar Tidak Terjadi Apa Yang
                Tidak Kita Iginkan Di Kemudian Hari, Terima Kasih.Lihat <a href="ketentuan.php">Disini</a></i>
        </div>

        <div class="tombol-popup">
            <a href="#popup">Sebelum anda mengisi data, Klik disini terlebih dahulu</a>
        </div>
        <div id="popup">
            <div class="jelndela-popup">
                <a href="" class="close">X</a>
                <b>Beberapa pengaturan dalam mengisi data yang benar</b>
                <ol>

                    <li>nomor buku : isi Nomor buku
                    <li>judul buku : isi judul sesuai buku
                    <li>kategori buku : isi kategori buku apa
                    <li>penerbit buku : isi penerbitnnya
                    <li>pengarang : isi pengarangnya
                    <li>tahun terbit : isi tahun terbitnnya
                    <li>isbn : isi isbnnnya
                    <li>Jumlah buku_baik : isi jumlah buku baik
                    <li>Jumlah buku_rusak : isi jumlah buku yang rusak
                </ol>
            </div>
        </div>
        <br>
        <form id="myform" onSubmit="return validasi()" action="buku_proses.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="id_buku" class="col-sm-2 control-label">Nomor buku</label>
                <div class="col-sm-10">
                    <input type="number" name="id_buku" id="id_buku" class="form-control"
                        placeholder="Masukkan nomor buku">
                </div>
            </div>
            <div class="form-group">
                <label for="judul_buku" class="col-sm-2 control-label">Judul buku</label>
                <div class="col-sm-10">
                    <input type="text" name="judul_buku" id="judul_buku" class="form-control"
                        placeholder="Masukan judul buku">
                </div>
            </div>
            <div class="form-group">
                <label for="kategori_buku" class="col-sm-2 control-label">Kategori buku</label>
                <div class="col-sm-10">
                    <input type="text" name="kategori_buku" id="kategori_buku" class="form-control"
                        placeholder="Masukkan kategori buku">
                </div>
            </div>
            <div class="form-group">
                <label for="penerbit" class="col-sm-2 control-label">Penerbit buku</label>
                <div class="col-sm-10">
                    <input type="text" name="penerbit" id="penerbit" class="form-control"
                        placeholder="Masukkan Penerbit Buku">
                </div>
            </div>
            <div class="form-group">
                <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" name="pengarang" id="pengarang" class="form-control"
                        placeholder="Masukkan Pengarang Buku">
                </div>
            </div>
            <div class="form-group">
                <label for="tahun_terbit" class="col-sm-2 control-label">Tahun terbit</label>
                <div class="col-sm-10">
                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control"
                        placeholder="Masukkan tahun terbit Buku">
                </div>
            </div>
            <div class="form-group">
                <label for="isbn" class="col-sm-2 control-label">ISBN</label>
                <div class="col-sm-10">
                    <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Masukkan isbn">
                </div>
            </div>
            <div class="form-group">
                <label for="judul_buku_baik" class="col-sm-2 control-label">Jumlah buku yang baik</label>
                <div class="col-sm-10">
                    <input type="number" name="judul_buku_baik" id="judul_buku_baik" class="form-control"
                        placeholder="Masukkan jumlah buku baik">
                </div>
            </div>
            <div class="form-group">
                <label for="judul_buku_rusak" class="col-sm-2 control-label">Jumlah buku yang buruk</label>
                <div class="col-sm-10">
                    <input type="number" name="judul_buku_rusak" id="judul_buku_rusak" class="form-control"
                        placeholder="Masukkan jumlah buku buruk">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_buku_tersedia" class="col-sm-2 control-label">Tersedia</label>
                <div class="col-sm-10">
                    <input type="number" name="jumlah_buku_tersedia" id="jumlah_buku_tersedia" class="form-control"
                        placeholder="Masukkan jumlah buku tersedia">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </form>


        <script src="biongo.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>

</html>