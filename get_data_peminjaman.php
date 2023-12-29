<?php
include("koneksi.php");

if(isset($_GET['kode_peminjaman'])) {
	$kode = $_GET['kode_peminjaman'];

    $select = "SELECT * FROM tabel_pinjam WHERE kode_peminjaman='$kode'";
    $result = mysqli_query($koneksi, $select);

    if($result){
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Query failed']);
    }
} else {
    // If kode_peminjaman is not set, return an error message
    echo json_encode(['error' => 'Kode peminjaman is not set']);
}
?>
