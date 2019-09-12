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
	if(isset($_POST['follow']))
	{

		$userFollowing = $_POST['user-follow'];
		$user = new users($conn,$data['username']);
		$add = $user->addFollow($userFollowing);
		header('Location: ' . $_SERVER['HTTP_REFERER']);	
	}
	if(isset($_POST['unfollow']))
	{
		$userFollowing = $_POST['user-unfollow'];
		$user = new users($conn,$data['username']);
		$add = $user->removeFollow($userFollowing);
		header('Location: ' . $_SERVER['HTTP_REFERER']);	
	}

}

?>
