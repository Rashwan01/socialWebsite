<?php 
include "userAuth.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset($_POST['submitupdated']))
	{
		print_r($_REQUEST);

		$user_id =$_REQUEST['user_id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$about = $_POST['about'];

		$sql = $conn->prepare("update  users set fname = ? ,lname =? , email= ? , phone =? , about =? where id = ?");
		$sql->execute(array($fname,$lname,$email,$phone,$about,$user_id));
		if($sql)
		{
			$_SESSION['success'] = '<div class ="alert alert-success"> success</div>';
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}






//update password after validation


	if(isset($_POST['submitFormButton']))
	{
		print_r($_REQUEST);

		$whoUser = $_POST['userlogin'];
		$password = md5($_POST['password_confirmation']);
		$sql = $conn->prepare("update  users set password = ? where id = ?");
		$sql->execute(array($password,$whoUser));
		if($sql)
		{
			$_SESSION['success'] = '<div class ="alert alert-success"> success</div>';
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
}



?>
