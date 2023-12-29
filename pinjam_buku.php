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
    <title>Pinjam Buku</title>

    <link rel="stylesheet" href="assets/jquery/jquery-ui.css" type="text/css" media="screen">
    <script src="assets/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/select2/select2.min.css" />
    <script src="assets/select2/select2.min.js"></script>

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

    <div class="container">
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <i>Ilmu Pengetahuan Tidak
                Memiliki Kata Akhir,Mohon Agar Kirannya Ketika Mengisi Agar DI Perhatikan Agar Tidak Terjadi Apa Yang
                Tidak Kita Iginkan Di Kemudian Hari, Terima Kasih.Lihat <a href="ketentuan.php">Disini</a></i>
        </div>

        <div class="popup-button">
            <a href="#popup">Sebelum anda mengisi data, Klik disini terlebih dahulu</a>
        </div>
        <div class="tombol-popup">
            <a href="#popup">Sebelum anda mengisi data, Klik disini terlebih dahulu</a>
        </div>
        <div id="popup">
            <div class="jelndela-popup">
                <a href="" class="close">X</a>
                <b>Beberapa pengaturan dalam mengisi data yang benar</b>
                <ol>
                    <li>Kode Peminjaman : Mohon untuk mengisi kode ini dengan angka</li>
                    <li>Nama Peminjaman : Isilah sesuai nama anda.Jangan mengisi nama orang lain !</li>
                    <li>kelas : Klik di Pilih kelas dan akan muncul beberapa pilihan, di antara pilihan itu isi sesuai
                        kelas anda</li>
                    <li>Judul buku yang dipinjam : Isi sesuai buku yang akan anda pinjam.</li>
                    <li>penerbit : Tempat meerbitkannya</li>
                    <li>pengarang : Pembuat Buku</li>
                    <li>tahun terbit : Tahun Buku di Keluarkan</li>
                    <li>Tujuan untuk meminjam buku : Isi sesuai tujuan anda.Mungkin kalau Tujuan itu ada dua pilihan
                        yaitu Meminjam buku dan Membaca buku (Ketik salah satu dari dua kata tersebut)</li>
                    <li>Hari/Tanggal : mm (Bulan),dd (Tanggal), yyyy (Tahun).Atau kalian bisa langsung klik yang ada
                        tanda garis bawah, secara otomatis tanggal akan di tunjuk sesuai hari dan tanggal pada hari ini.
                    </li>
                    <li>Hari/Tanggal : mm (Bulan),dd (Tanggal), yyyy (Tahun).Atau kalian bisa langsung klik yang ada
                        tanda garis bawah, secara otomatis tanggal akan di tunjuk sesuai hari dan tanggal pada hari ini.
                    </li>
                    <li>Jumlah buku yang di pinjam : Isi sesuai buku yang akan di ambil, jika 10 isilah 10.</li>
                    <li>Jenis Kelamin : Pada form ini kita akan mengetahui anda itu apa.Maka dari itu isilah sesuai
                        jenis kelamin anda.Jika kamu laki-laki jangan diisi perempuan ya.</li>
                </ol>
            </div>
        </div>
        <br>

        <form id="myform" onSubmit="return validasi()" action="pinjam_proses.php" method="post" class="form-horizontal">
            <h3>Form Peminjaman Buku</h3>

            <div class="form-group">
                <label for="kode_peminjaman" class="col-sm-2 control-label">Kode Peminjaman</label>
                <div class="col-sm-10">
                    <input readonly type="text" name="kode_peminjaman" id="kode_peminjaman" class="form-control"
                        placeholder="Max : 8 Angka">
                    <script>
                    document.getElementById("kode_peminjaman").value = Math.ceil(Math.random() * 99999999);
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="Nama_Lengkap" class="col-sm-2 control-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <select name="Nama_Lengkap" id="Nama_Lengkap" class="form-control">
                        <option value="">Pilih Nama Siswa</option>
                        <?php
                        include "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT Nama_Lengkap, kelas, jenis_kelamin FROM siswa");

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<option value="' . $row['Nama_Lengkap'] . '" data-kelas="' . $row['kelas'] . '" data-jenis_kelamin="' . $row['jenis_kelamin'] . '">' . $row['Nama_Lengkap'] . '</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" name="kelas" id="kelas" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <label for="id_buku" class="col-sm-2 control-label">Buku</label>
                <div class="col-sm-10">
                    <select name="id_buku" id="id_buku" class="form-control">
                        <option value="">Pilih Buku</option>
                        <?php
                        include "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT id_buku, judul_buku FROM buku");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<option value="' . $row['id_buku'] . '">' . $row['judul_buku'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="tujuan_pinjam" class="col-sm-2 control-label">Tujuan untuk mengambil Buku</label>
                <div class="col-sm-10">
                    <select name="tujuan_pinjam" id="tujuan_pinjam" class="form-control">
                        <option value="">Pilih Tujuan</option>
                        <option value="Meminjam Buku">Meminjam Buku</option>
                        <option value="Membaca Buku">Membaca Buku</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tanggal_peminjaman" class="col-sm-2 control-label">Hari/Tanggal Peminjaman</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="tanggal_pengembalian" class="col-sm-2 control-label">Hari/Tanggal Pengembalian</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_buku_dipinjam" class="col-sm-2 control-label">Jumlah Buku Yang Dipinjam</label>
                <div class="col-sm-10">
                    <input type="text" name="jumlah_buku_dipinjam" id="jumlah_buku_dipinjam" class="form-control"
                        placeholder="Masukkan Jumlah buku">
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-control">
                        <option value="Belum dikembalikan">Belum dikembalikan</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="tambah" class="btn btn-primary" value="Pinjam">
                </div>
            </div>

        </form>
    </div>

    <script>
    // JavaScript untuk mengisi otomatis kelas berdasarkan Nama_Lengkap yang dipilih
    document.getElementById('Nama_Lengkap').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var kelas = selectedOption.getAttribute('data-kelas');
        var jenis_kelamin = selectedOption.getAttribute('data-jenis_kelamin');

        document.getElementById('kelas').value = kelas ? kelas : '';
        document.getElementById('jenis_kelamin').value = jenis_kelamin ? jenis_kelamin : '';
    });
    </script>

    <script src="biongo.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html>