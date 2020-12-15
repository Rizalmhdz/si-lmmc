<?php
session_start();
include("../koneksi.php");
require_once("../dompdf/autoload.inc.php");

if($_SESSION['user']!=4){
   echo "<script type='text/javascript'>window.location.href = '../login.php' ; </script>";
}

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$get_id = $db->prepare('SELECT id_apoteker FROM apoteker WHERE username = :username');
$get_id->bindParam(":username", $_SESSION['username']);
$get_id->execute();
$tabel_apoteker = $get_id->fetch();
$id_apoteker = $tabel_apoteker['id_apoteker'];

$select = $db->prepare('SELECT * FROM obat');
$select->execute();

$html1 = '<!doctype html>'.
'<html lang="en">'.
'<head>'.
    '<meta charset="UTF-8">'.
    '<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">'.
    '<meta http-equiv="X-UA-Compatible" content="ie=edge">'.
    '<title>Laporan Obat Masuk</title>'.
    '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">'.
    '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">'.
    '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">'.
    '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">'.
    '<link rel="icon" type="image/png" href="fevicon.ico.png"/>'.
    '<link rel="stylesheet" href="templatemo_main.css">'.
    '<style>'.
    '.line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }'.
  '</style>'.
    '</head><body><main>'.
    '<table style="width: 100%;">'.
      '<tr>'.
        '<td align="center">'.
          '<span style="line-height: 1.6; font-weight: bold;">'.
            'KLINIK UNIVERISTAS LAMBUNG MANGKURAT'.
            '<br>LIFE CARE'.
          '</span>'.
        '</td>'.
      '</tr>'.
    '</table>'.
  
    '<hr class="line-title">'. 
    '<p align="center">'.
      'LAPORAN DATA OBAT MASUK'. '<br>
      <b>2020</b>'.
    '</p>'.
    '<br>'.
    '<br>'.
    '<br>'.
'<div class="grid-container">'.
      '<ol class="breadcrumb">'.
    '<div class="container text-center">'.
          '<div class="row">'.
            '<div class="col-md-12">'.
              '<form method="post" role="form" id="templatemo-preferences-form">'.
                '<div class="row"><center>'.
    '<div class="d-flex table-data">'.
           ' <table class="table table-striped table-dark">'.
                '<thead class="thead-dark">'.
                '<tr><th colspan="10"><h1 class="py-4 bg-dark text-light rounded"></i>KELOLA DATA OBAT</h1></th></tr>'.
                    '<tr>'.
                        '<th>No</th>'.
                        '<th>Id</th>'.
                        '<th>Nama Obat</th>'.
                        '<th>Jenis</th>'.
                        '<th>Tanggal</th>'.
                        '<th>Jumlah</th>'.
                        '<th>Satuan</th>'.
                        '<th>Harga</th>'.
                        '<th>Keterangan</th>'.
                        '<th>Apoteker</th>'.
                        '</tr>';

        $no = 0;
        $html2 = "";
        while($row = $select->fetch()){
          $selectA = $db->prepare('SELECT nama_apoteker FROM apoteker WHERE id_apoteker = :fid_apoteker');
          $selectA->bindParam(':fid_apoteker', $row['id_apoteker']);
          $selectA->execute();
          $rowA = $selectA->fetch();
          $no++;
            
        
        $html2 = $html2.'<tr style= "height:5px;">'.
         '<td >'.$no.'</td>'.
          '<td >'.$row['id_obat'].'</td>'.
          '<td>'.$row['nama_obat'].'</td>'.
          '<td>'.$row['jenis_obat'].'</td>'.
          '<td>'.$row['tanggal_obat'].'</td>'.
          '<td>'.$row['jumlah_obat'].'</td>'.
          '<td>'.$row['satuan_obat'].'</td>'.
          '<td>'.$row['harga_obat'].'</td>'.
          '<td>'.$row['keterangan'].'</td>'.
          '<td>'.$rowA['nama_apoteker'].'</td>'.                 
        '</tr>';

        }
                $html3='</thead>'.
               '<tbody id="tbody">'.
'</tbody></table></div></div>'.
'</main><script src="js/jquery.min.js"></script>'.
  '<script src="js/bootstrap.min.js"></script>'.
  '<script src="js/templatemo_script.js"></script>'.
   '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>'.
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>'.
    '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>'.
'<script src="main.js"></script>'.
'</body></html>';

$dompdf->loadHtml($html1.$html2.$html3);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_obat.pdf');

?>