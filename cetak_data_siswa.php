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
            $this->Cell(35, 10, $col, 1);
        }
        $this->Ln();

        foreach ($data as $row) {
            $this->Cell(35, 10, $this->counter++, 1);

            foreach ($row as $col) {
                $this->Cell(35, 10, $col, 1);
            }
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddPage('L');

$select = "SELECT Nama_Lengkap, Nisn, kelas, Jenis_Kelamin, Agama, Alamat, Nomor_Telepon FROM siswa";
$query = mysqli_query($koneksi, $select); // Menggunakan mysqli_query

$header = array('Nama Siswa', 'NISN', 'Kelas', 'Jenis Kelamin', 'Agama', 'Alamat', 'No telp');
$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

$pdf->Content($header, $data);

$pdf->Output('output.pdf', 'I');