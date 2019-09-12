<?php 
session_start();
include "helper/init.php";
include "classes/users.php";
include "classes/posts.php";
// if user login fetch his data here else redirect to login oage

if(!$_SESSION["NoBack"]|| !$_SESSION["email"])
{
	header("location:login.php");
}
else
{
	$sql = $conn->prepare("select * from users where email = ?");
	$sql->execute(array($_SESSION["email"]));
	$data = $sql->fetch();
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$post_id  = $_POST["post_id"];
	$sql = $conn->prepare("select * from comments where post_id= ? ");
	$sql->execute(array($post_id));
	$rows = $sql->fetchAll();

	foreach ($rows as $row) {



		// date

		$time_now = date('Y-m-d H:i:s');
					$start_date = new datetime($row['date_added']); // Time of Post
					$end_date = new datetime($time_now); ////rime now
					$user= new users($conn,$row['comment_by']);
					$img  = $user->profileImg();
					$fullName = $user->full_name();
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

					echo "
					<li>
					<div class='comet-avatar'>
					<img class='img-md-45 img-sm-35' src='$img'  >

					</div>
					<div class='we-comment'>
					<div class='coment-head'>
					<h5><a href='time-line.html' title=''>". $fullName .

					"</a></h5>
					<span>".$time_message."</span>
					<a class='we-reply' href='#'' title='Reply'><i class='fa fa-reply'></i></a>
					</div>
					<p>". $row['comment_body']."</p>
					</div>

					</li>
					";
				}
			}

			?>
