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
// user who login
	$add_by = $data['username'];
// fetch current date
	$date = date("Y-m-d H:i:s");
	$body = $_POST['Comment-Body'];
	$post_id = $_POST['post_id'];
	$sql = $conn->prepare("select add_by from posts where id = ?");
	$sql->execute(array($post_id));
	$fetchedData = $sql->fetch();
	$Post_To =  $fetchedData['add_by'];
	$arr  = [] ;



	if(strLen($body)>0)
	{

		echo "id of POST " . $post_id;
		echo "<br>user comment ". $add_by."<br> date ".$date."<br> owner Post".$Post_To."<br> comment :".$body;
		$sql = $conn->prepare("INSERT INTO comments VALUES(null,?,?,?,?,'no',?)");
		$sql->execute(array($body,$add_by,$Post_To,$date,$post_id));
		if($sql)
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

	}
}


?>


