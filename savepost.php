     
<?php 
session_start();
ob_start();
include "helper/init.php";
include "view/header.php";
include "classes/users.php";
include "classes/posts.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{


	if(isset($_POST['post']))
	{
		if(isset($_FILES['post_img']) && !empty($_FILES['post_img']['name']) )
		{

			$avatarName = $_FILES["post_img"]['name'];
			$avatarType = $_FILES["post_img"]['type'];
			$avatarTemp = $_FILES["post_img"]['tmp_name'];
			$avatarSize= $_FILES["post_img"]['size'];
			$strings = explode('.', $avatarName);
			$reqExten =  strtolower(end($strings) );
			$ALLOW_EXTEN = array("jpeg","png","jpg","gif");
			$STORAGE = '';
			if(in_array($reqExten,$ALLOW_EXTEN))
			{
				$STORAGE ="assetWebsite/images/post_img/".rand(0,100000) . $avatarName;
				move_uploaded_file($avatarTemp  ,$STORAGE);
			}
			if(strLen($_POST['post-body']) != "")
			{


				$post_obj = new posts($conn,$data[ 'username']);
				$post_obj->send_post($_POST['post-body'],'none',$STORAGE);
				header("location:dashboard.php");


			}else
			{

				$post_obj = new posts($conn,$data[ 'username']);
				$post_obj->send_post("","none",$STORAGE);
				header("location:dashboard.php");
			}

		}

		elseif(strLen($_POST['post-body']) != "")
		{
			$post_obj = new posts($conn,$data[ 'username']);
			$post_obj->send_post($_POST['post-body'],"none","none");

			echo "post not empty";

			header("location:dashboard.php");


		}
		else
		{
			header("location:dashboard.php");
		}
	}


	else if(isset($_POST['postFprofile']))
	{

		$user_to = 'none';
		if($_POST['user_to'] != "none")
		{
			$user_to = $_POST['user_to'];
		}
		if(isset($_FILES['post_img']) && !empty($_FILES['post_img']['name']) )
		{

			$avatarName = $_FILES["post_img"]['name'];
			$avatarType = $_FILES["post_img"]['type'];
			$avatarTemp = $_FILES["post_img"]['tmp_name'];
			$avatarSize= $_FILES["post_img"]['size'];
			$strings = explode('.', $avatarName);
			$reqExten =  strtolower(end($strings) );
			$ALLOW_EXTEN = array("jpeg","png","jpg","gif");
			$STORAGE = '';
			if(in_array($reqExten,$ALLOW_EXTEN))
			{
				$STORAGE ="assetWebsite/images/post_img/".rand(0,100000) . $avatarName;
				move_uploaded_file($avatarTemp  ,$STORAGE);
			}
			if(strLen($_POST['post-body']) != "")
			{


				$post_obj = new posts($conn,$data[ 'username']);
				$post_obj->send_post($_POST['post-body'],$user_to,$STORAGE);
				header("location:dashboard.php");


			}else
			{

				$post_obj = new posts($conn,$data[ 'username']);
				$post_obj->send_post("",$user_to,$STORAGE);
				header("location:dashboard.php");
			}

		}

		elseif(strLen($_POST['post-body']) != "")
		{
			$post_obj = new posts($conn,$data[ 'username']);
			$post_obj->send_post($_POST['post-body'],$user_to,"none");

			echo "post not empty";

			header("location:dashboard.php");


		}
		else
		{
			header("location:dashboard.php");
		}












		/*  */
		if($user_to =="none")
		{
			header("location:profile.php");

		}else{

			header("location:profile.php?q=$user_to");
		}
	}

}

?>
