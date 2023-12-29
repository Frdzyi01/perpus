<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
  $user = mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
  $pass = mysqli_real_escape_string($koneksi, htmlentities(md5($_POST['password'])));

  $sql = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
  $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

  if (mysqli_num_rows($result) == 0) {
    echo 'Username atau Password anda salah <br>';
    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';
  } else {
    $row = mysqli_fetch_assoc($result);
    if ($row['level'] == 1) {
      $_SESSION['admin'] = $user;
      echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="administrator.php";</script>';
    } else {
      // Handle other cases if needed
    }
  }
}
