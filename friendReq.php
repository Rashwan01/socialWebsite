<?Php include "userAuth.php" ?>



<?php 
$sql = $conn->prepare("select * from friendReq where user_to = ?");
$sql->execute(array($data['username']));
$rows = $sql->fetchAll();
$countReq = $sql->rowCount();
$str = " ";
$refresh= true;
if($countReq==0)
{
	$str= "<p>You have No Request Yet</p>";
	$refresh= false;
}
elseif($countReq>0)
{
	foreach ($rows as $row) {
		$reqFrom = $row['user_from'];
		$timeOfReq = $row['date'];

// date
		$time_now = date('Y-m-d H:i:s');
					$start_date = new datetime($timeOfReq); // Time of Post
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
					if($_SERVER['REQUEST_METHOD'] == "POST")
					{

						if(isset($_POST['accept'.$reqFrom]))
						{
							//add friend to array list of login user
							$AddFriend = $conn->prepare("update  users set friends_array = concat(friends_array,'$reqFrom,') where username = ?");
							$AddFriend->execute(array($data['username']));
//add friends who revieved request in array list of send user
							$AddFriend = $conn->prepare("update  users set friends_array = concat(friends_array,?) where username = ?");
							$AddFriend->execute(array($data['username'].",",$reqFrom));
							$deleteReq = $conn->prepare("delete from friendReq where user_to = ? and user_from = ?");
							$deleteReq->execute(array($data['username'],$reqFrom));
							header("location: friendReq.php");

						}
						elseif(isset($_POST['ignore'.$reqFrom]))
						{
							$deleteReq = $conn->prepare("delete from friendReq where user_to = ? and user_from = ?");
							$deleteReq->execute(array($data['username'],$reqFrom));
							header("location: friendReq.php");

						}
					}

					$userInfo = new users($conn,$reqFrom);

					$fullname  = $userInfo->full_name();
					$username = $userInfo->username();
					$pic = $userInfo->profileImg();



					
					$str .= "				<li>
					<div class='nearly-pepls'>
					<figure>
					<a href='time-line.html' title=''><img style='width:50px; height:50px;border-radius:50%' src='$pic' alt=''></a>
					</figure>
					<div class='pepl-info'>
					<h4><a href='profile.php?q=$username' title=''>$fullname</a></h4>
					<span>$time_message</span>
					<form class='mt-5' action = 'friendReq.php' method= 'post'>
					<input class='btn btn-primary' type='submit' name = 'accept$reqFrom' value='Confirm'>
					<input class='btn btn-danger' type='submit' name = 'ignore$reqFrom' value='ignore Request'>

					</form
					</div>
					</div>
					</li>	";
				}
			}
			?>




			<section>
				<div class="gap gray-bg">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="row" id="page-contents">
									<div class="col-lg-3">
										<aside class="sidebar static d-none d-md-block">
											<div class="widget">
												<h4 class="widget-title">Shortcuts</h4>
												<ul class="naves">
													<li>
														<i class="ti-clipboard"></i>
														<a href="newsfeed.html" title="">News feed</a>
													</li>
													<li>
														<i class="ti-mouse-alt"></i>
														<a href="inbox.html" title="">Inbox</a>
													</li>
													<li>
														<i class="ti-files"></i>
														<a href="fav-page.html" title="">My pages</a>
													</li>
													<li>
														<i class="ti-user"></i>
														<a href="timeline-friends.html" title="">friends</a>
													</li>
													<li>
														<i class="ti-image"></i>
														<a href="timeline-photos.html" title="">assetWebsite/images</a>
													</li>
													<li>
														<i class="ti-video-camera"></i>
														<a href="timeline-videos.html" title="">videos</a>
													</li>
													<li>
														<i class="ti-comments-smiley"></i>
														<a href="messages.html" title="">Messages</a>
													</li>
													<li>
														<i class="ti-bell"></i>
														<a href="notifications.html" title="">Notifications</a>
													</li>
													<li>
														<i class="ti-share"></i>
														<a href="people-nearby.html" title="">People Nearby</a>
													</li>
													<li>
														<i class="fa fa-bar-chart-o"></i>
														<a href="insights.html" title="">insights</a>
													</li>
													<li>
														<i class="ti-power-off"></i>
														<a href="landing.html" title="">Logout</a>
													</li>
												</ul>
											</div><!-- Shortcuts -->
											<div class="widget stick-widget">
												<h4 class="widget-title">Profile intro</h4>
												<ul class="short-profile">
													<li>
														<span>about</span>
														<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
													</li>
													<li>
														<span>fav tv show</span>
														<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
													</li>
													<li>
														<span>favourit music</span>
														<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
													</li>
												</ul>
											</div><!-- profile intro widget -->

										</aside>
									</div><!-- sidebar -->
									<div class="col-lg-6">
										<div class="central-meta">
											<div class="frnds">
												<ul class="nav nav-tabs">
													<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a> <span>55</span></li>
													<li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span><?php echo $countReq ?></span></li>
												</ul>

												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active fade show " id="frends" >
														<ul class="nearby-contct" >

															<?php

															$user = new users($conn,$data['username']);
															$add = $user->friendList($user);
															?>

														</ul>
														<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
													</div>
													<div class="tab-pane fade" id="frends-req" >
														<ul class="nearby-contct">


															<?php echo $str ?>
														</ul>	
														<?php  if ($refresh)
														{
															?>
															<button class="btn-view btn-load-more"></button>
														<?php }?>
													</div>
												</div>
											</div>
										</div>	
									</div><!-- centerl meta -->
									<div class="col-lg-3">
										<aside class="sidebar static">
											<div class="widget">
												<h4 class="widget-title">Who's follownig</h4>
												<ul class="followers">
														<?php

															$user = new users($conn,$data['username']);
															$add = $user->followersList($user);
															?>
													
												</ul>
											</div><!-- who's following -->
											<div class="widget friend-list stick-widget d-none d-md-block">
												<h4 class="widget-title">Friends</h4>
												<div id="searchDir"></div>
												<ul id="people-list" class="friendz-list">
													<li>
														<figure>
															<img src="assetWebsite/images/resources/friend-avatar.jpg" alt="">
															<span class="status f-online"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">bucky barnes</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c6b1afa8b2a3b4b5a9aaa2a3b486a1aba7afaae8a5a9ab">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>
														<figure>
															<img src="assetWebsite/images/resources/friend-avatar2.jpg" alt="">
															<span class="status f-away"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">Sarah Loren</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="82e0e3f0ece7f1c2e5efe3ebeeace1edef">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>
														<figure>
															<img src="assetWebsite/images/resources/friend-avatar3.jpg" alt="">
															<span class="status f-off"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">jason borne</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6f050e1c00010d2f08020e0603410c0002">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>
														<figure>
															<img src="assetWebsite/images/resources/friend-avatar4.jpg" alt="">
															<span class="status f-off"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">Cameron diaz</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="147e75677b7a76547379757d783a777b79">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>

														<figure>
															<img src="assetWebsite/images/resources/friend-avatar5.jpg" alt="">
															<span class="status f-online"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">daniel warber</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="640e05170b0a06240309050d084a070b09">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>

														<figure>
															<img src="assetWebsite/images/resources/friend-avatar6.jpg" alt="">
															<span class="status f-away"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">andrew</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3b9b2a0bcbdb193b4beb2babffdb0bcbe">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>

														<figure>
															<img src="assetWebsite/images/resources/friend-avatar7.jpg" alt="">
															<span class="status f-off"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">amy watson</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="deb4bfadb1b0bc9eb9b3bfb7b2f0bdb1b3">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>

														<figure>
															<img src="assetWebsite/images/resources/friend-avatar5.jpg" alt="">
															<span class="status f-online"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">daniel warber</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bbd1dac8d4d5d9fbdcd6dad2d795d8d4d6">[email&#160;protected]</a></i>
														</div>
													</li>
													<li>

														<figure>
															<img src="assetWebsite/images/resources/friend-avatar2.jpg" alt="">
															<span class="status f-away"></span>
														</figure>
														<div class="friendz-meta">
															<a href="time-line.html">Sarah Loren</a>
															<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ff9d9e8d919a8cbf98929e9693d19c9092">[email&#160;protected]</a></i>
														</div>
													</li>
												</ul>
												<div class="chat-box">
													<div class="chat-head">
														<span class="status f-online"></span>
														<h6>Bucky Barnes</h6>
														<div class="more">
															<span><i class="ti-more-alt"></i></span>
															<span class="close-mesage"><i class="ti-close"></i></span>
														</div>
													</div>
													<div class="chat-list">
														<ul>
															<li class="me">
																<div class="chat-thumb"><img src="assetWebsite/images/resources/chatlist1.jpg" alt=""></div>
																<div class="notification-event">
																	<span class="chat-message-item">
																		Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
																	</span>
																	<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
																</div>
															</li>
															<li class="you">
																<div class="chat-thumb"><img src="assetWebsite/images/resources/chatlist2.jpg" alt=""></div>
																<div class="notification-event">
																	<span class="chat-message-item">
																		Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
																	</span>
																	<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
																</div>
															</li>
															<li class="me">
																<div class="chat-thumb"><img src="assetWebsite/images/resources/chatlist1.jpg" alt=""></div>
																<div class="notification-event">
																	<span class="chat-message-item">
																		Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
																	</span>
																	<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
																</div>
															</li>
														</ul>
														<form class="text-box">
															<textarea placeholder="Post enter to post..."></textarea>
															<div class="add-smiles">
																<span title="add icon" class="em em-expressionless"></span>
															</div>
															<div class="smiles-bunch">
																<i class="em em---1"></i>
																<i class="em em-smiley"></i>
																<i class="em em-anguished"></i>
																<i class="em em-laughing"></i>
																<i class="em em-angry"></i>
																<i class="em em-astonished"></i>
																<i class="em em-blush"></i>
																<i class="em em-disappointed"></i>
																<i class="em em-worried"></i>
																<i class="em em-kissing_heart"></i>
																<i class="em em-rage"></i>
																<i class="em em-stuck_out_tongue"></i>
															</div>
															<button type="submit"></button>
														</form>
													</div>
												</div>
											</div><!-- friends list sidebar -->

										</aside>
									</div><!-- sidebar -->
								</div>	
							</div>
						</div>
					</div>
				</div>	
			</section>
			<?Php include "view/footer.php" ?>
