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
	<script src="form2.js"></script>
	<title>Pengembalian Buku</title>

	<link rel="stylesheet" href="assets/jquery/jquery-ui.css" type="text/css" media="screen">
	<script src="assets/jquery/jquery.min.js"></script>

	<link rel="stylesheet" href="assets/select2/select2.min.css" />
	<script src="assets/select2/select2.min.js"></script>

</head>
<bdoy>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="administrator.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Buku</a></li>
					<li><a href="Data_Buku.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Data Buku</a></li>
					<li><a href="Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Siswa</a></li>
					<li><a href="Data_Siswa.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Data Siswa</a></li>
					<li><a href="Pinjam_Buku.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Pinjam Buku</a></li>
					<li><a href="Data_Peminjaman.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Data Peminjaman Buku</a></li>
					<li><a href="Pengembalian_Buku.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Pengembalian Buku</a></li>
					<li><a href="Denda.php"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Denda</a></li>
					<li><a href="Ketentuan.php"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Ketentuan</a></li>
					<li><a href="Tentang.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Tentang</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="col-md-8">
		<div class="alert alert-warning" role="alert">
			<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> <i>Ilmu Pengetahuan Tidak Memiliki Kata Akhir,Mohon Agar Kirannya Ketika Mengisi Agar DI Perhatikan Agar Tidak Terjadi Apa Yang Tidak Kita Iginkan Di Kemudian Hari, Terima Kasih</i>
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

		<form id="myform" onSubmit="return validasi()" action="pengembalian_proses.php" method="post">
			<?php
			include "koneksi.php";
			$i = 1;
			$select = "SELECT * FROM tabel_pengembalian where kode_verifikasi = " . $_GET['id'];
			$query = mysql_query($select);

			$kode_verifikasi = "";
			$nama_siswa = "";
			$kelas = "";
			$judul_buku = "";
			$penerbit = "";
			$pengarang = "";
			$tahun_terbit = "";
			$tanggal_pengembalian = "";
			$jumlah = "";
			$status = "";

			while ($result = mysql_fetch_array($query)) {
				$kode_verifikasi = $result["kode_verifikasi"];
				$nama_siswa = $result["nama_siswa"];
				$kelas = $result["kelas"];
				$judul_buku = $result["judul_buku"];
				$penerbit = $result["penerbit"];
				$pengarang = $result["pengarang"];
				$tahun_terbit = $result["tahun_terbit"];
				$tanggal_pengembalian = $result["tanggal_pengembalian"];
				$jumlah = $result["jumlah"];
				$status = $result["status"];
			}
			?>

			<table>
				<tr>
					<td>Kode Verifikasi Pengembalian Buku</td>
					<td></td>
					<td>
						<input readonly type="text" name="kode_verifikasi" value="<?= $kode_verifikasi ?>" id="kode_verifikasi" class="form-control" placeholder="Max : 8 Angka">
					</td>
				</tr>
				<tr>
					<td>Nama Pengembalian</td>
					<td></td>
					<td><input type="text" name="nama_siswa" value="<?= $nama_siswa ?>" id="nama_siswa" class="form-control"></td>
				</tr>
				<tr>
					<td>kelas</td>
					<td> </td>
					<td>
						<select name="kelas" value="<?= $kelas ?>" id="kelas" class="form-control" class="required">
							<option value="">Pilih kelas</option>
							<option <?= $kelas == "VII" ? 'selected' : '' ?> value="VII">VII</option>
							<option <?= $kelas == "VIII" ? 'selected' : '' ?> value="VIII">VIII</option>
							<option <?= $kelas == "IX" ? 'selected' : '' ?> value="IX">IX</option>
						</select>
				</tr>
				<tr>
					<td>Judul buku yang di kembalikan</td>
					<td> </td>
					<td>
						<select name="id_buku" id="id_buku" class="form-control" class="required">
							<option value="">Pilih Buku</option>
							<?php
							include "koneksi.php";
							$select = "SELECT * FROM buku";
							$query = mysql_query($select);
							while ($result = mysql_fetch_array($query)) {
							?>
								<option <?= $result['judul_buku'] == $judul_buku ? 'selected' : '' ?> value="<?= $result['id_buku'] ?>"><?= $result['judul_buku'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tanggal pengembalian buku</td>
					<td></td>
					<td><input type="date" name="tanggal_pengembalian" value="<?= $tanggal_pengembalian ?>" id="tanggal_pengembalian" class="form-control"></td>
				</tr>
				<tr>
					<td>Jumlah buku yang di kembalikan</td>
					<td> </td>
					<td><input type="text" name="jumlah" value="<?= $jumlah ?>" id="jumlah" class="form-control"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td> </td>
					<td>
						<select name="status" value="<?= $status ?>" class="form-control">
							<option value="Sudah dikembalikan">Sudah dikembalikan</option>
						</select>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td><input type="submit" name="edit" class="btn btn-primary" value="Update"></td>
				</tr>
				</tabel>
		</form>

		<script src="biongo.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


		<script type="text/javascript">
			$(document).ready(function() {

				$(".loadajax").select2({
					placeholder: {
						id: '-1',
						text: 'Pilih Judul Buku'
					},
					ajax: {
						type: 'post',
						url: '<?php echo "/bukus_ajax.php"; ?>',
						dataType: 'json',
						delay: 0,
						data: function() {
							return {
								katakunci: $('.select2-search__field').val()
							};
						},
						processResults: function(data, params) {
							params.page = params.page || 1;
							return {
								results: $.map(data, function(obj) {
									return {
										id: obj.id_buku,
										text: obj.judul_buku
									};
								}),
								pagination: {
									more: (params.page * 30) < data.total_count
								}
							};
						}
					}
				});


			});


			function tampilkanbuku() {
				id_buku = $('#buku').val();
				$.ajax({
					type: 'get',
					url: '<?php echo "/buku_ajax.php?katakunci="; ?>' + id_buku,
					dataType: 'json',
					delay: 0,
					error: function() {},
					beforeSend: function() {},
					success: function(x) {
						$('#penerbit').val(x.penerbit_buku);
						$('#pengarang').val(x.pengarang);
						$('#tahun_terbit').val(x.tahun_terbit);
					},
				});
			}
		</script>

		</body>

</html>