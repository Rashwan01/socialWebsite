<?php 
session_start();
include "helper/init.php";

// if user login fetch his data here else redirect to login oage

if(!$_SESSION['NoBack']|| !$_SESSION['email'])
{
	header("location:login.php");
}
else
{
	$sql = $conn->prepare("select * from users where email = ?");
	$sql->execute(array($_SESSION['email']));
	$data = $sql->fetch();
	$totalISerLike = $data['num_likes'];
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>continue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="asset/img/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/font/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/font/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('asset/img/bg-01.jpg');">

			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
		


				<form method="POST" action="chat.php"  class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
				<img src="assetWebsite/images/logo.png">
					</span>

					
					
	    <div class="form-group">
        <button type="submit" name="submit" id="submit" class="form-submit" >continue as <?php echo $data['fname']. " ". $data['lname'] ?></button>
    </div>
     <button type="text" name="submit" id="submit" >log in with another account ?></button>
    </div>

		
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="asset/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="asset/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="asset/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="asset/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="asset/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="asset/js/main.js"></script>

</body>
</html>
