<?php
include("koneksi.php");

$katakunci = '';
if(isset($_GET['katakunci'])) {
	$katakunci = $_GET['katakunci'];
}

$select = "SELECT * FROM buku where id_buku='$katakunci'";
$result = mysqli_query($koneksi, $select);

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>
