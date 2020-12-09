<?php
session_start();
include("koneksi.php");

if(isset($_POST['login'])){
	try
	{
	
$username = $_POST['email']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
$password = $_POST['password'];
$select_stmt = $db->prepare('SELECT * FROM pasien WHERE EMAIL_PASIEN =:id and PASSWORD_PASIEN =:pass'); //sql select query
$select_stmt->bindParam(':id',$username);
$select_stmt->bindParam(':pass',$password);
$select_stmt->execute(); 




	if(!empty($row)) { 
		
	//$select_stmt = $db->prepare('SELECT * FROM pasien WHERE EMAIL_PASIEN =:id and PASSWORD_PASIEN =:pass');
	$insertMsg="login berhasil";
	if($row[id])
	echo "<script type='text/javascript'>window.location.href = 'index.php' ; </script>";


}
else if ($_POST['email'] =="" || $_POST['password'] == ""){
	$errorMsg="masukkan username dan password!";

}

else {
	$errorMsg="Username atau password yang anda masukkan salah!";

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
<style type ="text/css">
.msg{
	left : 25%;
	top : 25%;
	position:fixed;
	width:50%;
}
</style>

	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link href="images/fevicon.ico.png" rel="icon">
  <link href="imgages/apple-touch-icon.png" rel="apple-touch-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
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
			<div class="wrap-login100 p-t-190 p-b-30">
			
				<form method="post" class="login100-form validate-form">

					<div class="login100-form-avatar">
						<img src="images/avatar-01.png" alt="AVATAR">
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
						Login ULM clinic
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username Tidak Boleh Kosong">
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password Tidak Boleh Kosong">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="login" value="LOGIN">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="regis/regis.php">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
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