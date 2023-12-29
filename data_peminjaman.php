<?php include "akses.php" ?>
<?php include "koneksi.php" ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" media="screen" href="cso/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Data Peminjaman Buku</title>
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
                                    aria-hidden="true"></span> Data Buku</a></li>
                        <li><a href="Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Siswa</a></li>
                        <li><a href="Data_Siswa.php"><span class="glyphicon glyphicon-folder-open"
                                    aria-hidden="true"></span> Data Siswa</a></li>
                        <li><a href="Pinjam_Buku.php"><span class="glyphicon glyphicon-upload"
                                    aria-hidden="true"></span> Pinjam Buku</a></li>
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
                                Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <div class="container">
        <div class="text-center">
            <h1>Data Peminjaman Buku</h1>
        </div>

        <!-- Tombol Hapus Semua Data -->
        <div style="margin-bottom: 10px;" align="left">
            <button class="btn btn-danger btn-lg" onclick="confirmDeletion()">Hapus Semua Data</button>
        </div>

        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Kode Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Tujuan Pinjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Jumlah Buku Dipinjam</th>
                    <th>Status</th>
                    <th>Perintah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['tambah'])) {
                    $nama_siswa = $_POST['nama_siswa'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $kelas = $_POST['kelas'];
                    $kode_peminjaman = $_POST['kode_peminjaman'];
                    $tujuan_pinjam = $_POST['tujuan_pinjam'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                    $jumlah_buku_dipinjam = $_POST['jumlah_buku_dipinjam'];
                    $status = $_POST['status'];

                    $select = "SELECT * FROM buku WHERE id_buku='" . $_POST["id_buku"] . "'";
                    $result = mysqli_query($koneksi, $select);
                    $row = mysqli_fetch_assoc($result);

                    $judul_buku = $row['judul_buku'];
                    $penerbit = $row['penerbit'];
                    $pengarang = $row['pengarang'];
                    $tahun_terbit = $row['tahun_terbit'];

                    $query = mysqli_query($koneksi, "INSERT INTO tabel_pinjam VALUES(null, '$nama_siswa', '$jenis_kelamin', '$kelas', '$kode_peminjaman', '$judul_buku', '$penerbit', '$pengarang', '$tahun_terbit', '$tujuan_pinjam', '$tanggal_peminjaman', '$tanggal_pengembalian', '$jumlah_buku_dipinjam', '$status')");

                    if ($query) {
                        header("Location: data_peminjaman.php");
                        exit();
                    }
                }

                // Bagian untuk menampilkan data
                $result = mysqli_query($koneksi, "SELECT * FROM tabel_pinjam"); // Sesuaikan dengan query Anda
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row['nama_siswa'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['kelas'] . "</td>";
                        echo "<td>" . $row['kode_peminjaman'] . "</td>";
                        echo "<td>" . $row['judul_buku'] . "</td>";
                        echo "<td>" . $row['penerbit'] . "</td>";
                        echo "<td>" . $row['pengarang'] . "</td>";
                        echo "<td>" . $row['tahun_terbit'] . "</td>";
                        echo "<td>" . $row['tujuan_pinjam'] . "</td>";
                        echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
                        echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                        echo "<td>" . $row['jumlah_buku_dipinjam'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>";
                        echo "<a href='pinjam_buku_edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='hapus_pinjam.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='15'>Tidak ada data peminjaman</td></tr>";
                }
                ?>
            </tbody>
        </table>
        </form>
    </div>
    <div align="center">
        <p>Jika ingin di Cetak semua data yang ada di tabel dengan berbentuk kertas, silahkan klik di bawah ini.</p>
        <a href="cetak_peminjaman.php" target="_blank" class="btn btn-primary btn-lg info" role="button">Cetak</a>
    </div>
</body>

<!-- Pastikan jalur ke file JavaScript benar -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!-- Menambahkan Bootstrap JS dan dependencies (Opsional) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').dataTable();
});
</script>

<!-- Skrip Konfirmasi Penghapusan -->
<script>
function confirmDeletion() {
    var confirmAction = confirm("Apakah Anda yakin ingin menghapus semua data peminjaman?");
    if (confirmAction) {
        window.location.href = 'hapus_semua_data_peminjaman.php';
    }
}
</script>



</html>