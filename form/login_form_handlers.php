

<?php


if(isset($_SESSION['NoBack']))
{
	header("location:dashboard.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
	$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	$password = md5($password);
	
 // give me all info for the users have this email 
	$sql = $conn->prepare("select * from users where email = ? and password = ?");
	$sql->execute(array($email,$password));
	$data = $sql->fetch();
	$row = $sql->rowCount();
	$error = '';

// if exist say it
	if($row ==1)
	{
		if($data['user_closed'] == "yes"){
			$sql = $conn->prepare("update users set user_closed ='no' where email = ? ");
			$sql->execute(array($email));

		}
			$_SESSION['fname'] = $data['fname'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['id'] = $data['id'];
			$_SESSION['NoBack'] ="true";
			$msgSuccess = "<div class='alert alert-success'>welcome Back ".$_SESSION['fname']. "</div>";
			header("refresh:2;url=dashboard.php");
	}
		else{
		
				$error = "<p class='error'> email or password is invalid</p>";
			}
		}
	




?>
