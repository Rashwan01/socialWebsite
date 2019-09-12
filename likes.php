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
	$totalISerLike = $data['num_likes'];
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$post_id = $_REQUEST['post_id'];
	$sql = $conn->prepare("select add_by , likes from posts where id = ?");
	$sql->execute(array($post_id));
	$fetchedData = $sql->fetch();
	//total of likes in a particular post
	$totalLikes = $fetchedData['likes'];
	//who added it
	$added_by = $fetchedData['add_by'];
	
	//button like

	if(isset($_POST['like']))
	{
		$totalLikes++;
		$totalISerLike ++;
		$updated = $conn->prepare("update posts set likes = ? where id = ?");
		$updated->execute(array($totalLikes,$post_id));
		$userLikeUpdate = $conn->prepare("update users set num_likes = ? where username = ?");
		$userLikeUpdate->execute(array($totalISerLike,$added_by));
		$insertIntoLikes = $conn->prepare("insert into likes values('',?,?)");
		$insertIntoLikes->execute(array($data['username'],$post_id));
		header('Location: ' . $_SERVER['HTTP_REFERER']);	}
		if(isset($_POST['dislike']))
		{
			$totalLikes--;
			$totalISerLike --;
			$updated = $conn->prepare("update posts set likes = ? where id = ?");
			$updated->execute(array($totalLikes,$post_id));
			$userLikeUpdate = $conn->prepare("update users set num_likes = ? where username = ?");
			$userLikeUpdate->execute(array($totalISerLike,$added_by));
			$insertIntoLikes = $conn->prepare("delete from  likes where username = ? and post_id = ?");
			$insertIntoLikes->execute(array($data['username'],$post_id));
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

//check if previous like 
// if user who login like post then button will be blue else will be white
		$sql1 = $conn->prepare("select * from likes where username = ? and post_id = ?");
		$sql1->execute(array($data['username'],$post_id));
		$sql1Fetch = $sql1->fetch();

		if($sql1->rowCount()>0)
		{
		// he  like this post

			echo "
			<li>
			<form action='likes.php?post_id=".$post_id."' method='POST' >


			<button style=' width: 100px;
			background: #fff;
			height: 48px;
			color: #777;' type='submit' class='btn  btn-lg' id = 'dislike' name='dislike'>	 <img style='width:25px' src='assetWebsite/images/hearts.svg'> $totalLikes <span style='font-size:14px'>likes</span>	 </button>


			</form>
			</li>

			";

		}
		else
		{

			echo "
			<li>
			<form action='likes.php?post_id=".$post_id."' method='post' >

			<button style=' width: 100px;
			background: #fff;
			height: 48px;
			color: #777;'type='submit' type='submit' class='btn btn-lg' id = 'like' name='like'>		<i class='ti-heart'></i> $totalLikes<span style='font-size:14px'> likes</span></button>

			</form>
			</li>

			";
		}
	}
