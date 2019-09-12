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
	$search = $_POST['s'];
	$str = '';
	$sql= $conn->prepare("select * from users where fname like'$search%' || lname like'$search%' ");
	$sql->execute();
	$rows = $sql->fetchAll();
	foreach ($rows as $row) {
		$username = $row['username'];
		$fullname = $row['fname']." ". $row['lname'];
		$str .= "<a href='profile.php?q=$username' > <li> $fullname</li>
		</a>";


	}
	if(empty($str))
	{
		echo "<P class='text-center text-weight-bold'> no result</p>";
	}else
	{

		echo $str;
	}
}
?>
