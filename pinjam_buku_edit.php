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

        <?php
        include "koneksi.php"; // Pastikan ini adalah file koneksi yang menggunakan mysqli atau PDO

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $koneksi->prepare("SELECT * FROM tabel_pinjam WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            if (!$data) {
                echo "Data tidak ditemukan!";
                exit;
            }

            // Deklarasi variabel dari data
            $nama_siswa = htmlspecialchars($data["nama_siswa"]);
            $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
            $kelas = htmlspecialchars($data["kelas"]);
            $kode_peminjaman = htmlspecialchars($data["kode_peminjaman"]);
            $judul_buku = htmlspecialchars($data["judul_buku"]);
            $penerbit = htmlspecialchars($data["penerbit"]);
            $pengarang = htmlspecialchars($data["pengarang"]);
            $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
            $tujuan_pinjam = htmlspecialchars($data["tujuan_pinjam"]);
            $tanggal_peminjaman = htmlspecialchars($data["tanggal_peminjaman"]);
            $tanggal_pengembalian = htmlspecialchars($data["tanggal_pengembalian"]);
            $jumlah_buku_dipinjam = htmlspecialchars($data["jumlah_buku_dipinjam"]);
            $status = htmlspecialchars($data["status"]);
        }
        ?>


        <!-- Formulir Edit -->
        <form id="myform" onSubmit="return validasi()" action="pinjam_proses.php" method="post">

            <table>
                <tr>
                    <td>Kode Peminjaman</td>
                    <td>:</td>
                    <td><input readonly type="text" name="kode_peminjaman" value="<?= $kode_peminjaman ?>"
                            id="kode_peminjaman" class="form-control" placeholder="Max: 8 Angka"></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><input type="text" id="id" name="id" value="<?= $id ?>" class="form-control" readonly></td>
                    <input type="hidden" id="id_hidden" name="id" value="<?= $id ?>">

                </tr>
                <tr>
                    <td>Nama Siswa Peminjam</td>
                    <td>:</td>
                    <td><input type="text" id="nama_siswa" name="nama_siswa" value="<?= $nama_siswa ?>"
                            class="form-control" readonly></td>
                    <input type="hidden" id="nama_siswa_hidden" name="nama_siswa" value="<?= $nama_siswa ?>">
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <!-- Elemen Select yang Ditampilkan untuk Referensi Pengguna, tetapi Disabled -->
                        <select name="jenis_kelamin_display" id="jenis_kelamin" class="form-control" disabled>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option <?= $jenis_kelamin == "Laki-Laki" ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki
                            </option>
                            <option <?= $jenis_kelamin == "Perempuan" ? 'selected' : '' ?> value="Perempuan">Perempuan
                            </option>
                        </select>
                        <!-- Input Hidden yang Sebenarnya Dikirim Melalui Formulir -->
                        <input type="hidden" name="jenis_kelamin" value="<?= $jenis_kelamin ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kelas" id="kelas" class="form-control" disabled>
                            <option value="">Pilih Kelas</option>
                            <option <?= $kelas == "VII" ? 'selected' : '' ?> value="VII">VII</option>
                            <option <?= $kelas == "VIII" ? 'selected' : '' ?> value="VIII">VIII</option>
                            <option <?= $kelas == "IX" ? 'selected' : '' ?> value="IX">IX</option>
                        </select>
                        <!-- Input Hidden yang Sebenarnya Dikirim Melalui Formulir -->
                        <input type="hidden" name="kelas" value="<?= $kelas ?>">
                    </td>
                </tr>
                <tr>
                    <td>Buku</td>
                    <td>:</td>
                    <td>
                        <!-- Tambahkan event onchange ke dropdown buku untuk memanggil fungsi updateBookInfo() -->
                        <select name="judul_buku" id="judul_buku" class="form-control" onchange="updateBookInfo()">
                            <option value="">Pilih Buku</option>
                            <?php
                            include "koneksi.php";
                            $select_buku = "SELECT * FROM buku";
                            $query_buku = $koneksi->query($select_buku);
                            $books = [];
                            while ($buku = $query_buku->fetch_assoc()) {
                                $selected = $judul_buku == $buku['judul_buku'] ? 'selected' : '';
                                echo "<option $selected value='" . $buku['judul_buku'] . "'>" . $buku['judul_buku'] . "</option>";

                                // Simpan informasi buku ke dalam array untuk digunakan di JavaScript
                                $books[] = $buku;
                            }
                            ?>
                        </select>
                        <!-- Input Hidden yang Sebenarnya Dikirim Melalui Formulir -->
                        <input type="hidden" name="judul_buku" value="<?= $judul_buku ?>">
                    </td>
                </tr>

                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td>
                        <select name="penerbit" id="penerbit" class="form-control" disabled>
                            <option value="">Pilih Buku</option>
                            <?php
                            include "koneksi.php";
                            $select_buku = "SELECT * FROM buku";
                            $query_buku = $koneksi->query($select_buku);
                            while ($buku = $query_buku->fetch_assoc()) {
                                $selected = $penerbit == $buku['penerbit'] ? 'selected' : '';
                                echo "<option $selected value='" . $buku['penerbit'] . "'>" . $buku['penerbit'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="penerbit" value="<?= $penerbit ?>">

                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td>
                        <select name="pengarang" id="pengarang" class="form-control" disabled>
                            <option value="">Pilih Buku</option>
                            <?php
                            include "koneksi.php";
                            $select_buku = "SELECT * FROM buku";
                            $query_buku = $koneksi->query($select_buku);
                            while ($buku = $query_buku->fetch_assoc()) {
                                $selected = $pengarang == $buku['pengarang'] ? 'selected' : '';
                                echo "<option $selected value='" . $buku['pengarang'] . "'>" . $buku['pengarang'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="pengarang" value="<?= $pengarang ?>">

                    </td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>:</td>
                    <td>
                        <select name="tahun_terbit" id="tahun_terbit" class="form-control" disabled>
                            <option value="">Pilih Buku</option>
                            <?php
                            include "koneksi.php";
                            $select_buku = "SELECT * FROM buku";
                            $query_buku = $koneksi->query($select_buku);
                            while ($buku = $query_buku->fetch_assoc()) {
                                $selected = $tahun_terbit == $buku['tahun_terbit'] ? 'selected' : '';
                                echo "<option $selected value='" . $buku['tahun_terbit'] . "'>" . $buku['tahun_terbit'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="tahun_terbit" value="<?= $tahun_terbit ?>">

                    </td>
                </tr>

                <tr>
                    <td>Tujuan Pinjam</td>
                    <td>:</td>
                    <td>
                        <select name="tujuan_pinjam" id="tujuan_pinjam" class="form-control">
                            <option value="" <?= $tujuan_pinjam == '' ? 'selected' : '' ?>>Pilih Tujuan</option>
                            <option value="Meminjam Buku" <?= $tujuan_pinjam == 'Meminjam Buku' ? 'selected' : '' ?>>
                                Meminjam Buku</option>
                            <option value="Membaca Buku" <?= $tujuan_pinjam == 'Membaca Buku' ? 'selected' : '' ?>>
                                Membaca Buku</option>
                        </select>
                    </td>
                </tr>



                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_peminjaman" value="<?= $tanggal_peminjaman ?>"
                            class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pengembalian</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_pengembalian" value="<?= $tanggal_pengembalian ?>"
                            class="form-control"></td>
                </tr>
                <tr>
                    <td>Jumlah Buku Dipinjam</td>
                    <td>:</td>
                    <td><input type="number" name="jumlah_buku_dipinjam" value="<?= $jumlah_buku_dipinjam ?>"
                            class="form-control" placeholder="Jumlah Buku"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option <?= $status == "Belum dikembalikan" ? 'selected' : '' ?> value="Belum dikembalikan">
                                Belum
                                dikembalikan</option>
                            <option <?= $status == "Sudah dikembalikan" ? 'selected' : '' ?> value="Sudah dikembalikan">
                                Sudah
                                dikembalikan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td><input type="submit" name="edit" class="btn btn-primary" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
    // JavaScript untuk mengisi otomatis kelas berdasarkan Nama_Lengkap yang dipilih
    document.getElementById('Nama_Lengkap').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var kelas = selectedOption.getAttribute('data-kelas');
        document.getElementById('kelas').value = kelas;
    });
    </script>

    <script>
    // Fungsi untuk mengubah nilai penerbit, pengarang, dan tahun terbit saat buku dipilih
    function updateBookInfo() {
        // Dapatkan nilai yang dipilih dari dropdown buku
        var selectedBook = document.getElementById('judul_buku').value;

        // Cari buku yang sesuai dengan nilai yang dipilih
        var books = <?php echo json_encode($books); ?>; // Variabel $books perlu didefinisikan sebelumnya

        // Temukan buku yang sesuai dengan nilai yang dipilih
        var selectedBookInfo = books.find(book => book.judul_buku === selectedBook);

        // Perbarui nilai penerbit, pengarang, dan tahun terbit
        document.getElementById('penerbit').value = selectedBookInfo.penerbit;
        document.getElementById('pengarang').value = selectedBookInfo.pengarang;
        document.getElementById('tahun_terbit').value = selectedBookInfo.tahun_terbit;
    }
    </script>


    <script src="biongo.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html>