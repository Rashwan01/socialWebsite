<?php 
include "userAuth.php";


//someone search about profile
$username = '';

$isfollow  = "false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_to =$_POST['user_to'];
	if(isset($_POST['add']))
	{
		$userob = new users($conn,$data['username']);
		$userob->sendRequest($user_to);
		header("location:profile.php?q=$user_to");
	}elseif(isset($_POST['cancel']))
	{
		$userob = new users($conn,$data['username']);
		$userob->cancelRequest($user_to);
		header("location:profile.php?q=$user_to");
	}
	elseif(isset($_POST['remove']))
	{
		$userob = new users($conn,$data['username']);
		$userob->removeFriend($user_to);
		header("location:profile.php?q=$user_to");
	}
	elseif(isset($_POST['respond']))

	{
		//add friend to array list of login user
		$AddFriend = $conn->prepare("update  users set friends_array = concat(friends_array,'$user_to,') where username = ?");
		$AddFriend->execute(array($data['username']));
		//add friends who revieved request in array list of send user
		$AddFriend = $conn->prepare("update  users set friends_array = concat(friends_array,?) where username = ?");
		$AddFriend->execute(array($data['username'].",",$user_to));
		$deleteReq = $conn->prepare("delete from friendReq where user_to = ? and user_from = ?");
		$deleteReq->execute(array($data['username'],$user_to));
		header("location: profile.php?q=$user_to");
	}

}
if(isset($_GET['q']))
{
	$username = $_GET['q'];
	$sql =  $conn->prepare("select * from users where username = ?");
	$sql-> execute(array($username));
	if($sql->rowCount()>0)
	{


		//if link q= "username" not equal to username who sign in 
		if($username != $data['username'])
		{

			$UserpPofile = $conn->prepare("select * from users where username = ?");
			$UserpPofile->execute(array($username));
			$dataUserProfile = $UserpPofile->fetch();
			$friendIconStatus = true;
			$editCover = false;
			$editPic = false;
			$write_post = false;
			$user = new users($conn,$data['username']);
			$isfollow = $user->isFollowing($_GET['q']);

			$mutual_frends =  $user->mautualFriends($username);
			//mutaulUSerInfo() responsible for collect data and put it inside div and return count
			$countFriends =  $user->mutaulUSerInfo($mutual_frends);

			$userobj = new users($conn,$data['username']);
			if($userobj->isFriend($username))
			{

				$friendIconStatus = "remove";
				$write_post = true;
			}elseif($userobj->didrecievedReq($username))
			{
				$friendIconStatus = "respond";

			}
			elseif($userobj->didsendReq($username))
			{
				$friendIconStatus = "sent";
			}
			else{
				$friendIconStatus = "add";
			}
		}
		else{
	//login user want to go to his profile
			$username =$data['username'];
			$isfollow  = "false";
			$UserpPofile = $conn->prepare("select * from users where username = ?");
			$UserpPofile->execute(array($username));
			$dataUserProfile = $UserpPofile->fetch();
			$friendIconStatus = false;
			$editCover = true;
			$editPic = true;
			$write_post = true;
		}

	}
	else{
		header("location:404Error.php");

	}

}		else{
//login user want to go to his profile
	$username =$data['username'];
	$UserpPofile = $conn->prepare("select * from users where username = ?");
	$UserpPofile->execute(array($username));
	$dataUserProfile = $UserpPofile->fetch();
	$friendIconStatus = false;
	$editCover = true;
	$editPic = true;
	$write_post = true;

}




$user = new users($conn,$data['username']);
if($user->isBlocked($username) == "false")
{


	?>
	<div class="fixed-sidebar left">
		<div class="menu-left">
			<ul class="left-menu">
				<li><a href="dashboard.php" title="Newsfeed Page" data-toggle="tooltip" data-placement="right"><i class="ti-magnet"></i></a></li>
				<li><a href="profile.php" title="Your Profile" data-toggle="tooltip" data-placement="right"><i class="ti-user"></i></a></li>
				<li><a href="edit-profile-basic.php" title="settings page" data-toggle="tooltip" data-placement="right"><i class="ti-settings"></i></a></li>


				<li><a href="continueTochat.php" title="Messages" data-toggle="tooltip" data-placement="right"><i class="ti-comment-alt"></i></a></li>

				<li><a href="friendReq.php" title="friend Request" data-toggle="tooltip" data-placement="right"><i class="ti-light-bulb"></i></a></li>
				<li><a href="logout.php" title="logout" data-toggle="tooltip" data-placement="right"><i class="ti-power-off"></i></a></li>


			</ul>
		</div>
	</div>
	<section class="coverege">
		<div class="feature-photo">
			<figure claas='cover-holder' style="background:url(<?php  echo  $dataUserProfile['cover_url'] ?>) no-repeat center center ;    width: 100%;
			background-size: cover;"></figure>
			<div class="add-btn">
				<span  class="countFriends">
					<?php  if(isset($countFriends)){
						echo $countFriends ." Mutaul Friends";
					}?>

				</span>

				<form class="d-none d-md-block" style="display:inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
					<?php 
					if($friendIconStatus === "sent")
					{
						?>
						<button type="submit"  class="btn btn-success " name = "cancel">cancel Request</button>
						<input type="hidden" name="user_to"  value ="<?php echo $username?>">
						<?php 
					}elseif($friendIconStatus === "respond")
					{?>

						<button type="submit" class="btn btn-warning" name = "<?php echo $friendIconStatus; ?>"><?php echo $friendIconStatus; ?></button>
						<input type="hidden" name="user_to" value ="<?php echo $username?>">

					<?php }
					elseif($friendIconStatus === "remove")
						{?>

							<button type="submit" class="btn btn-danger" name = "<?php echo $friendIconStatus; ?>">Remove Friend</button>
							<input type="hidden" name="user_to" value ="<?php echo $username?>">

						<?php }
						elseif($friendIconStatus === "add")
							{?>

								<button type="submit" class="btn btn-primary" name = "add">add Friend</button>
								<input type="hidden" name="user_to" value ="<?php echo $username?>">

							<?php }
							?>
						</form>
					</div>
					<?php 
					if($editCover == "true")

						{ ?>
							<form method = "POST" action="upload.php" enctype="multipart/form-data" id='formSubmitCover' class="edit-phto">
								<i class="fa fa-camera-retro"></i>

								<label class="fileContainer">
									Edit
									<input type="file" id="imageCover" name="avatar" style="width:200px; height:30px; " />
									<input type="hidden"  name = 'profile_cover' value="Submit" style="width:85px; height:25px;" />
								</label>
							</form>
						<?php  } ?>
						<div class="container-fluid">
							<div class="row merged">
								<div class="col-lg-2 col-sm-12">
									<div class="user-avatar">
										<figure>
											<img  src="<?php echo $dataUserProfile['profile_pic'] ?>" alt="">
											<?php 
											if($editPic == "true")

												{ ?>
													<form
													action="upload.php" method="POST"
													enctype="multipart/form-data" id ="formSubmitProfile" class="edit-phto">
													<i class="fa fa-camera-retro d-sm-block"></i>
													<label class="fileContainer profile-pic">
														Edit Display Photo
														<input type="file" name="avatar" id ="imageProfile"/>
														<input type="hidden"  name = 'profile_pic' value="Submit" style="width:85px; height:25px;" />
													</label>
												</form>

											<?php  } ?>
										</figure>

									</div>

								</div>

							</div>
						</div>
					</div>
				</section><!-- top area -->
				<?php


				include "profileIndex.php";
			}elseif($user->isBlocked($username)){

				header("location:404Error.php");
			}

			include "view/footer.php"; ?>

