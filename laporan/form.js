// fungsi yang dipanggil ketika form di submit
// lihat baris 71 onSubmit
function validasi() {
  var nama = document.forms["myform"]["nama"].value;
  var validasiHuruf = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;

  //        validasi nama tidak boleh kosong (required)
  if (nama == null || nama == "") {
    alert("Nama tidak boleh kosong !");
    return false;
  }

  if (nama.match(validasiHuruf)) {
    alert("eittss, Nama harus huruf bro !");
    return false;
  }

  //        menangkap variabel kode dari form,
  //        my form adalah id dari form, lihat baris 5
  //        kode adalah id inputan, lihat baris 6
  var kode = document.forms["myform"]["kode"].value;

  //        membuat variabel numbers bernilai angka 0 s/d 9
  var numbers = /^[0-9]+$/;

  //        validasi kode tidak boleh kosong (required)
  if (kode == null || kode == "") {
    alert("Kode Peminjaman tidak boleh kosong !");
    return false;
  }

  //        validasi kode harus berupa angka
  //        dengan membandingkan dengan variabel number yang dibuat pada baris 21
  if (!kode.match(numbers)) {
    alert("Kode Peminjaman harus angka !");
    return false;
  }

  //        validasi kode harus 8 digit pakai length javascript
  if (kode.length != 8) {
    alert("Kode Peminjaman harus 8 digit");
    return false;
  }

  var jurusan = document.forms["myform"]["jurusan"].value;

  //      validasi jurusan tidak boleh kosong (required)
  if (jurusan == null || jurusan == "") {
    alert("Jurusan tidak boleh kosong !");
    return false;
  }

  var kelas = document.forms["myform"]["kelas"].value;

  //      validasi kelas tidak boleh kosong (required)
  if (kelas == null || kelas == "") {
    alert("kelas tidak boleh kosong !");
    return false;
  }

  var buku = document.forms["myform"]["buku"].value;
  var validasiHuruf = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;

  //      validasi buku tidak boleh kosong (required)
  if (buku == null || buku == "") {
    alert("Judul Buku tidak boleh kosong !");
    return false;
  }

  if (buku.match(validasiHuruf)) {
    alert("Judul buku harus huruf bro !");
    return false;
  }

  var tujuan = document.forms["myform"]["tujuan"].value;

  //      validasi tujuan tidak boleh kosong (required)
  if (tujuan == null || tujuan == "") {
    alert("Tujuan untuk meminjam tidak boleh kosong !");
    return false;
  }

  var tanggal = document.forms["myform"]["tanggal"].value;

  //      validasi tanggal tidak boleh kosong (required)
  if (tanggal == null || tanggal == "") {
    alert("Tanggal tidak boleh kosong !");
    return false;
  }

  var jam = document.forms["myform"]["jam"].value;

  //      validasi jam tidak boleh kosong (required)
  if (jam == null || jam == "") {
    alert("Jam tidak boleh kosong !");
    return false;
  }

  var jumlah = document.forms["myform"]["jumlah"].value;
  var numbers = /^[0-9]+$/;

  if (jumlah == null || jumlah == "") {
    alert("Jumlah Peminjaman tidak boleh kosong !");
    return false;
  }

  if (!jumlah.match(numbers)) {
    alert("Jumlah Buku Peminjaman harus angka !");
    return false;
  }

  if (jumlah.length != 2) {
    alert("Jumlah Peminjaman harus 2 digit");
    return false;
  }

  var kelamin = document.forms["myform"]["kelamin"].value;

  //      validasi kelamin tidak boleh kosong (required)
  if (kelamin == null || kelamin == "") {
    alert("Kelamin tidak boleh kosong !");
    return false;
  }
}
