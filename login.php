<?php 
session_start();
include "helper/init.php";
include "form/login_form_handlers.php";

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
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
				<?php 
				if(isset($msgSuccess))
				{ 
					echo $msgSuccess;
				} 
				?>


				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"  class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
			
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
									<?php 
				if(isset($error))
				{ 
					echo $error;
				} 
				?>
	    <div class="form-group">
        <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
    </div>


					<div class="flex-col-c p-t-155">

						<a href="register.php" class="txt2">
							Sign Up
						</a>
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
