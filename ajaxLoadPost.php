     
<?php 
session_start();
ob_start();
include "helper/init.php";
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

include "classes/users.php";
include "classes/posts.php";



$post  = new posts($conn,$data['username']);
$post->loadPostFriends();

?>
