<?php
include("../koneksi.php");
session_start();
if(isset($_POST['sign'])){
	try
	{
	
$full_name = $_POST['full_name']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
$email = $_POST['email'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$nomer_wa = $_POST['nomer_wa'];
$status = $_POST['status'];

$select_stmt = $db->prepare('SELECT * FROM pasien WHERE email =:id'); //sql select query
$select_stmt->bindParam(':id',$email);
$select_stmt->execute(); 

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

	if(!empty($row)) { 
$errorMsg="Email telah digunakan oleh orang lain.";

}
else if ($_POST['full_name'] =="" || $_POST['email'] == "" || $_POST['tgl_lahir'] == "" || $_POST['gender'] == ""  || $_POST['password'] == ""  || $_POST['nomer_wa'] == ""  || $_POST['gender'] == "status"){
	$errorMsg="data tidak boleh kosong!";

}

else {
	
    $insert_stmt=$db->prepare('INSERT INTO pasien(NAMA_PASIEN,EMAIL_PASIEN,TANGGAL_LAHIR,JENIS_KELAMIN,PASSWORD_PASIEN,NO_HP_PASIEN)
                            VALUES(:ffull_name,:femail,:ftgl_lahir,:fgender,:fpassword,:fnomer_wa)'); //sql insert query					
    $insert_stmt->bindParam(':ffull_name',$full_name);	
    $insert_stmt->bindParam(':femail',$email);	  //bind all parameter 
    $insert_stmt->bindParam(':ftgl_lahir',$tgl_lahir);
    $insert_stmt->bindParam(':fgender',$gender);
    $insert_stmt->bindParam(':fpassword',$password);
    $insert_stmt->bindParam(':fnomer_wa',$nomer_wa);
    if($insert_stmt->execute())
    {
        
		$_SESSION['user'] = 2;
		
$_SESSION['email'] = $email;
        $insertMsg="Akun berhasil dibuat!"; //execute query success message
	echo	"<script type='text/javascript'>window.location.href = 'index.php' ; </script>";//refresh 3 second and redirect to index.php page
    }
}
	}
catch(PDOException $e)
{
	$e->getMessage();
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama Lengkap</label>
                                    <input class="input--style-4" type="text" name="full_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Lahir</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="tgl_lahir">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Laki - laki
                                            <input type="radio" name="gender" value="Laki-laki" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Perempuan
                                            <input type="radio" name="gender" value="Perempuan">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nomor HP/WA</label>
                                    <input class="input--style-4" type="text" name="nomer_wa">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Keterangan/Status</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="status">
                                    <option disabled="disabled" selected="selected">Pilih</option>
                                    <option>Pasien (Mahasiswa, Dosen, Umum)</option>
                                    <option>Dokter</option>
                                    <option>Apoteker</option>
                                    <option>Admin</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="sign" value="Sign Up">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->

