<?php  include "userAuth.php"?>


<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="widget d-none d-md-block">
									<h4 class="widget-title">Recent Activity</h4>
									<ul class="activitiez">
										<li>
											<div class="activity-meta">
												<i>10 hours Ago</i>
												<span><a title="" href="#">Commented on Video posted </a></span>
												<h6>by <a href="time-line.html">black demon.</a></h6>
											</div>
										</li>
										<li>
											<div class="activity-meta">
												<i>30 Days Ago</i>
												<span><a title="" href="#">Posted your status. “Hello guys, how are you?”</a></span>
											</div>
										</li>
										<li>
											<div class="activity-meta">
												<i>2 Years Ago</i>
												<span><a title="" href="#">Share a video on her timeline.</a></span>
												<h6>"<a href="#">you are so funny mr.been.</a>"</h6>
											</div>
										</li>
									</ul>
								</div>
								<div class="widget stick-widget">
									<h4 class="widget-title">Edit info</h4>
									<ul class="naves">
										<li>
											<i class="ti-info-alt"></i>
											<a href="edit-profile-basic.php" title="">Basic info</a>
										</li>
										<li>
											<i class="ti-mouse-alt"></i>
											<a href="edit-work-eductation.html" title="">Education & Work</a>
										</li>
										<li>
											<i class="ti-heart"></i>
											<a href="?do=blockList" title="">block List</a>
										</li>
										<li>
											<i class="ti-settings"></i>
											<a href="edit-account-setting.html" title="">account setting</a>
										</li>
										<li>
											<i class="ti-lock"></i>
											<a href="?do=edit_password" title="">change password</a>
										</li>
									</ul>
								</div><!-- settings widget -->										
							</aside>
						</div><!-- sidebar -->
						<div class="col-lg-6">
							<?php 
							if(isset($_GET['do']))
							{
								$req = $_GET['do'];
								if($req=="edit_profile")
								{
									include "edit_profile.php";
								}
								elseif($req=="edit_password")
								{
									include "edit_password.php";

								}
								elseif($req=="blockList")
								{
									include "blockList.php";

								}		
							}					
							else
							{
								include "edit_profile.php";
							}

							?>
</div>
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget d-none d-md-block">
										<h4 class="widget-title">Your page</h4>	
										<div class="your-page">
											<figure>
												<a title="" href="#"><img alt="" src="assetWebsite/images/resources/friend-avatar9.jpg"></a>
											</figure>
											<div class="page-meta">
												<a class="underline" title="" href="#">My page</a>
												<span><i class="ti-comment"></i>Messages <em>9</em></span>
												<span><i class="ti-bell"></i>Notifications <em>2</em></span>
											</div>
											<div class="page-likes">
												<ul class="nav nav-tabs likes-btn">
													<li class="nav-item"><a data-toggle="tab" href="#link1" class="active">likes</a></li>
													<li class="nav-item"><a data-toggle="tab" href="#link2" class="">views</a></li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div id="link1" class="tab-pane active fade show">
														<span><i class="ti-heart"></i>884</span>
														<a title="weekly-likes" href="#">35 new likes this week</a>
														<div class="users-thumb-list">
															<a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
																<img alt="" src="assetWebsite/images/resources/userlist-1.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="frank">
																<img alt="" src="assetWebsite/images/resources/userlist-2.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
																<img alt="" src="assetWebsite/images/resources/userlist-3.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
																<img alt="" src="assetWebsite/images/resources/userlist-4.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
																<img alt="" src="assetWebsite/images/resources/userlist-5.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
																<img alt="" src="assetWebsite/images/resources/userlist-6.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
																<img alt="" src="assetWebsite/images/resources/userlist-7.jpg">  
															</a>  
														</div>
													</div>
													<div id="link2" class="tab-pane fade">
														<span><i class="ti-eye"></i>445</span>
														<a title="weekly-likes" href="#">440 new views this week</a>
														<div class="users-thumb-list">
															<a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
																<img alt="" src="assetWebsite/images/resources/userlist-1.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="frank">
																<img alt="" src="assetWebsite/images/resources/userlist-2.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
																<img alt="" src="assetWebsite/images/resources/userlist-3.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
																<img alt="" src="assetWebsite/images/resources/userlist-4.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
																<img alt="" src="assetWebsite/images/resources/userlist-5.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
																<img alt="" src="assetWebsite/images/resources/userlist-6.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
																<img alt="" src="assetWebsite/images/resources/userlist-7.jpg">  
															</a>  
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="widget stick-widget  d-none d-md-block">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers">
											<li>
												<figure><img src="assetWebsite/images/resources/friend-avatar2.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Kelly Bill</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="assetWebsite/images/resources/friend-avatar4.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Issabel</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="assetWebsite/images/resources/friend-avatar6.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Andrew</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="assetWebsite/images/resources/friend-avatar8.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Sophia</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="assetWebsite/images/resources/friend-avatar3.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Allen</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
										</ul>
									</div><!-- who's following -->
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
	<?php  include "view/footer.php"; ?>
