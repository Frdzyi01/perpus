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
    <title>Siswa</title>
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

    <div class="col-md">
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

                    <li>Nama__Lengkap : isi Nama Lengkap
                    <li>Nisn : isi Nisn
                    <li>kelas : isi kelas
                    <li>Jenis_Kelamin : isi Jenis Kelamin
                    <li>Agama : isi Agama
                    <li>Alamat : isi Alamat
                    <li>Nomor_Telepon : isi Nomor Telepon
                </ol>
            </div>
        </div>
        <br>
        <form id="myform" onSubmit="return validasi()" action="siswa_proses.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md offset-md-3">
                        <table class="table">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td></td>
                                <td><input type="text" name="Nama_Lengkap" id="Nama_Lengkap" class="form-control"
                                        placeholder="Masukkan Nama Lengkap" required></td>
                            </tr>
                            <tr>
                                <td>Nisn</td>
                                <td></td>
                                <td><input type="text" name="Nisn" id="Nisn" class="form-control"
                                        placeholder="Masukan Nisn" required></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td> </td>
                                <td>
                                    <select name="kelas" id="kelas" class="form-control" required>
                                        <option value="">Pilih kelas</option>
                                        <option value="VII">VII A</option>
                                        <option value="VII">VII B</option>
                                        <option value="VII">VII C</option>
                                        <option value="VIII">VIII A</option>
                                        <option value="VIII">VIII B</option>
                                        <option value="VIII">VIII C</option>
                                        <option value="IX">IX A</option>
                                        <option value="IX">IX B</option>
                                        <option value="IX">IX C</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> </td>
                                <td>
                                    <select name="Jenis Kelamin" id="Jenis Kelamin" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td> </td>
                                <td>
                                    <select name="Agama" id="Agama" class="form-control" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> </td>
                                <td><input type="text" name="Alamat" id="Alamat" class="form-control"
                                        placeholder="Masukkan Alamat" required></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td> </td>
                                <td><input type="text" name="Nomor Telepon" id="Nomor Telepon" class="form-control"
                                        placeholder="Masukkan Nomor Telepon" required></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td><input type="submit" name="tambah" class="btn btn-primary" value="Simpan"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>


        <script src="biongo.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>

</html>