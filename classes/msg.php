<?php

class msg
{
	private $con ;
	private $data;
	// on calling class we will conntect with databases and give him usersname for som eone then assign variable con with con inside constructor then data will be an object from user class give it con and user so we go to user class which its constructor will fetch all data from users where username seneded

	//then data contain all data in which related with logging user
	function __construct($con,$username)
	{
		$this->con = $con;
		$this->data = new users($con,$username);


	}

	public function getLastImg(){
		$usernameloggin = $this->data->username();
		$friends_array = $this->data->friends_array();
		$friends_array =explode(',',$friends_array);
		$str = '';
		foreach ($friends_array as $i) {
			$sql= $this->con->prepare("select * from  msg where
				(user_from ='$usernameloggin' && user_to = '$i') or (user_from ='$i' && user_to = '$usernameloggin') order by id desc	 limit 1
				");

			$sql->execute();
			$fetchedData = $sql->fetch();
			$count = $sql->rowCount();
			if($count>0)
			{			

				$last_msg = $fetchedData['body'];
				$last_msg = subStr($last_msg ,0,25).".";
				$last_msgData = $fetchedData['date'];
				$friendInfo = new users($this->con,$i);
				$friend_img = $friendInfo->profileImg();
				$friends_name = $friendInfo->full_name();
				$friends_username = $friendInfo->username();
				$time = convertTime($last_msgData);

				$str .= "<a  href='#list-chat' class='filterDiscussions all unread single list-chat-once ' id='list-chat-list' data-toggle='list' role='tab'>
				<input type='hidden' name ='user_to' value ='$friends_username'> 
				<img class='avatar-md' src='$friend_img' data-toggle='tooltip' data-placement='top' title='Janette' alt='avatar'>
				<div class='status'>
				<i class='material-icons online'>fiber_manual_record</i>
				</div>
				<div class='new bg-yellow'>
				<span>+7</span>
				</div>
				<div class='data'>
				<h5>$friends_name</h5>
				<span>$time	</span>
				<p>$last_msg</p>
				</div>
				</a>			";
			}
		}
		echo $str;
	
	}
	public function GetMesgs($user_to){
		$loginUser = $this->data->username();
		$sql = $this->con->prepare("select * from msg where (user_to = '$loginUser' && user_from = '$user_to') or
			(user_to = '$user_to' && user_from = '$loginUser') order by id

			");
		$sql->execute();
		$fetchedData= $sql->fetchAll();
		$count = $sql->rowCount();
		if($count > 0 )

		{
			return $fetchedData;
		}
		echo "no have message";
	}
}
?>
