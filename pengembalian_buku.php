<?php
include "akses.php";
include "koneksi.php";

if (isset($_POST['tambah'])) {
    // Ambil dan sanitasi data yang masuk dari form
    $kode_verifikasi = mysqli_real_escape_string($koneksi, $_POST['kode_verifikasi']);
    $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $tanggal_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggal_pengembalian']);
    $jumlah_buku_dikembalikan = mysqli_real_escape_string($koneksi, $_POST['jumlah_buku_dikembalikan']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    // Query untuk memasukkan data ke dalam tabel pengembalian
    $insertQuery = "INSERT INTO tabel_kembali (kode_verifikasi, nama_siswa, tanggal_pengembalian, jumlah_buku_dikembalikan, status) 
                    VALUES ('$kode_verifikasi', '$nama_siswa', '$tanggal_pengembalian', '$jumlah_buku_dikembalikan', '$status')";

    // Eksekusi query
    $query = mysqli_query($koneksi, $insertQuery);

    // Cek apakah query berhasil
    if ($query) {
        echo "Pengembalian buku berhasil<br>";
        // Redirect ke halaman data pengembalian
        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=data_pengembalian.php">';
    } else {
        // Tampilkan pesan error
        echo "Maaf, Anda gagal untuk menambahkan Data: " . mysqli_error($koneksi);
    }
}
// ... (Kode HTML dan JavaScript seperti sebelumnya)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="gaya/al.css" rel="stylesheet">
    <title>Formulir Pengembalian Buku</title>

    <!-- Tambahkan link ke jQuery UI dan Select2 jika diperlukan -->
    <link rel="stylesheet" href="assets/jquery/jquery-ui.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/select2/select2.min.css" />
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
        <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> <i>Ilmu Pengetahuan Tidak Memiliki
                Kata Akhir, Mohon Agar Kiranya Ketika Mengisi Agar di Perhatikan Agar Tidak Terjadi Apa Yang Tidak Kita
                Inginkan di Kemudian Hari, Terima Kasih</i>
        </div>

        <div class="tombol-popup">
            <a href="#popup">Sebelum anda mengisi data, Klik disini terlebih dahulu</a>
        </div>
        <div id="popup">
            <div class="jelndela-popup">
                <a href="" class="close">X</a>
                <b>Beberapa pengaturan dalam mengisi data yang benar</b>
                <ol>
                    <li>Kode Verifikasi : Masukkan Kode tersebut sesuai kode yang anda isi di formulir pinjam buku</li>
                    <li>Nama Pengembalian : Isi sesuai nama anda seperti kalian menulis di form Pinjam buku</li>
                    <li>kelas : Pilih sesuai kelas anda</li>
                    <li>Judul buku yang di kembalikan : Isi sesuai judul buku yang anda pinjam tadi</li>
                    <li>penerbit : Tempat meerbitkannya</li>
                    <li>pengarang : Pembuat Buku</li>
                    <li>tahun terbit : Tahun Buku di Keluarkan</li>
                    <li>Tanggal Pengembalian : Isi sesuai tanggal pengembalian</li>
                    <li>Jumlah buku yang di kembalikan : Isi sesuai jumlah buku yang anda pinjam tadi</li>
                </ol>
            </div>
        </div>
        <br>



        <div class="container">
            <!-- Form Pengembalian Buku -->
            <h2>Formulir Pengembalian Buku</h2>
            <form id="formPengembalian" action="proses_pengembalian.php" method="post">
                <div class="form-group">
                    <label for="kode_verifikasi">Kode Peminjaman:</label>
                    <select class="form-control" id="kode_verifikasi" name="kode_verifikasi">
                        <option value="">Pilih Kode Peminjaman</option>
                        <?php
                            $select = "SELECT kode_peminjaman FROM tabel_pinjam";
                            $query = mysqli_query($koneksi, $select);
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='" . $result['kode_peminjaman'] . "'>" . $result['kode_peminjaman'] . "</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa:</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" readonly>
                </div>

                <!-- Lengkapi form dengan field yang bersifat readonly -->
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" readonly>
                </div>

                <div class="form-group">
                    <label for="judul_buku">Judul Buku yang Dikembalikan:</label>
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" readonly>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit:</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" readonly>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang:</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" readonly>
                </div>

                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit:</label>
                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" readonly>
                </div>

                <div class="form-group">
                    <label for="Tujuan_Pinjam">Tujuan Pinjam:</label>
                    <input type="text" class="form-control" id="Tujuan_Pinjam" name="tujuan_pinjam" readonly>
                </div>

                <div class="form-group">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" readonly>
                </div>

                <div class="form-group">
                    <label for="tenggat_pengembalian">Tenggat Pengembalian:</label>
                    <input type="date" class="form-control" id="tenggat_pengembalian" name="tenggat_pengembalian" readonly>
                </div>

                <div class="form-group">
                    <label for="jumlah_buku_dipinjam">Jumlah Buku Dipinjam:</label>
                    <input type="text" class="form-control" id="jumlah_buku_dipinjam" name="jumlah_buku_dipinjam"
                        readonly>
                </div>

                <!-- Field yang bisa diubah oleh pengguna -->
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_buku_dikembalikan">Jumlah Buku yang Dikembalikan:</label>
                    <input type="number" class="form-control" id="jumlah_buku_dikembalikan"
                        name="jumlah_buku_dikembalikan" required>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Sudah dikembalikan">Sudah dikembalikan</option>
                        <!-- Tambahkan opsi status lain jika diperlukan -->
                    </select>
                </div>

                <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Memuat jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat Bootstrap JS dari CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Skrip JavaScript Anda untuk mengisi form secara otomatis -->
    <script type="text/javascript">
    $(document).ready(function() {
        // Ketika nilai pada dropdown 'kode_verifikasi' berubah
        $('#kode_verifikasi').change(function() {
            var kodePeminjaman = $(this).val();

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: 'get_data_peminjaman.php', // Pastikan URL ini benar
                type: 'GET',
                data: {
                    kode_peminjaman: kodePeminjaman
                },
                dataType: 'json',
                success: function(response) {
                    // Mengisi form dengan data yang diterima dari server
                    $('#nama_siswa').val(response.nama_siswa);
                    $('#jenis_kelamin').val(response.jenis_kelamin);
                    $('#kelas').val(response.kelas);
                    $('#judul_buku').val(response.judul_buku);
                    $('#penerbit').val(response.penerbit);
                    $('#pengarang').val(response.pengarang);
                    $('#tahun_terbit').val(response.tahun_terbit);
                    $('#Tujuan_Pinjam').val(response.tujuan_pinjam);
                    $('#tanggal_peminjaman').val(response.tanggal_peminjaman);
                    $('#tenggat_pengembalian').val(response.tanggal_pengembalian);
                    $('#jumlah_buku_dipinjam').val(response.jumlah_buku_dipinjam);
                    $('#jumlah_buku_dikembalikan').attr("max", response.jumlah_buku_dipinjam);
                    // Dan seterusnya untuk setiap elemen form yang ingin diisi
                },

                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                    console.error("Response: ", xhr.responseText);
                }
            });
        });
    });
    </script>

</body>

</html>