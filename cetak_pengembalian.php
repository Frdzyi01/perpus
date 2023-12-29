<?php
require('fpdf/fpdf.php');
include('koneksi.php'); // Pastikan ini adalah jalur yang benar ke file koneksi.php Anda

class PDF extends FPDF
{
    private $counter = 1;

    function Header()
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Data Pengembalian dan Denda', 0, 1, 'C');
        $this->Ln(10);
    }

    function Content($header, $data)
    {
        // Sesuaikan ukuran font jika diperlukan
        $this->SetFont('Arial', '', 8);

        // Menambahkan kolom 'No.' pada awal header
        array_unshift($header, 'No.');

        // Menghitung lebar kolom berdasarkan jumlah kolom
        $totalColumns = count($header);
        $pageWidth = 277; // Lebar halaman dalam mode Landscape
        $margin = 2 * 10; // Margin kiri dan kanan total
        $usableWidth = $pageWidth - $margin;
        $columnWidth = $usableWidth / $totalColumns;

        // Mencetak header
        foreach ($header as $col) {
            $this->Cell($columnWidth, 20, $col, 1, 0, 'C');
        }
        $this->Ln();

        // Mencetak data
        foreach ($data as $row) {
            $this->Cell($columnWidth, 20, $this->counter++, 1, 0, 'C');

            foreach ($row as $col) {
                $this->Cell($columnWidth, 20, $col, 1, 0, 'C');
            }
            $this->Ln();
        }
    }
}


$pdf = new PDF();
$pdf->AddPage('L');

$select = "SELECT kode_peminjaman, nama_siswa, jenis_kelamin, kelas, judul_buku, penerbit, pengarang, tahun_terbit, tujuan_pinjam, tanggal_peminjaman, tenggat_pengembalian, jumlah_buku_dipinjam, denda, status FROM tabel_kembali";
$query = $koneksi->query($select);

if (!$query) {
    die("Query failed: " . $koneksi->error);
}

$header = array('Kode Pinjam', 'Nama', 'Jenis Kelamin', 'Kelas', 'Judul Buku', 'Penerbit', 'Pengarang', 'Tahun Terbit', 'TujuanPinjam', 'Tgl Pinjam', 'Tenggat wktu', 'Jumlah pinjam', 'Denda',  'Status');
$data = array();

while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}

$pdf->Content($header, $data);

$pdf->Output('output.pdf', 'I');
