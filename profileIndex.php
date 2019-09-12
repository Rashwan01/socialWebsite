	<section>
		<div class="gap white-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<div class="avatar-name text-center mt-3">
									<h5 class="font-weight-bold text-capitalize" ><?php echo $dataUserProfile['fname']." ".$dataUserProfile['lname']?></h5>
									<p>@<?php echo $dataUserProfile['username'] ?> </p>
									<span>
										<?php echo $dataUserProfile['about'];?>
									</span>
								</div>



								<?php if (isset($_GET['q'])&& $_GET['q'] != $data['username'])
								{?>




									<div class="row mt-5 mb-5 ml-md-5 text-center ">
										<!-- start  friends icon -->

										<?php 
										if($friendIconStatus === "sent")
										{
											?>

											<div class="col-3 friend-status" id="cancel">
												<form id='fromFriend' style="display:inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
													<i class="fa fa-user friends active" ></i>
													<p>cancel Request</p>

													<input type="hidden" name="user_to" value ="<?php echo $username?>">
													<input type="hidden" class="btn btn-danger" name = "cancel">

												</form>
											</div>
											<?php 
										}
										elseif($friendIconStatus === "respond")
										{
											?>

											<div class="col-3 friend-status" id ="responed">
												<form  id='fromFriend' style="display:inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
													<!-- start  friends icon -->
													<i class="fa fa-user friends active" ></i>
													<p>Responed</p>
													<input type="hidden" name="user_to" value ="<?php echo $username?>">
													<input type="hidden" class="btn btn-danger" name = "<?php echo $friendIconStatus; ?>">
												</form>
											</div>
											<!-- end  friends icon -->
										<?php }
										elseif($friendIconStatus === "remove")
										{
											?>
											<!-- start  friends icon -->
											<div class="col-3 friend-status">
												<form  id='fromFriend' style="display:inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
													<i class="fa fa-user friends active" ></i>
													<p>Friends</p>
													<div class="option d-none">
														<ul class="list-unstyled">
															<li class="unfriend">unfriend friends</li>
														</ul>
													</div>
													<input type="hidden" name="user_to" value ="<?php echo $username?>">
													<input type="hidden" class="btn btn-danger" name = "<?php echo $friendIconStatus; ?>">
												</form>
											</div>

										<?php } 
										elseif($friendIconStatus === "add")
											{?>


												<!-- start  friends icon -->
												<div class="col-3 friend-status" id = "add">
													<form  id='fromFriend' style="display:inline" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
														<i class="fa fa-user-plus  friends " aria-hidden="true"></i>
														<p>add Friends</p>
														<input type="hidden" name="user_to" value ="<?php echo $username?>">
														<input type="hidden" class="btn btn-danger" name = "add">
													</form>
												</div>
												<!-- end  friends icon -->

											<?php }?>

											<?php if($isfollow=="false"){
												?>
												<!-- start  follow icon -->
												<div class="col-3" id='followIcon'>
													<form id="formFollow" action="follow.php" method="POST">
														<input type="hidden" name="follow">
														<input type="hidden" name="user-follow" value="<?php echo $_GET['q'] ?>">
														<i class="fa fa-rss friends " aria-hidden="true"></i>
														<p>follow</p>
													</form>
												</div>
											<?php }?>
											<?php if($isfollow=="true"){
												?>
												<!-- start  follow icon -->
												<div class="col-3" >
													<form id="Form-unfollow" action="follow.php" method="POST">
														<input type="hidden" name="user-unfollow" value="<?php echo $_GET['q'] ?>">
														<input type="hidden" name="unfollow">
														<i class="fa fa-rss friends active" aria-hidden="true"></i>
														<p>follow</p>
														<div class="option d-none">
															<ul class="list-unstyled">
																<li id ="unfollowIcon" >unfollow</li>
																<li class="unfriend">See first</li>
															</ul>
														</div>
													</form>
												</div>
											<?php }?>
											<!-- end  follow icon -->
											<!-- start  message icon -->
											<div class="col-3"><i class="fa fa-comment friends" aria-hidden="true"></i>
												<p>messege</p>
											</div>
											<!-- end  message icon -->
											<!-- start  more icon -->

											<div class="col-3">
												<form id="moreForm" action="blockUser.php" method="POST">
													<input type="hidden" name="user_blocked" value="<?php echo $_GET['q']?>">
													<i class="fa fa-ellipsis-v friends" aria-hidden="true"></i>
													
													<p>more</p>
													<div class="option d-none">
														<ul class="list-unstyled">
															<li id="blockIcon" >block</li>
														</ul>
													</div>
												</form>
											</div>
											<!-- end  message icon -->

										</div>

									<?php } ?>


								</div><!-- sidebar -->
								<div class="col-lg-6">
									<?php if($write_post)
									{?>
										<div class="central-meta">
											<div class="new-postbox">
												<figure >
													<img   class  =" img-md-60 img-sm-45" src="<?php echo$data['profile_pic'] ?>" alt="">
												</figure>
												<div class="newpst-input">

													<form method="POST" action="savepost.php" enctype="multipart/form-data"> 
														<textarea name="post-body" rows="2" placeholder="write something" required></textarea>
														<input type="hidden"  name = "user_to" value="<?php if(isset( $_GET['q'] )){
													//there is link with profile
														//if login user == q value mean he go to his profile
															if($data['username']!= $_GET['q'])
															{
														//if he go to specisifc profile keep user_to with q value
																echo  $_GET['q'];
															}
														//else which mean he write his link profile
															else
															{
															// he put profile.php without any q
																echo "none";
															}
														}
														else{
															echo "none";
														}?>">
														<div class="attachments">
															<ul>
																<li>
																	<i class="fa fa-music"></i>
																	<label class="fileContainer">
																		<input type="file">
																	</label>
																</li>
																<li>
																	<i class="fa fa-image"></i>
																	<label class="fileContainer">
																		<input type="file">
																	</label>
																</li>
																<li>
																	<i class="fa fa-video-camera"></i>
																	<label class="fileContainer">
																		<input type="file">
																	</label>
																</li>
																<li>
																	<i class="fa fa-camera"></i>
																	<label class="fileContainer">
																		<input type="file" name="post_img">
																	</label>
																</li>
																<li>
																	<button name="postFprofile" type="submit">Post</button>
																</li>
															</ul>
														</div>
													</form>
												</div>
											</div>
										</div><!-- add post new box -->
									<?php }?>


									<div class="loadMore">
										<?php 


										$loadFriend = new posts($conn,$username);
										$loadFriend->YourPost(); 

										?>

									</div><!-- add post new box -->
								</div>


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

									</aside>
								</div><!-- sidebar -->
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>

