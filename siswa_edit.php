<?php
include "akses.php";
include "koneksi.php";

$Nama_Lengkap = $Nisn = $kelas = $Jenis_Kelamin = $Agama = $Alamat = $Nomor_Telepon = "";
$edit = "Update";

// Cek apakah ID siswa ada dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$old_id = $koneksi->real_escape_string($_GET['id']);

	$stmt = mysqli_prepare($koneksi, "SELECT * FROM siswa WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "i", $old_id); // Menggunakan 'i' karena id biasanya berupa integer
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if ($data = mysqli_fetch_assoc($result)) {

		$Nama_Lengkap = $data["Nama_Lengkap"];
		$Nisn = $data["Nisn"];
		$kelas = $data["kelas"];
		$Jenis_Kelamin = $data["Jenis_Kelamin"];
		$Agama = $data["Agama"];
		$Alamat = $data["Alamat"];
		$Nomor_Telepon = $data["Nomor_Telepon"];
	} else {
		echo "<p>Data tidak ditemukan.</p>";
	}
	mysqli_stmt_close($stmt);
} else {
	echo "<p>Parameter tidak valid.</p>";
}
// Tambahkan kode untuk menampilkan form dan mengelola submit form di sini
// (Anda bisa menggunakan form yang telah Anda buat sebelumnya)
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
    <title>Edit Siswa</title>
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

    <div class="col-md-8">
        <!-- Alert dan Popup -->

        <form id="myform" onSubmit="return validasi()" action="siswa_proses.php" method="post" class="form-horizontal">
            <h3>Edit Siswa</h3>
            <!-- Input hidden untuk menyimpan ID lama -->
            <input type="hidden" value="<?= htmlspecialchars($old_id) ?>" name="old_id">

            <!-- Form Group untuk Nama Lengkap -->
            <div class="form-group">
                <label for="Nama_Lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="Nama_Lengkap" name="Nama_Lengkap"
                        placeholder="Nama Lengkap" value="<?= htmlspecialchars($Nama_Lengkap) ?>">
                </div>
            </div>

            <!-- Form Group untuk Nisn -->
            <div class="form-group">
                <label for="Nisn" class="col-sm-3 control-label">Nisn</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="Nisn" name="Nisn" placeholder="Nisn"
                        value="<?= htmlspecialchars($Nisn) ?>">
                </div>
            </div>

            <!-- Form Group untuk Kelas -->
            <div class="form-group">
                <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                <div class="col-sm-9">
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        <option value="VII A" <?= ($kelas == 'VII A') ? 'selected' : ''; ?>>VII A</option>
                        <option value="VII B" <?= ($kelas == 'VII B') ? 'selected' : ''; ?>>VII B</option>
                        <option value="VII C" <?= ($kelas == 'VII C') ? 'selected' : ''; ?>>VII C</option>
                        <option value="VIII A" <?= ($kelas == 'VIII A') ? 'selected' : ''; ?>>VIII A</option>
                        <option value="VIII B" <?= ($kelas == 'VIII B') ? 'selected' : ''; ?>>VIII B</option>
                        <option value="VIII C" <?= ($kelas == 'VIII C') ? 'selected' : ''; ?>>VIII C</option>
                        <option value="IX A" <?= ($kelas == 'IX A') ? 'selected' : ''; ?>>IX A</option>
                        <option value="IX B" <?= ($kelas == 'IX B') ? 'selected' : ''; ?>>IX B</option>
                        <option value="IX C" <?= ($kelas == 'IX C') ? 'selected' : ''; ?>>IX C</option>
                    </select>
                </div>
            </div>

            <!-- Form Group untuk Jenis Kelamin -->
            <div class="form-group">
                <label for="Jenis_Kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" <?= ($Jenis_Kelamin == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki
                        </option>
                        <option value="Perempuan" <?= ($Jenis_Kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan
                        </option>
                    </select>

                </div>
            </div>

            <!-- Form Group untuk Agama -->
            <div class="form-group">
                <label for="Agama" class="col-sm-3 control-label">Agama</label>
                <div class="col-sm-9">
                    <select name="Agama" id="Agama" class="form-control">
                        <option value="">Pilih Agama</option>
                        <option value="Islam" <?= ($Agama == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                        <option value="Kristen" <?= ($Agama == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                        <option value="Budha" <?= ($Agama == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                    </select>
                </div>
            </div>

            <!-- Form Group untuk Alamat -->
            <div class="form-group">
                <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat"
                        value="<?= htmlspecialchars($Alamat) ?>">
                </div>
            </div>

            <!-- Form Group untuk Nomor Telepon -->
            <div class="form-group">
                <label for="Nomor_Telepon" class="col-sm-3 control-label">Nomor Telepon</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="Nomor_Telepon" name="Nomor_Telepon"
                        placeholder="Nomor Telepon" value="<?= htmlspecialchars($Nomor_Telepon) ?>">
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" value="<?= $edit ?>" name="edit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

    <script src="biongo.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>