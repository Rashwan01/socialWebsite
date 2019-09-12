<?php
ob_start();
session_start();
include "helper/init.php";
include "classes/users.php";
if(!$_SESSION['NoBack']|| !$_SESSION['email'])
{
	header("location:login.php");
}
else
{
	$sql = $conn->prepare("select * from users where email = ?");
	$sql->execute(array($_SESSION['email']));
	$data = $sql->fetch();
}



if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//check with ajax if this password is Already correct To its user who login or not
	if(isset($_POST['password']))
	{

		$user= new users($conn,$data['username']);
	   $passwordCheckResult =  $user->passwordIsValid($_POST['password']);
	   if($passwordCheckResult=="false")
	   {
	   	echo "password is invalid";
	   }
	}

	
}



?> 
