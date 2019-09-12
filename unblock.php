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


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user = $_POST['unblock-user'];
	$users = new users($conn,$data['username']);
	$users->unBlock($user);

	
	header('Location: ' . $_SERVER['HTTP_REFERER']);	

	
}
?>
