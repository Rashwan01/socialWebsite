
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







?>

															<li>
																<div class="nearly-pepls">
																	<figure>
																		<a href="time-line.html" title=""><img src="assetWebsite/images/resources/nearly6.jpg" alt=""></a>
																	</figure>
																	<div class="pepl-info">
																		<h4><a href="time-line.html" title="">caty lasbo</a></h4>
																		<span>work as dancers</span>
																		<a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a>
																		<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
																	</div>
																</div>
															</li>
