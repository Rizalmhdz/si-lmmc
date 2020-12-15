<?
include "fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','8','16');
$pdf->Cell(0,5,'LIFE CARE KLINIK ULM','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jln. Bridgen Hasan Basri','0','1','C',false);
$pdf->Cell(0,2,'UNIVERSITAS LAMBUNG MANGKURAT','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);


$pdf->SetFont('Arial','8',9);
$pdf->Cell(0,5,'LAPORAN OBAT MASUK KLINIK ULM','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','i',7);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(35,6,'Nama Obat',1,0,'C');
$pdf->Cell(37,6,'Jenis Obat.',1,0,'C');
$pdf->Cell(37,6,'Tanggal Keluar',1,0,'C');
$pdf->Cell(35,6,'Satuan',1,0,'C');
$pdf->Cell(35,6,'Jumah Obat',1,0,'C');
$pdf->Cell(40,6,'Harga',1,0,'C');
$pdf->Ln(2);
$no = 0;

$sql= {
    $no++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',7);
$pdf->Cell(8,4,$no,".",1,0,'C');
$pdf->Cell(35,4,$data['nama_obat'],1,0,'L');
$pdf->Cell(37,4,$data['jenis_obat'],1,0,'L');
$pdf->Cell(35,4,$data['tanggal_keluar'],1,0,'L');
$pdf->Cell(35,4,$data['satuan'],1,0,'L');
$pdf->Cell(35,4,$data['jumlah_obat'],1,0,'L');
$pdf->Cell(40,4,$data['harga'],1,0,'R');
}

$PDF->Output();
?>
