<?php
include("koneksi.php");

$katakunci = '';
if(isset($_POST['katakunci'])) {
	$katakunci = $_POST['katakunci'];
}
$select = "SELECT * FROM buku where judul_buku like '%$katakunci%'";
$result = mysql_query($select);

$all = array();
while (($row = mysql_fetch_assoc($result))) {
	$all[] = $row;
}

echo json_encode($all);
?>
