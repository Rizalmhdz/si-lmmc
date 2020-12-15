<?php
session_start();
include("../koneksi.php");
if($_SESSION['user']!=2){
   echo "<script type='text/javascript'>window.location.href = 'login.php' ; </script>";
}

$select_stmt = $db->prepare('SELECT * FROM pasien WHERE username = :fusername'); //sql select query
$select_stmt->bindParam(':fusername',$_SESSION['username']);
$select_stmt->execute(); 

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

$select_stmtA = $db->prepare('SELECT * FROM rekam_medis WHERE no_anggota = :fno_anggota'); //sql select query
$select_stmtA->bindParam(':fno_anggota',$row['no_anggota']);
$select_stmtA->execute(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jadwal dokter</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/fevicon.ico.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<thead>
						
				<div class="table100 ver6 m-b-110">
				
					<table data-vertable="ver6">
						<thead>
						<tr class="row100 head" >
						<th colspan="5"><h1 style="text-align:center;padding:10px;background-color:#333333;color:white;">RIWAYAT PENGOBATAN</h1>
					</th></tr>
						<tr class="row100 head">

								<th class="column100 column1" data-column="column1">TANGGAL PERIKSA</th>
								<th class="column100 column2" data-column="column2">KELUHAN</th>
								<th class="column100 column3" data-column="column3">DIAGNOSA</th>
								<th class="column100 column4" data-column="column4">TEKANAN DARAH</th>
								<th class="column100 column5" data-column="column5">DOKTER PEMERIKSA</th>
							</tr>
						</thead>
						<tbody>
						<?php while ($rowA = $select_stmtA->fetch())
									{
										$id_dokter = $rowA['id_dokter'];
										$B = $db->prepare("SELECT nama_dokter FROM dokter WHERE id_dokter = $id_dokter");
										$B->execute();
										$rowB = $B->fetch(PDO::FETCH_ASSOC);
										$nama_dokter = $rowB['nama_dokter'];

										$tanggal_periksa = $rowA['tanggal_periksa'];
										$day = date('D', strtotime($tanggal_periksa));
										$dayList = array(
											'Sun' => 'Minggu',
											'Mon' => 'Senin',
											'Tue' => 'Selasa',
											'Wed' => 'Rabu',
											'Thu' => 'Kamis',
											'Fri' => 'Jumat',
											'Sat' => 'Sabtu'
										);?>
							<tr class="row100">
							<td class="column100 column1" data-column="column1"><?php echo $dayList[$day].",  ".$tanggal_periksa;?></td>
								<td class="column100 column2" data-column="column2"><?php echo $rowA['keluhan'];?> </td>
								<td class="column100 column3" data-column="column3"><?php echo $rowA['diagnosa'];?> </td>
								<td class="column100 column4" data-column="column4"><?php echo $rowA['tekanan_darah'];?> </td>
								<td class="column100 column5" data-column="column5"><?php echo $nama_dokter;?> </td>
							</tr>
									<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>