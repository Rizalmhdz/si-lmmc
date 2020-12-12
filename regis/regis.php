<?php
session_start();
include("../koneksi.php");

if(isset($_POST['submit'])){
	try
	{

        $gender = "";
        $agama = "";
        $gol_darah = "";

	
$nama_lengkap = $_POST['nama_lengkap']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
$email = $_POST['email'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tanggal_masuk =  $_POST['tanggal_masuk'];


$instansi = $_POST['instansi'];

$no_hp = $_POST['no_hp'];
$no_ktp = $_POST['no_ktp'];
$no_bpjs = $_POST['no_bpjs'];
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($_POST['agama'])) {

    $agama = " ";
}
else{
    $agama = $_POST['agama'];
}
if (!isset($_POST['gender'])) {

    $gender = " ";
}
else{
    $gender = $_POST['gender'];
}
if (!isset($_POST['gol_darah'])) {

   $gol_darah = " ";
}
else{
    $gol_darah = $_POST['gol_darah'];
}

$select_stmt = $db->prepare('SELECT * FROM user WHERE username =:id'); //sql select query
$select_stmt->bindParam(':id',$username);
$select_stmt->execute(); 

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

	if(!empty($row)) { 
    $errorMsg="Email telah digunakan oleh orang lain.";

    }
    else if ($nama_lengkap =="" || $email == "" || $tempat_lahir == "" || $tanggal_lahir == ""  || $agama == ""  || $gender == ""  || 
    $instansi == "" || $gol_darah == "" || $no_hp == "" || $no_ktp == "" || $username == "" || $password == ""){
        $errorMsg="data tidak boleh kosong!";

    }

    else {
        
        $insert_stmt=$db->prepare('INSERT INTO user(username,password,email,level)
                                VALUES(:fusername,:fpassword,:femail,2)'); //sql insert query					
        $insert_stmt->bindParam(':fusername',$username);	
        $insert_stmt->bindParam(':fpassword',$password);	 
        $insert_stmt->bindParam(':femail',$email);
        if($insert_stmt->execute())
        {   
            $insert_stmt=$db->prepare('INSERT INTO pasien(username,nama_pasien,tanggal_masuk, no_hp_pasien,no_bpjs,no_ktp,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,instansi, gol_darah)
            VALUES(:username_pasien,:nama_pasien,:tanggal_masuk,:no_hp_pasien,:no_bpjs,:no_ktp,
            :tempat_lahir,:tanggal_lahir,:jenis_kelamin,:agama,:instansi, :gol_darah)'); //sql insert query					
            $insert_stmt->bindParam(':username_pasien',$username);	
            $insert_stmt->bindParam(':nama_pasien', $password);	 
            $insert_stmt->bindParam(':tanggal_masuk',$tanggal_masuk);
            $insert_stmt->bindParam(':no_hp_pasien',$no_hp);
            $insert_stmt->bindParam(':no_bpjs',$no_bpjs);
            $insert_stmt->bindParam(':no_ktp',$no_ktp);
            $insert_stmt->bindParam(':tempat_lahir',$tempat_lahir);
            $insert_stmt->bindParam(':tanggal_lahir',$tanggal_lahir);
            $insert_stmt->bindParam(':jenis_kelamin',$gender);
            $insert_stmt->bindParam(':agama',$agama);
            $insert_stmt->bindParam(':instansi',$instansi);
            $insert_stmt->bindParam(':gol_darah',$gol_darah);

            $insert_stmt->execute();
            
            $_SESSION['user'] = 2;
            $insertMsg="Akun berhasil dibuat!"; //execute query success message
            echo	"<script type='text/javascript'>window.location.href = '../index.php' ; </script>";//refresh 3 second and redirect to index.php page
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

    <!-- <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css"> -->
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

    <style type ="text/css">
.msg{
	left : 25%;
	top : 25%;
	position:fixed;
	width:50%;
}
.alert{padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}
.alert-success{color:#155724;background-color:#d4edda;border-color:#c3e6cb}
.alert-danger{color:#721c24;background-color:#f8d7da;border-color:#f5c6cb}
</style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                <div class="msg">
         <?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>UPS! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?> 
		</div>
                    <h2 class="title">Pendaftaran</h2>
                    
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama Lengkap</label>
                                    <input class="input--style-4" type="text" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">E-mail</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                               
                                <div class="col-2">
                                     <div class="input-group">
                                        <label class="label">Tempat lahir</label>
                                        <input class="input--style-4" type="text" name="tempat_lahir">
                                    </div>
                                </div>
                                    
                                <div class="col-2">
                                    <div class="input-group">
                                            <label class="label">Tanggal Lahir</label>
                                            <div class="input-group-icon">
                                                <input class="input--style-4 js-datepicker" type="text" name="tanggal_lahir">
                                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="input-group">
                                        <label class="label">Agama</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="agama">
                                                <option disabled="disabled" selected="selected" name="agama">Pilih</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                            <label class="label">Gender</label>
                                            <div class="p-t-10">
                                                <label class="radio-container m-r-45">Laki - laki
                                                    <input type="radio" name="gender" value="L">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio-container">Perempuan
                                                    <input type="radio" name="gender" value="P">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Instansi</label>
                                            <input class="input--style-4" type="text" name="instansi">
                                        </div>
                                    </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Golongan Darah</label>
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="gol_darah">
                                                <option disabled="disabled" selected="selected">Pilih</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">No HP</label>
                                            <input class="input--style-4" type="text" name="no_hp">
                                        </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">No KTP</label>
                                            <input class="input--style-4" type="text" name="no_ktp">
                                        </div>
                                    </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">No BPJS</label>
                                        <input class="input--style-4" type="text" name="no_bpjs">
                                    </div>
                                </div>
                        </div>
                        <div class="row row-space">
                                <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Username</label>
                                            <input class="input--style-4" type="text" name="username">
                                        </div>
                                    </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_masuk" value="<?php echo date("y-m-d"); ?>">
                                
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
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
    <script src="ven