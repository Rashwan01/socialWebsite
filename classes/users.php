<?php
class users{

	private $con ;
	private $data;
	/*
**  on calling class  connect with db and pass username
** fetch data  has related with its username in variable $data

	*/
function __construct($con,$username)
{
	$this->con = $con;
	$sql = $con->prepare("select * from users where username = ?");
	$sql->execute(array($username));
	$this->data = $sql->fetch();


}
	/*
     ** return username after fetch data from Construct
	*/
	public function username(){
		return $this->data['username'];

	}
	public function profileImg(){

		return $this->data['profile_pic'];
	}
	public function getNumPosts(){
		$username = $this->data['username'];
		$sql = $this->con->prepare("select num_posts from users where username = ?");
		$sql->execute(array($username));
		$rows = $sql->fetch();
		return $rows['num_posts'];
	}
	/*
     
        ** return fname , lname after fetch data from Construct
	*/
	public function full_name(){
		$username = $this->data['username'];
		$sql = $this->con->prepare("select fname,lname from users where username = ?");
		$sql->execute(array($username));
		$rows = $sql->fetch();
		return $rows['fname']." ". $rows['lname'];


	}
	public function About(){

		$username = $this->data['username'];
		$sql = $this->con->prepare("select about from users where username = ?");
		$sql->execute(array($username));
		$rows = $sql->fetch();
		return $rows['about'];
	}
	public function isFriend($username){
		
		$userFriendComma = ",".$username. ","; 
		$followFriendComma = ",".$username. ",";
		if(strstr($this->data['friends_array'], $userFriendComma) || $username == $this->data['username'])
		{
			return true;
		}
		return false;
		
	}
	public function isFriendOrFollowMe($username){
		$userFriendComma = ",".$username. ","; 
		$followFriendComma = ",".$username. ",";
		if(strstr($this->data['friends_array'], $userFriendComma) || $username == $this->data['username']||(strstr($this->data['following'], $followFriendComma)))
		{
			return true;
		}
		return false;
		
	}
	public function passwordIsValid($ISInvalidPassword){
		$ISInvalidPassword = md5($ISInvalidPassword);
		$username = $this->data['username'];
		$sql = $this->con->prepare("select password from users where username = ?");
		$sql->execute(array($username));
		$fetchedData = $sql->fetch();
		if ($fetchedData['password'] ===$ISInvalidPassword) {
			return "true";
		}
		return "false";
		
	}
	public function addFollow($followTo){
		//
		$username = $this->data['username'];
		$follownigArr = $this->data['following'];
		$follownigArr = $follownigArr."$followTo,";		
		$sqli = $this->con->prepare("update users set following = ? where username = ?");
		$sqli->execute(array($follownigArr,$username));


		//add You as followes in friends list list
		$followers = $this->con->prepare("select followers from users where username = ?");
		$followers->execute(array($followTo));
		$fetchedDatafollowers = $followers->fetch();
		$follownigArr = $fetchedDatafollowers['followers'];
		$follownigArr = $follownigArr."$username,";
		$sqli = $this->con->prepare("update users set followers = ? where username = ?");
		$sqli->execute(array($follownigArr,$followTo));
		if($sqli)
		{
			return true;
		}
	}
	public function isFollowing($user){

		$username = $this->data['username'];
		$arr = $this->data['following'];
		$arr = explode(",",$arr);
		foreach ($arr as $i) {
			if($i ==$user)
			{
				return "true";
			}
		}
		return "false";

	}
	public function removeFollow($followTo){
		//username belogn to login user
		$username = $this->data['username'];
		//delete follow to custom user
		$newArr = str_replace($followTo . ",", "", $this->data['following']);
		$sql = $this->con->prepare("UPDATE users SET following='$newArr' WHERE username='$username'");
		$sql->execute();

// delete me from followers  his user
		$sql = $this->con->prepare("select followers from users where username = '$followTo'");
		$sql->execute();
		$followToData = $sql->fetch();
		$followToFollowers = $followToData['followers'];
		$newArr = str_replace($username . ",", "", $followToFollowers);
		$sql =$this->con->prepare("UPDATE users SET followers='$newArr' WHERE username='$followTo'");
		$sql->execute();
		
		

		
	}
	public function BlockUser($user){
	//
		$username = $this->data['username'];
		$block_friends = $this->data['block_friends'];
		echo $block_friends;
		$block_friends = $block_friends."$user".",";		
		$sqli = $this->con->prepare("update users set block_friends = ? where username = ?");
		$sqli->execute(array($block_friends,$username));
		
	}
	public function isBlocked($user){
// check if me block him then can see page
		$username = $this->data['username'];
		$arr = $this->data['block_friends'];
		$arr = explode(",",$arr);
		foreach ($arr as $i) {
			if($i ==$user)
			{
				return "true";
			}
		}

// if him make tom me block cant see page
		$sql = $this->con->prepare("select block_friends from users where username = ?");
		$sql->execute(array($user));
		$rows = $sql->fetch();
		$arr = $rows['block_friends'];
		$arr = explode(",",$arr);
		foreach ($arr as $i) {
			if($i ==$username)
			{
				return "true";
			}
		}
		return "false";

	}


	public function unBlock($user){

		$logged_in_user = $this->data['username'];
		$Arr = str_replace($user . ",", "", $this->data['block_friends']);
		$remove_friend = $this->con->prepare( "UPDATE users SET block_friends='$Arr' WHERE username='$logged_in_user'");
		$remove_friend->execute();
		return true;
	}
	public function blockingUser(){
		$username = $this->data['username'];
		$str = "";
		$sql = $this->con->prepare("select block_friends from users where username = ?");
		$sql->execute(array($username));
		$rows = $sql->fetch();
		$arr = $rows['block_friends'];
		$arr = explode(",",$arr);
		foreach ($arr as $i) {
			if($i != "")

			{
				$user = new users($this->con,$i);
				$img = $user->profileImg();
				$fullname = $user->full_name();
				$username = $user->username();

				$str .= "				<li>
				<figure>
				<img class='img-sm-45 img-md-60' src='$img' alt=''>

				</figure>
				<div class='friendz-meta'>
				<a href='time-line.html'>$fullname</a>

				</div>
				<form  class = 'unblockingForm' action='unblock.php'  method='post'>
				<input type='hidden' name='unblock-user' value='$username'>
				<button  class= 'unblockingIcon unblockmsg' type='submit' > Tap To unblock</button>
				</form>
				</li>";

			}
		}
		if(!empty($str))
		{
			echo  $str;;

		}
		else
		{
			echo "<p> You Have Not Blocking anyone</p>";
		}
	}
	public function  isClosed(){
		$username = $this->data['username'];
		$sql = $this->con->prepare("select user_closed from users where username = ?");
		$sql->execute(array($username));
		$row = $sql->fetch();
		if($row['user_closed'] == "yes")
		{
			return true;
		}
		return false;
	}
	public function didrecievedReq($userfrom){
		$userto = $this->data['username'];
		$sql = $this->con->prepare("select * from friendReq where user_to = ? and user_from = ?");
		$sql->execute(array($userto,$userfrom));
		if ($sql->rowCount()>0)
		{
			return true;
		}else

		return false;
	}

	public function didsendReq($userto){
		$userfrom = $this->data['username'];
		$sql = $this->con->prepare("select * from friendReq where user_to = ? and user_from = ?");
		$sql->execute(array($userto,$userfrom));
		if ($sql->rowCount()>0)
		{

			return true;
		}
		return false;
	}


	public function removeFriend($removedUSer) {
		$logged_in_user = $this->data['username'];

		$query = $this->con->prepare("SELECT friends_array FROM users WHERE username='$removedUSer'");
		$query->execute();
		$row = $query->fetch();
		//fetch  friend list  which belogn to user who will be removed
		$friend_array_username = $row['friends_array'];
// user login remove user [$removedUSer] from its friend list
		$new_friend_array = str_replace($removedUSer . ",", "", $this->data['friends_array']);
		$remove_friend = $this->con->prepare( "UPDATE users SET friends_array='$new_friend_array' WHERE username='$logged_in_user'");
		$remove_friend->execute();
// user  who will be removed  [$removedUSer] remove user login from its friend list
		$new_friend_array = str_replace($this->data['username'] .",", "", $friend_array_username);
		$remove_friend =$this->con->prepare("UPDATE users SET friends_array='$new_friend_array' WHERE username='$removedUSer'");
		$remove_friend->execute();
	}

	public function sendRequest($user_to) {
		$user_from = $this->data['username'];
		$time_now = date('Y-m-d H:i:s');
		$query = $this->con->prepare("INSERT INTO friendReq VALUES('', '$user_to', '$user_from','$time_now')");
		$query->execute();
	}

	public function cancelRequest($user_to) {
		$user_from = $this->data['username'];
		$query = $this->con->prepare("delete from  friendReq where user_to = '$user_to' and user_from = '$user_from' ");
		$query->execute();
	}
	public function mautualFriends($username_Check){
		$mautual = 0;

		$userlogginList = explode(',',$this->data['friends_array']);


		$sql = $this->con->prepare("select friends_array  from users where username= ?");
		$sql->execute(array($username_Check));
		$data= $sql->fetch();
		$arr = [];
		$anotherUserList = explode(',',$data['friends_array']);	



		foreach ($userlogginList as $i ) {


			foreach ($anotherUserList as $j ) {

				if($i ==$j && $i != "")
				{
					$mautual++;
					$arr [] =$i;
				}
			}


		}

		return $arr;
	}

	public function mutaulUSerInfo($arr){
		$mutual= "";
		$count = 0;
		if(!empty($arr))
		{

			foreach ($arr as $i) {
				$user = new users($this->con,$i);
				$fullname = $user->full_name();
				$username = $user->username();
				$pic = $user->profileImg();
				$count++;
				$mutual .= "
				<a href='profile.php?q=$username'>
				<div class='box'>
				<img src= '$pic'>
				<p class='mutual-name'> $fullname</p>
				</div>
				</a>
				";
			}
			$container = "<div class='container sidebar'>
			<div class='holder ds-none widget'>
			<i class='ti-close'></i>
			<h4 class='widget-title mutual'><span style='margin: 0px 5px 0 0;font-size: 90%;' class='badge badge-primary'>$count</span>mutaul friend</h4>
			$mutual

			</div></div>";

			echo $container;

			return $count;
		}

	}
	public function allFriends(){
		$str= "";
		$userlogginList = explode(',',$this->data['friends_array']);

		return $userlogginList;



	}
	public function friends_array(){

		return $this->data['friends_array'];
	}

	public function friendList(){
		$userlogginList = explode(',',$this->data['friends_array']);
		$str ="";
		if(!empty($userlogginList))
		{

			foreach ($userlogginList as $i) {
				if($i !="")
				{
					$followersInfo = new users($this->con,$i);
					$friend_img = $followersInfo->profileImg();
					$friends_name = $followersInfo->full_name();
					$friends_username = $followersInfo->username();
					$friend_about = subStr($followersInfo->About(),1,25)."...";
					$str .= "

					<li>
					<div class='nearly-pepls'>
					<figure>
					<a href='profile.php?q=$friends_username'  title=''><img  class='avatar-md img-md-60 img-sm-45'src='$friend_img' alt=''></a>
					</figure>
					<div class='pepl-info'>
					<h4><a class='friend-name' style='    width: 127px;' title=''>$friends_name</a></h4>
					<span>$friend_about</span>
					<a href='#' title='' class='add-butn more-action' data-ripple=''>unfriend</a>
					<a href='#' title='' class='add-butn ' data-ripple=''>block</a>

					</div>
					</div>
					</li>";
				}
			}

		}
		echo $str;
	}




	public function followersList(){
		$userlogginList = explode(',',$this->data['followers']);
		$str ="";
		if(!empty($userlogginList))
		{

			foreach ($userlogginList as $i) {
				if($i !="")
				{
					$followersInfo = new users($this->con,$i);
					$follower_img = $followersInfo->profileImg();
					$follower_name = $followersInfo->full_name();
					$follower_username = $followersInfo->username();
					$str .= "

					<li>
					<div class='nearly-pepls'>
					<figure>
					<a href='profile.php?q=$follower_username'  title=''><img  class='avatar-md img-md-60 img-sm-45'src='$follower_img' alt=''></a>
					</figure>
					<div class='pepl-info'>
					<h4><a class='friend-name' title=''>$follower_name</a></h4>
					<span>...</span>

					</div>
					</div>
					</li>";
				}
			}

		}
		if(empty($str))
		{
			echo "<p> You Have No Followers</p>";
		}

		echo $str;
	}
	public function allFriendsLoad (){

		$str= "<!-- Start of Contacts -->
		<div class='tab-pane fade' id='members'>
		<div class='search'>
		<form class='form-inline position-relative'>
		<input type='search' class='form-control' id='people' placeholder='Search for people...'>
		<button type='button' class='btn btn-link loop'><i class='material-icons'>search</i></button>
		</form>
		<button class='btn create' data-toggle='modal' data-target='#exampleModalCenter'><i class='material-icons'>person_add</i></button>
		</div>
		<div class='list-group sort'>
		<button class='btn filterMembersBtn active show' data-toggle='list' data-filter='all'>All</button>
		<button class='btn filterMembersBtn' data-toggle='list' data-filter='online'>Online</button>
		<button class='btn filterMembersBtn' data-toggle='list' data-filter='offline'>Offline</button>
		</div>						
		<div class='contacts'>
		<h1>Contacts</h1>";
		$userlogginList = explode(',',$this->data['friends_array']);
		if(!empty($userlogginList))
		{

			foreach ($userlogginList as $i) {
				if($i !="")
				{
					$followersInfo = new users($this->con,$i);
					$friend_img = $followersInfo->profileImg();
					$friends_name = $followersInfo->full_name();
					$friends_username = $followersInfo->username();


					$str .= "
					<div class='list-group contact-friends-converter' id='contacts' role='tablist'>
					<a href='#' class='filterMembers all online contact' data-toggle='list'>
					<input type='hidden'  name='user_to' value = '$friends_username'>
					<img class='avatar-md' src='$friend_img' data-toggle='tooltip' data-placement='top' title='Janette' alt='avatar'>
					<div class='status'>
					<i class='material-icons online'>fiber_manual_record</i>
					</div>
					<div class='data'>
					<h5>$friends_name</h5>
					<p>$friends_username</p>
					</div>
					<div class='person-add'>
					<i class='material-icons'>person</i>
					</div>
					</a>

					</div>

					<!-- End of Contacts -->";
				}

			}
			$str .="


			</div>
			</div>

			<script>
			$('.contact-friends-converter').on('click',function(){

						$('#sidebar').hide();
						var msg_to =  $(this).find('input[name=user_to]').val();
						console.log(msg_to);
						$.ajax({

							url:'message.php',
							data:'user_to='+msg_to,
							type:'post',
							success:function(data){
								$('#chatoo').html(data);
								},
								});

								});

								</script>
								";
								echo $str;
							}
						}

					}



					?>
