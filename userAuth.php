<?php 
ob_start();
session_start();
include "helper/init.php";
include "view/header.php";
include "classes/posts.php";
include "classes/users.php";
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
