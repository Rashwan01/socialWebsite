


<?php
class posts{

	private $con ;
	private $data;
	// on calling class we will conntect with databases and give him usersname for som eone then assign variable con with con inside constructor then data will be an object from user class give it con and user so we go to user class which its constructor will fetch all data from users where username seneded

	//then data contain all data in which related with logging user
	function __construct($con,$username)
	{
		$this->con = $con;
		$this->data = new users($con,$username);


	}
	public function send_post($body,$userTo,$img)
	{
				// check if body has  just string  
		$body = filter_var($body,FILTER_SANITIZE_STRING);
		$date_added = date('Y-m-d H:i:s');
		$added_by = $this->data->username();

			/*
			   ** has reated to mentions in post from profile only
			*/
			if($added_by == $userTo)
			{
				$userTo = 'none';
			}
			
		/*
			** 1- if user upload image validate it and check if extentions is allowed  
			** 2- then we have to option body empty or write in body according to conditions insert into databases
			**3- else if user no upload image check if body is not empty then insert data into databaes
		*/
			if($img !== "none")
		{// there is   img

			if(strLen($body) >0)
			{
			//there is text
			// insert post
				$sql = $this->con->prepare("insert into posts values('',?,?,?,?,'no','no',0,'$img')");
				$sql->execute(array($body,$added_by,$userTo,$date_added));
					//update num of post
				$num_posts = $this->data->getNumPosts();
				$num_posts = $num_posts+1;
				$sql = $this->con->prepare('UPDATE users SET num_posts = ? WHERE username =? ');
				$sql->execute(array($num_posts,$added_by));

			}
			elseif(empty($body))
			{
				$sql = $this->con->prepare("insert into posts values('',?,?,?,?,'no','no',0,'$img')");
				$sql->execute(array($body,$added_by,$userTo,$date_added));
					//update num of post
				$num_posts = $this->data->getNumPosts();
				$num_posts = $num_posts+1;
				$sql = $this->con->prepare('UPDATE users SET num_posts = ? WHERE username =? ');
				$sql->execute(array($num_posts,$added_by));

			}

		} /* end check if img is uploaded or not if not go down */
		elseif(strLen($body) >0)
		{
			//there is text
			// insert post
			$sql = $this->con->prepare("insert into posts values('',?,?,?,?,'no','no',0,'none')");
			$sql->execute(array($body,$added_by,$userTo,$date_added));
					//update num of post
			$num_posts = $this->data->getNumPosts();
			$num_posts = $num_posts+1;
			$sql = $this->con->prepare('UPDATE users SET num_posts = ? WHERE username =? ');
			$sql->execute(array($num_posts,$added_by));

		}
		
	}


	public function loadPostFriends(){
				//used beside your comment
		$picLogginUser = $this->data->profileImg();

				//$page = $data['page']; 
		$userLoggedIn = $this->data->username();
/*
				if($page == 1) 
					$start = 0;
				else 
					$start = ($page - 1) * $limit;
*/

					$str = '';
				//collected all posts and oreder it by id
					$sql = $this->con->prepare("select * from posts where deleted ='no' order by id desc");	
					$sql->execute();	
					$rows = $sql->fetchAll();
					$numofrow = $sql->rowCount();


					if($numofrow>0)
					{
				$num_iterations = 0; //Number of results checked (not necasserily posted)
				
				$count = 1;

				//show it 
				foreach ($rows as $row) 
				{
					$id = $row['id'];
					$body = $row['body'];
					$added_by = $row['add_by'];
					$date_added = $row['date_added'];
				// if post user_to column is none there is mean that  ordianl post not shared with anyone
					if ($row['user_to'] =='none')
					{
						$user_to = '';
					}
				// else  take it and search about him in users table if find it give my his full name and make it in anchor tag ^_^
					else{
						$user_info = new users($this->con,$row['user_to']);
						$fullname = $user_info->full_name();
						$user_to = "to <a href='" . $row['user_to'] ."'>" . $fullname . "</a>";

					}
					$userlogin  = new users($this->con,$userLoggedIn);
					$userFreinds = new users($this->con,$added_by);
					if(($userlogin->isFriendOrFollowMe($added_by) && $userlogin->isBlocked($added_by) == 'false')&&
						($userFreinds->isFriendOrFollowMe($userlogin->username()) && $userFreinds->isBlocked($userlogin->username()) == 'false'))
					{

				//check if user eho posted its account s cloese
						$add_by = new users($this->con,$added_by);
						if($add_by->isClosed())
						{
							continue;
						}
					/*
					if($num_iterations++ < $start)
						continue; 


					//Once 10 posts have been loaded, break
					if($count > $limit) {
						break;
					}
					else {
						$count++;
					}
*/
					$sql = $this->con->prepare('select * from users where username  =?');	
					$sql->execute(array($added_by));	
					$rows = $sql->fetch();
					$first_name  = $rows['fname'];
					$last_name  = $rows['lname'];
					$email  = $rows['email'];
					$pic  = $rows['profile_pic'];


// date
					$time_now = date('Y-m-d H:i:s');
					$start_date = new datetime($date_added); // Time of Post
					$end_date = new datetime($time_now); ////rime now
					$interval = $start_date->diff($end_date); // diffrence between them










					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . ' year ago'; //1 year ago
						else 
							$time_message = $interval->y . ' years ago'; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = ' ago';
						}
						else if($interval->d == 1) {
							$days = $interval->d . ' day ago';
						}
						else {
							$days = $interval->d . ' days ago';
						}


						if($interval->m == 1) {
							$time_message = $interval->m . ' month'. $days;
						}
						else {
							$time_message = $interval->m . ' months'. $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = 'Yesterday';
						}
						else {
							$time_message = $interval->d . ' days ago';
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . ' hour ago';
						}
						else {
							$time_message = $interval->h . ' hours ago';
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . ' minute ago';
						}
						else {
							$time_message = $interval->i . ' minutes ago';
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = 'Just now';
						}
						else {
							$time_message = $interval->s . ' seconds ago';
						}
					}
					?>


					<script>

						$(function(){
							$.ajax({
								url:"loadComment.php",
								data:"post_id=<?php echo $row['id']; ?>",
								type:"POST",
								success:function(data){
									$(".callAjax<?php echo $count ?>").prepend(data);
								}


							});

							$.ajax({
								url:"likes.php",
								data:"post_id=<?php echo $row['id']; ?>",
								type:"POST",
								success:function(data){
									$(".callAjaxLike<?php echo $count ?>").prepend(data);
								}


							});
						});
						

					</script>



					<?php
					$sql = $this->con->prepare("select * from comments where post_id= ? ");
					$sql->execute(array($row['id']));
					$rows = $sql->fetchAll();
					$countsOfComment =  $sql->rowCount();
					$post_img= "";

					$sqlPost = $this->con->prepare('select * from posts where id = ?');
					$sqlPost->execute(array($id));
					$dataa = $sqlPost->fetch();
					if($dataa['post_img'] !== "none")
					{
						
						$post_img = "<img src= $dataa[post_img] >";
					}
					//check if user_to to every post have value diffrenet about none then show it
					$tags_one = "";
					$with = '';
					$username_tages_to= "";
					if($dataa['user_to'] == "none")
					{
						$tags_one = "";

					}
					else{
						
						$userinfo = new users($this->con,$dataa['user_to']);
						$fullname=$userinfo->full_name();
						$username_tages_to = $userinfo->username();
						$tags_one=$fullname;
						$with = "with";
					}

					// count of comments

					$str.= "<div class='central-meta item'>
					<div class='user-post'>
					<div class='friend-info'>
					<figure>
					<img  class='img-sm-45 img-md-60' src=' $pic' alt=''>
					</figure>
					<div class='friend-name'>
					<ins><a class='post_owner' href='profile.php?q=$added_by' title=''>$first_name $last_name</a> <span id='with'> $with</span><a class='post_owner' href ='profile.php?q=$username_tages_to'> $tags_one </a></ins>
					<span>published: $time_message</span>
					</div>
					</div>
					<div class='description'>

					<p>
					$body

					</p>
					</div>
					<div class='post-meta'>



					$post_img




					<div class='we-video-info'>
					<ul class='callAjaxLike$count'>

					<li>
					<button style=' width: 61px;background: #fff;
					color: #777;' type='submit' class='btn btn-lg'>
					<img src='assetWebsite/images/chat.svg'>
					<span> $countsOfComment</span>

					<span style='font-size:14px'> comments</span>

					</button>
					</span>
					</li>


					</ul>

					</div>
					</div>


					<div class='coment-area'>
					<ul class='we-comet'>
					<li class='callAjax$count' >



					<ul>
					<li class='post-comment'>
					<div class='comet-avatar'>
					<img style=' width:40px;  max-width: 40px;height: 40px;border-radius: 50%;' src='$picLogginUser' alt=''>
					</div>
					<div class='post-comt-box'>
					<form method='post' action='uploadComment.php' class = 'add_comment'>
					<textarea name = 'Comment-Body' placeholder='Post your comment'></textarea>

					<input type='hidden' value = '$id' name='post_id'>
					<input class='btn btn-primary btn-sm'  type='submit' name='submit' value='comment'>
					</form> 
					</div>
					</li>
					</ul>
					</div>
					</div>
					</div>";

					$count ++;

				}
			}
				//end loop

		}
			/*	if($count > $limit) 
			$str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
			<input type='hidden' class='noMorePosts' value='false'>";
			else 
			$str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;'> No more posts to show! </p>";
			*/
			echo $str ;
		}		

		public function YourPost(){
	//used beside your comment
			$picLogginUser = $this->data->profileImg();

				//$page = $data['page']; 
			$userLoggedIn = $this->data->username();
/*
				if($page == 1) 
					$start = 0;
				else 
					$start = ($page - 1) * $limit;
*/

					$str = '';
				//collected all posts and oreder it by id
					$sql = $this->con->prepare("select * from posts where deleted ='no' and add_by = ? or user_to=? order by id desc");	
					$sql->execute(array($userLoggedIn,$userLoggedIn));	
					$rows = $sql->fetchAll();
					$numofrow = $sql->rowCount();


					if($numofrow>0)
					{
				$num_iterations = 0; //Number of results checked (not necasserily posted)
				$count = 1;
				$counter = 1;

				//show it 
				foreach ($rows as $row) 
				{
					// info about post
					$id = $row['id'];
					$body = $row['body'];
					$added_by = $row['add_by'];
					$date_added = $row['date_added'];


					$user_info = new users($this->con,$userLoggedIn);
					//info about user login
					$fullname = $user_info->full_name();
					$img_to = $user_info->profileImg();
					$user_to = "to <a href='" . $row['user_to'] ."'>" . $fullname . "</a>";


// date
					$time_now = date('Y-m-d H:i:s');
					$start_date = new datetime($date_added); // Time of Post
					$end_date = new datetime($time_now); ////rime now
					$interval = $start_date->diff($end_date); // diffrence between them










					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . ' year ago'; //1 year ago
						else 
							$time_message = $interval->y . ' years ago'; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = ' ago';
						}
						else if($interval->d == 1) {
							$days = $interval->d . ' day ago';
						}
						else {
							$days = $interval->d . ' days ago';
						}


						if($interval->m == 1) {
							$time_message = $interval->m . ' month'. $days;
						}
						else {
							$time_message = $interval->m . ' months'. $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = 'Yesterday';
						}
						else {
							$time_message = $interval->d . ' days ago';
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . ' hour ago';
						}
						else {
							$time_message = $interval->h . ' hours ago';
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . ' minute ago';
						}
						else {
							$time_message = $interval->i . ' minutes ago';
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = 'Just now';
						}
						else {
							$time_message = $interval->s . ' seconds ago';
						}
					}
					?>


					<script>

						$(function(){
							$.ajax({
								url:"loadComment.php",
								data:"post_id=<?php echo $row['id']; ?>",
								type:"POST",
								success:function(data){
									$(".callAjax<?php echo $count ?>").prepend(data);
								}


							});

							$.ajax({
								url:"likes.php",
								data:"post_id=<?php echo $row['id']; ?>",
								type:"POST",
								success:function(data){
									$(".callAjaxLike<?php echo $count ?>").prepend(data);
								}


							});
						});
						

					</script>



					<?php
					$sql = $this->con->prepare("select * from comments where post_id= ? ");
					$sql->execute(array($row['id']));
					$rows = $sql->fetchAll();
					$countsOfComment =  $sql->rowCount();
					$post_img= "";

					$sqlPost = $this->con->prepare('select * from posts where id = ?');
					$sqlPost->execute(array($id));
					$dataa = $sqlPost->fetch();
					if($dataa['post_img'] != "none")
					{
						
						$post_img = "<img style = 'border-radius: 6px;
						box-shadow: 4px 7px 9px 2px #eaeaeaea;' src= $dataa[post_img] >";
					}
			//check if user_to to every post have value diffrenet about none then show it
					$tags = "";
					$with = '';
					if($dataa['user_to'] == $this->data->username())
					{
						

						$userTages = new users($this->con,$dataa['add_by']);
						$fullnameTages=$userTages->full_name();
						$imgTages=$userTages->profileImg();
						$tags= $fullnameTages;
						$with = 'with';
					}


					// count of comments

					$str.= "<div class='central-meta item'>
					<div class='user-post'>
					<div class='friend-info'>
					<figure>
					<img class='img-sm-45 img-md-60' src=' $picLogginUser' alt=''>
					</figure>
					<div class='friend-name'>
					
					<ins><a class='post_owner' href='' title=''>$tags</a><span id = 'with'> $with</span> <a class = 'post_owner' href=''>  $fullname</a></ins>
					<span>published: $time_message</span>
					</div>
					</div>
					<div class='description'>

					<p>
					$body

					</p>
					</div>
					<div class='post-meta'>



					$post_img




					<div class='we-video-info'>
					<ul class='callAjaxLike$count'>

					<li>
					<button style='width: 61px;background: #fff;
					color: #777;' type='submit' class='btn btn-lg'>
					<span> $countsOfComment</span>
					
					<img src='assetWebsite/images/chat.svg'>
					</button>
					</span>
					</li>


					</ul>

					</div>
					</div>


					<div class='coment-area'>
					<ul class='we-comet'>
					<li class='callAjax$count' >



					<ul>
					<li class='post-comment'>
					<div class='comet-avatar'>
					<img class='img-md-45 img-sm-35'  src='$picLogginUser' alt=''>
					</div>
					<div class='post-comt-box'>
					<form method='post' action='uploadComment.php' class = 'add_comment'>
					<textarea name = 'Comment-Body' placeholder='Post your comment'></textarea>

					<input type='hidden' value = '$id' name='post_id'>
					<input class='btn btn-primary btn-sm'  type='submit' name='submit' value='comment'>
					</form> 
					</div>
					</li>
					</ul>
					</div>
					</div>
					</div>";

					$count ++;

				}
			}
				//end loop

			/*	if($count > $limit) 
			$str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
			<input type='hidden' class='noMorePosts' value='false'>";
			else 
			$str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;'> No more posts to show! </p>";
			*/
			echo $str ;
		}
		
	}
	

	?>
