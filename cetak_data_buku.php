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
            $this->Cell(25, 10, $col, 1);
        }
        $this->Ln();

        foreach ($data as $row) {
            $this->Cell(25, 10, $this->counter++, 1);

            foreach ($row as $col) {
                $this->Cell(25, 10, $col, 1);
            }
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddPage('L');

// Using mysqli instead of mysql
$select = "SELECT id_buku, judul_buku, kategori_buku, penerbit, pengarang, tahun_terbit, isbn, judul_buku_rusak, judul_buku_baik, jumlah_buku_tersedia FROM buku";
$query = mysqli_query($koneksi, $select);

$header = array('ID Buku', 'Judul Buku', 'Kategori Buku', 'Penerbit', 'Pengarang', 'Tahun Terbit', 'ISBN', 'Buku Rusak', 'Buku Baik', ' Jumlah Buku');
$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

$pdf->Content($header, $data);

$pdf->Output('output.pdf', 'I');
