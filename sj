


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
	public function send_post($body,$userTo)
	{
				// check if body has  just string  
		$body = filter_var($body,FILTER_SANITIZE_STRING);
				// replace all sapce with nothing
			  //	$checkEmpty = preg_replace('/\s+/', '', $body);
				//if not empty send details
		if(strLen($body) >0)
		{
			$date_added = date('Y-m-d H:i:s');
			$added_by = $this->data->username();
			if($added_by == $userTo)
			{
				$userTo = 'none';
			}

					// insert post
			$sql = $this->con->prepare("insert into posts values('',?,?,?,?,'no','no',0)");
			$sql->execute(array($body,$added_by,$userTo,$date_added));


					//update num of post
			$num_posts = $this->data->getNumPosts();
			$num_posts = $num_posts+1;
			$sql = $this->con->prepare('UPDATE users SET num_posts = ? WHERE username =? ');
			$sql->execute(array($num_posts,$added_by));}}


			public function loadPostFriends(){

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
					if($userlogin->isFriend($added_by))
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


					<script >

						$(function(){
							$.ajax({
								url:"loadComment.php",
								data:"post_id=<?php echo $row['id']; ?>",
								type:"POST",
								success:function(data){
									$(".comment-Ajax").html(data);
								}


							});

						});

					</script>
					<?php

					$str.= "<div class='central-meta item'>
					<div class='user-post'>
					<div class='friend-info'>
					<figure>
					<img  style ='    width: 50px;
					height: 50px;
					border-radius: 50%;
					' src=' $pic' alt=''>
					</figure>
					<div class='friend-name'>
					<ins><a href='time-line.html' title=''>$first_name   $last_name</a></ins>
					<span>published: $time_message</span>
					</div>
					</div>
					<div class='description'>

					<p>
					$body

					</p>
					</div>
					<div class='post-meta'>

					<img src='assetWebsite/images/resources/user-post.jpg' alt=''>
					<div class='we-video-info'>
					<ul>
					<li>
					<span class='views' data-toggle='tooltip' title='views'>
					<i class='fa fa-eye'></i>
					<ins>1.2k</ins>
					</span>
					</li>
					<li>
					<span class='comment' data-toggle='tooltip' title='Comments'>
					<i class='fa fa-comments-o'></i>
					<ins>52</ins>
					</span>
					</li>
					<li>
					<span class='like' data-toggle='tooltip' title='like'>
					<i class='ti-heart'></i>
					<ins>2.2k</ins>
					</span>
					</li>
					<li>
					<span class='dislike' data-toggle='tooltip' title='dislike'>
					<i class='ti-heart-broken'></i>
					<ins>200</ins>
					</span>
					</li>
					<li class='social-media'>
					<div class='menu'>
					<div class='btn trigger'><i class='fa fa-share-alt'></i></div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-html5'></i></a></div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-facebook'></i></a></div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-google-plus'></i></a></div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-twitter'></i></a></div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-css3'></i></a></div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-instagram'></i></a>
					</div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-dribbble'></i></a>
					</div>
					</div>
					<div class='rotater'>
					<div class='btn btn-icon'><a href='#' title=''><i class='fa fa-pinterest'></i></a>
					</div>
					</div>

					</div>
					</li>
					</ul>

					</div>
					</div>


					<div class='coment-area'>
					<ul class='we-comet'>
					<li class='comment-Ajax'>

					comment must be here
					

					<ul>
					<li>
					<a href='#' title='' class='showmore underline'>more comments</a>
					</li>
					<li class='post-comment'>
					<div class='comet-avatar'>
					<img src='assetWebsite/images/resources/comet-1.jpg' alt=''>
					</div>
					<div class='post-comt-box'>
					<form method='post' action='uploadComment.php' class = 'add_comment'>
					<textarea name = 'Comment-Body' placeholder='Post your comment'></textarea>
					<div class='add-smiles'>
					<span class='em em-expressionless' title='add icon'></span>
					</div>
					<div class='smiles-bunch'>
					<i class='em em---1'></i>
					<i class='em em-smiley'></i>
					<i class='em em-anguished'></i>
					<i class='em em-laughing'></i>
					<i class='em em-angry'></i>
					<i class='em em-astonished'></i>
					<i class='em em-blush'></i>
					<i class='em em-disappointed'></i>
					<i class='em em-worried'></i>
					<i class='em em-kissing_heart'></i>
					<i class='em em-rage'></i>
					<i class='em em-stuck_out_tongue'></i>
					</div>
					<input type='hidden' class='post_id' value = '$id' name='post_id'>
					<input  type='submit' name='submit' value='comment'>
					</form> 
					</div>
					</li>
					</ul>




					</div>



					</div>
					</div>";
					

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

		}

		?>
