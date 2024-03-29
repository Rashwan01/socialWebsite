p<?php 
session_start();
include "helper/init.php";
include "classes/users.php";
include "classes/msg.php";
include "func.php";
if(!$_SESSION['NoBack']|| !$_SESSION['email'])
{
	header("location:login.php");
}
else
{
	$sql = $conn->prepare("select * from users where email = ?");
	$sql->execute(array($_SESSION['email']));
	$data = $sql->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Swipe – The Simplest Chat Platform</title>
	<meta name="description" content="#">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap core CSS -->
	<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
	<!-- Swipe core CSS -->
	<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
	<!-- Favicon -->
	<link href="dist/img/favicon.png" type="image/png" rel="icon">
	  <link rel="stylesheet" href="assetWebsite/css/media.css">
	<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>



</head>
<body>
	<main>
		<div class="layout">
			<!-- Start of Navigation -->
			<div class="navigation">
				<div class="container">
					<div class="inside">
						<div class="nav nav-tab menu">
							<button class="btn"><img class="avatar-xl" src="<?php echo $data['profile_pic'] ?>" alt="avatar"></button>
							<a href="#members" data-toggle="tab"><i class="material-icons">account_circle</i></a>
							<a href="#discussions" data-toggle="tab" class="active"><i class="material-icons active">chat_bubble_outline</i></a>
							<a href="#notifications" data-toggle="tab" class="f-grow1"><i class="material-icons">notifications_none</i></a>
							<button class="btn mode"><i class="material-icons">brightness_2</i></button>
							<a href="#settings" data-toggle="tab"><i class="material-icons">settings</i></a>
							<a href='logout.php'><button class="btn power" ><i class="material-icons">power_settings_new</i></button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Navigation -->
			<!-- Start of Sidebar -->
			<div class="sidebar" id="sidebar">
				<div class="container">
					<div class="col-md-12">
						<div class="tab-content">
							




							<?php $users = new users($conn,$data['username']);
							$users->allFriendsLoad();
							?>




							<!-- Start of Discussions -->
							<div id="discussions" class="tab-pane fade active show">
								<div class="search">
									<form class="form-inline position-relative">
										<input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
										<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
									</form>
									<button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
								</div>
								<div class="list-group sort">
									<button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
									<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
									<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
								</div>						
								<div class="discussions">
									<h1>Discussions</h1>
									<div id= "friends_list" class="list-group" id="chats" role="tablist">
										<?php
										$msg = new msg($conn,$data['username']);
										$msg->getLastImg();
										?>						

									</div>
								</div>
							</div>
							<!-- End of Discussions -->
							<!-- Start of Notifications -->
							<div id="notifications" class="tab-pane fade">
								<div class="search">
									<form class="form-inline position-relative">
										<input type="search" class="form-control" id="notice" placeholder="Filter notifications...">
										<button type="button" class="btn btn-link loop"><i class="material-icons filter-list">filter_list</i></button>
									</form>
								</div>
								<div class="list-group sort">
									<button class="btn filterNotificationsBtn active show" data-toggle="list" data-filter="all">All</button>
									<button class="btn filterNotificationsBtn" data-toggle="list" data-filter="latest">Latest</button>
									<button class="btn filterNotificationsBtn" data-toggle="list" data-filter="oldest">Oldest</button>
								</div>						
								<div class="notifications">
									<h1>Notifications</h1>
									<div class="list-group" id="alerts" role="tablist">
										<a href="#" class="filterNotifications all latest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-female-1.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons online">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Janette has accepted your friend request on Swipe.</p>
												<span>Oct 17, 2018</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all latest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
											<div class="status">
												<i class="material-icons online">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Michael, you have a new friend suggestion today.</p>
												<span>Jun 21, 2018</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all latest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-male-2.jpg" data-toggle="tooltip" data-placement="top" title="Mariette" alt="avatar">
											<div class="status">
												<i class="material-icons online">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Mariette have just sent you a new message.</p>
												<span>Feb 15, 2018</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all latest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-female-6.jpg" data-toggle="tooltip" data-placement="top" title="Louis" alt="avatar">
											<div class="status">
												<i class="material-icons online">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Louis has a birthday today. Wish her all the best.</p>
												<span>Mar 23, 2018</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all latest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-female-3.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons online">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Harmony has accepted your friend request on Swipe.</p>
												<span>Jan 5, 2018</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all oldest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons offline">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Keith have just sent you a new message.</p>
												<span>Dec 22, 2017</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all oldest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-female-2.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons offline">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Michael, you have a new friend suggestion today.</p>
												<span>Nov 29, 2017</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all oldest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-male-3.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons offline">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Ryan have just sent you a new message.</p>
												<span>Sep 31, 2017</span>
											</div>
										</a>
										<a href="#" class="filterNotifications all oldest notification" data-toggle="list">
											<img class="avatar-md" src="dist/img/avatars/avatar-male-4.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
											<div class="status">
												<i class="material-icons offline">fiber_manual_record</i>
											</div>
											<div class="data">
												<p>Mildred has a birthday today. Wish him all the best.</p>
												<span>Jul 19, 2017</span>
											</div>
										</a>
									</div>
								</div>
							</div>
							<!-- End of Notifications -->
							<!-- Start of Settings -->
							<div class="tab-pane fade" id="settings">			
								<div class="settings">
									<div class="profile">
										<img class="avatar-xl" src="dist/img/avatars/avatar-male-1.jpg" alt="avatar">
										<h1><a href="#">Michael Knudsen</a></h1>
										<span>Helena, Montana</span>
										<div class="stats">
											<div class="item">
												<h2>122</h2>
												<h3>Fellas</h3>
											</div>
											<div class="item">
												<h2>305</h2>
												<h3>Chats</h3>
											</div>
											<div class="item">
												<h2>1538</h2>
												<h3>Posts</h3>
											</div>
										</div>
									</div>
									<div class="categories" id="accordionSettings">
										<h1>Settings</h1>
										<!-- Start of My Account -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<i class="material-icons md-30 online">person_outline</i>
												<div class="data">
													<h5>My Account</h5>
													<p>Update your profile details</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionSettings">
												<div class="content">
													<div class="upload">
														<div class="data">
															<img class="avatar-xl" src="dist/img/avatars/avatar-male-1.jpg" alt="image">
															<label>
																<input type="file">
																<span class="btn button">Upload avatar</span>
															</label>
														</div>
														<p>For best results, use an image at least 256px by 256px in either .jpg or .png format!</p>
													</div>
													<form>
														<div class="parent">
															<div class="field">
																<label for="firstName">First name <span>*</span></label>
																<input type="text" class="form-control" id="firstName" placeholder="First name" value="Michael" required>
															</div>
															<div class="field">
																<label for="lastName">Last name <span>*</span></label>
																<input type="text" class="form-control" id="lastName" placeholder="Last name" value="Knudsen" required>
															</div>
														</div>
														<div class="field">
															<label for="email">Email <span>*</span></label>
															<input type="email" class="form-control" id="email" placeholder="Enter your email address" value="michael@gmail.com" required>
														</div>
														<div class="field">
															<label for="password">Password</label>
															<input type="password" class="form-control" id="password" placeholder="Enter a new password" value="password" required>
														</div>
														<div class="field">
															<label for="location">Location</label>
															<input type="text" class="form-control" id="location" placeholder="Enter your location" value="Helena, Montana" required>
														</div>
														<button class="btn btn-link w-100">Delete Account</button>
														<button type="submit" class="btn button w-100">Apply</button>
													</form>
												</div>
											</div>
										</div>
										<!-- End of My Account -->
										<!-- Start of Chat History -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
												<i class="material-icons md-30 online">mail_outline</i>
												<div class="data">
													<h5>Chats</h5>
													<p>Check your chat history</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionSettings">
												<div class="content layer">
													<div class="history">
														<p>When you clear your conversation history, the messages will be deleted from your own device.</p>
														<p>The messages won't be deleted or cleared on the devices of the people you chatted with.</p>
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="same-address">
															<label class="custom-control-label" for="same-address">Hide will remove your chat history from the recent list.</label>
														</div>
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="save-info">
															<label class="custom-control-label" for="save-info">Delete will remove your chat history from the device.</label>
														</div>
														<button type="submit" class="btn button w-100">Clear blah-blah</button>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Chat History -->
										<!-- Start of Notifications Settings -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
												<i class="material-icons md-30 online">notifications_none</i>
												<div class="data">
													<h5>Notifications</h5>
													<p>Turn notifications on or off</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionSettings">
												<div class="content no-layer">
													<div class="set">
														<div class="details">
															<h5>Desktop Notifications</h5>
															<p>You can set up Swipe to receive notifications when you have new messages.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Unread Message Badge</h5>
															<p>If enabled shows a red badge on the Swipe app icon when you have unread messages.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Taskbar Flashing</h5>
															<p>Flashes the Swipe app on mobile in your taskbar when you have new notifications.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Notification Sound</h5>
															<p>Set the app to alert you via notification sound when you have unread messages.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Vibrate</h5>
															<p>Vibrate when receiving new messages (Ensure system vibration is also enabled).</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Turn On Lights</h5>
															<p>When someone send you a text message you will receive alert via notification light.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Notifications Settings -->
										<!-- Start of Connections -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
												<i class="material-icons md-30 online">sync</i>
												<div class="data">
													<h5>Connections</h5>
													<p>Sync your social accounts</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionSettings">
												<div class="content">
													<div class="app">
														<img src="dist/img/integrations/slack.svg" alt="app">
														<div class="permissions">
															<h5>Skrill</h5>
															<p>Read, Write, Comment</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="app">
														<img src="dist/img/integrations/dropbox.svg" alt="app">
														<div class="permissions">
															<h5>Dropbox</h5>
															<p>Read, Write, Upload</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="app">
														<img src="dist/img/integrations/drive.svg" alt="app">
														<div class="permissions">
															<h5>Google Drive</h5>
															<p>No permissions set</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
													<div class="app">
														<img src="dist/img/integrations/trello.svg" alt="app">
														<div class="permissions">
															<h5>Trello</h5>
															<p>No permissions set</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Connections -->
										<!-- Start of Appearance Settings -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
												<i class="material-icons md-30 online">colorize</i>
												<div class="data">
													<h5>Appearance</h5>
													<p>Customize the look of Swipe</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionSettings">
												<div class="content no-layer">
													<div class="set">
														<div class="details">
															<h5>Turn Off Lights</h5>
															<p>The dark mode is applied to core areas of the app that are normally displayed as light.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round mode"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Appearance Settings -->
										<!-- Start of Language -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
												<i class="material-icons md-30 online">language</i>
												<div class="data">
													<h5>Language</h5>
													<p>Select preferred language</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-parent="#accordionSettings">
												<div class="content layer">
													<div class="language">
														<label for="country">Language</label>
														<select class="custom-select" id="country" required>
															<option value="">Select an language...</option>
															<option>English, UK</option>
															<option>English, US</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Language -->
										<!-- Start of Privacy & Safety -->
										<div class="category">
											<a href="#" class="title collapsed" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
												<i class="material-icons md-30 online">lock_outline</i>
												<div class="data">
													<h5>Privacy & Safety</h5>
													<p>Control your privacy settings</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
											<div class="collapse" id="collapseSeven" aria-labelledby="headingSeven" data-parent="#accordionSettings">
												<div class="content no-layer">
													<div class="set">
														<div class="details">
															<h5>Keep Me Safe</h5>
															<p>Automatically scan and delete direct messages you receive from everyone that contain explict content.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>My Friends Are Nice</h5>
															<p>If enabled scans direct messages from everyone unless they are listed as your friend.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Everyone can add me</h5>
															<p>If enabled anyone in or out your friends of friends list can send you a friend request.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Friends of Friends</h5>
															<p>Only your friends or your mutual friends will be able to send you a friend reuqest.</p>
														</div>
														<label class="switch">
															<input type="checkbox" checked>
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Data to Improve</h5>
															<p>This settings allows us to use and process information for analytical purposes.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
													<div class="set">
														<div class="details">
															<h5>Data to Customize</h5>
															<p>This settings allows us to use your information to customize Swipe for you.</p>
														</div>
														<label class="switch">
															<input type="checkbox">
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- End of Privacy & Safety -->
										<!-- Start of Logout -->
										<div class="category">
											<a href="sign-in.html" class="title collapsed">
												<i class="material-icons md-30 online">power_settings_new</i>
												<div class="data">
													<h5>Power Off</h5>
													<p>Log out of your account</p>
												</div>
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
										</div>
										<!-- End of Logout -->
									</div>
								</div>
							</div>
							<!-- End of Settings -->
						</div>
					</div>
				</div>
			</div>
			<!-- End of Sidebar -->
			<!-- Start of Add Friends -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="requests">
						<div class="title">
							<h1>Add your friends</h1>
							<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
						</div>
						<div class="content">
							<form>
								<div class="form-group">
									<label for="user">Username:</label>
									<input type="text" class="form-control" id="user" placeholder="Add recipient..." required>
									<div class="user" id="contact">
										<img class="avatar-sm" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">
										<h5>Keith Morris</h5>
										<button class="btn"><i class="material-icons">close</i></button>
									</div>
								</div>
								<div class="form-group">
									<label for="welcome">Message:</label>
									<textarea class="text-control" id="welcome" placeholder="Send your welcome message...">Hi Keith, I'd like to add you as a contact.</textarea>
								</div>
								<button type="submit" class="btn button w-100">Send Friend Request</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Add Friends -->
			<!-- Start of Create Chat -->
			<div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="requests">
						<div class="title">
							<h1>Start new chat</h1>
							<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
						</div>
						<div class="content">
							<form>
								<div class="form-group">
									<label for="participant">Recipient:</label>
									<input type="text" class="form-control" id="participant" placeholder="Add recipient..." required>
									<div class="user" id="recipient">
										<img class="avatar-sm" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">
										<h5>Keith Morris</h5>
										<button class="btn"><i class="material-icons">close</i></button>
									</div>
								</div>
								<div class="form-group">
									<label for="topic">Topic:</label>
									<input type="text" class="form-control" id="topic" placeholder="What's the topic?" required>
								</div>
								<div class="form-group">
									<label for="message">Message:</label>
									<textarea class="text-control" id="message" placeholder="Send your welcome message...">Hmm, are you friendly?</textarea>
								</div>
								<button type="submit" class="btn button w-100">Start New Chat</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Create Chat -->
			<div class="main">
				<div class="tab-content" id="nav-tabContent">
					<!-- Start of Babble -->
					<div id='chatoo' class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">







						<!-- Start of Call -->
						<div class="call" id="call1">
							<div class="content">
								<div class="container">
									<div class="col-md-12">
										<div class="inside">
											<div class="panel">
												<div class="participant">
													<img class="avatar-xxl" src="dist/img/avatars/avatar-female-5.jpg" alt="avatar">
													<span>Connecting</span>
												</div>							
												<div class="options">
													<button class="btn option"><i class="material-icons md-30">mic</i></button>
													<button class="btn option"><i class="material-icons md-30">videocam</i></button>
													<button class="btn option call-end"><i class="material-icons md-30">call_end</i></button>
													<button class="btn option"><i class="material-icons md-30">person_add</i></button>
													<button class="btn option"><i class="material-icons md-30">volume_up</i></button>
												</div>
												<button class="btn back" name="1"><i class="material-icons md-24">chat</i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Call -->
					</div>
					<!-- End of Babble -->
					

				</div>
			</div>
		</div> <!-- Layout -->
	</main>
		<!-- Bootstrap/Swipe core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
			<script src="dist/js/vendor/popper.min.js"></script>
			<script src="dist/js/swipe.min.js"></script>
			<script src="dist/js/bootstrap.min.js"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="assetWebsite/js/chat.js" >
			</script>


			
		</body>

		</html>
