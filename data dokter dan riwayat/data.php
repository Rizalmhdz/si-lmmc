<?php
session_start();
include("../koneksi.php");
if($_SESSION['user']!=2){
   echo "<script type='text/javascript'>window.location.href = 'login.php' ; </script>";
}

$select_stmt = $db->prepare('SELECT * FROM jadwal_dokter'); //sql select query

$select_stmt->execute(); 

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
							<tr class="row100 head">
								<h1>JADWAL DOKTER </h1>
								<th class="column100 column1" data-column="column1"></th>
								<th class="column100 column2" data-column="column2">SENIN</th>
								<th class="column100 column3" data-column="column3">SELASA</th>
								<th class="column100 column4" data-column="column4">RABU</th>
								<th class="column100 column5" data-column="column5">KAMIS</th>
								<th class="column100 column6" data-column="column6">JUM'AT</th>
								<th class="column100 column7" data-column="column7">SABTU</th>
								<th class="column100 column8" data-column="column8">MINGGU</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						
						while ($row = $select_stmt->fetch())
									{
										$b = $row['id_dokter'];
										$A = $db->prepare("SELECT nama_dokter FROM dokter WHERE id_dokter = $b");
										$A->execute();
										$rowA = $A->fetch(PDO::FETCH_ASSOC);

										$tanggal = $row['hari_kerja'];
										$day = date('D', strtotime($tanggal));
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
							<td class="column100 column1" data-column="column1"><?php echo $rowA['nama_dokter'];?></td>
								<td class="column100 column2" data-column="column2"><?php echo $dayList[$day] == "Senin" ? $row['jam_kerja'] : "--"; ?> </td>
								<td class="column100 column3" data-column="column3"><?php echo $dayList[$day] == "Selasa" ? $row['jam_kerja'] : "--"; ?></td>
								<td class="column100 column4" data-column="column4"><?php echo $dayList[$day] == "Rabu" ? $row['jam_kerja'] : "--"; ?></td>
								<td class="column100 column5" data-column="column5"><?php echo $dayList[$day] == "Kamis" ? $row['jam_kerja'] : "--"; ?></td>
								<td class="column100 column6" data-column="column6"><?php echo $dayList[$day] == "Jumat" ? $row['jam_kerja'] : "--"; ?></td>
								<td class="column100 column7" data-column="column7"><?php echo $dayList[$day] == "Sabtu" ? $row['jam_kerja'] : "--"; ?></td>
								<td class="column100 column8" data-column="column8"><?php echo $dayList[$day] == "Minggu" ? $row['jam_kerja'] : "--"; ?></td>
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