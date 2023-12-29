<?php
require('fpdf/fpdf.php');
include('koneksi.php');

class PDF extends FPDF
{
    private $counter = 1;

    function Header()
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Data Buku', 0, 1, 'C');
        $this->Ln(10);
    }

    function Content($header, $data)
    {
        $this->SetFont('Arial', '', 10);

        array_unshift($header, 'No.');

        foreach ($header as $col) {
            $this->Cell(22, 10, $col, 1);
        }
        $this->Ln();

        foreach ($data as $row) {
            $this->Cell(22, 10, $this->counter++, 1);

            foreach ($row as $col) {
                $this->Cell(22, 10, $col, 1);
            }
            $this->Ln();
        }
    }
}


$pdf = new PDF();
$pdf->AddPage('L');

$select = "SELECT nama_siswa, jenis_kelamin, kelas, kode_peminjaman, judul_buku, penerbit, pengarang, tahun_terbit, tujuan_pinjam, tanggal_peminjaman, tanggal_pengembalian, status FROM tabel_pinjam";
$query = $koneksi->query($select);

if (!$query) {
    die("Query failed: " . $koneksi->error);
}

$header = array('Nama', 'Jenis Kelamin', 'Kelas', 'Kode Pinjam', 'Judul Buku', 'Penerbit', 'Pengarang', 'Tahun Terbit', 'TujuanPinjam', 'Tgl Pinjam', 'Tgl kembali',  'Status');
$data = array();

while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}

$pdf->Content($header, $data);

$pdf->Output('output.pdf', 'I');
