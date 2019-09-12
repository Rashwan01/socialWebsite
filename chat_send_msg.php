<?php 
session_start();
include "helper/init.php";
include "classes/users.php";
include "classes/posts.php";
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
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$user_from = $data['username'];
	$user_to = $_POST['user_to'];
	$body = $_POST['msg_body'];
	$time_now = date('Y-m-d H:i:s');
	if(!empty($body))
	{
		$sql = $conn->prepare("insert into msg values('','$body','$user_from','$user_to','$time_now')");
		$sql->execute();
	}

}
