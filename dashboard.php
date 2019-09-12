<?php 
session_start();
include "helper/init.php";
include "view/header.php";
include "classes/users.php";
include "classes/posts.php";

$obj = new users($conn,$data['username']);

?>

<div class="fixed-sidebar left">
  <div class="menu-left">
    <ul class="left-menu">
      <li><a href="dashboard.php" title="Newsfeed Page" data-toggle="tooltip" data-placement="right"><i class="ti-magnet"></i></a></li>
            <li><a href="profile.php" title="Your Profile" data-toggle="tooltip" data-placement="right"><i class="ti-user"></i></a></li>
      <li><a href="edit-profile-basic.php" title="settings page" data-toggle="tooltip" data-placement="right"><i class="ti-settings"></i></a></li>

    
      <li><a href="continueTochat.php" title="Messages" data-toggle="tooltip" data-placement="right"><i class="ti-comment-alt"></i></a></li>
 
      <li><a href="friendReq.php" title="friend Request" data-toggle="tooltip" data-placement="right"><i class="ti-light-bulb"></i></a></li>
      <li><a href="logout.php" title="friend Request" data-toggle="tooltip" data-placement="right"><i class="ti-power-off"></i></a></li>
    
     
    </ul>
  </div>
</div><!-- left sidebar menu -->

<section>
  <div class="gap2 gray-bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="row merged20" id="page-contents">
            <div class="col-lg-3">
              <aside class="sidebar static left">

                <div class="widget ">
                  <h4 class="widget-title">info</h4>
                  <div class="widget-img">
                    <img src="<?php echo $data['profile_pic'] ?>">
                  </div>
                  <div class="widget-user-info">
                    <div class="user-name">
                      <a  class="text-center" href="profile.php"><h3><?php  echo $data['fname']. " ". $data['lname'] ?></h3>
                      </a></div>
                      <div class="username">
                        <p> <?php echo "@" .$data['username'] ?></p>
                      </div>

                    </div>
                    <div class="widget-columns">
                      <!-- start box -->
                      <div class="box">
                        <div class="img-box">
                          <img src="assetWebsite/images/hearts.svg" >
                        </div>
                        <div class="num-box">
                          <span> <?php echo $data['num_likes']?></span>
                        </div>
                      </div>
                      <!-- end box -->
                      <!-- start box -->
                      <div class="box">
                        <div class="img-box">
                          <img src="assetWebsite/images/blogging.svg">
                        </div>
                        <div class="num-box">
                          <span> <?php  
                          echo $data['num_posts'];
                          ?></span>
                        </div>
                      </div>
                      <!-- end box -->

                      <!-- start box -->
                      <div class="box">
                        <div class="img-box">
                          <img src="assetWebsite/images/email.svg">
                        </div>
                        <div class="num-box">
                          <span> 25</span>
                        </div>
                      </div>
                      <!-- end box -->


                    </div>
                  </div>
                  <div class="widget d-none d-md-block">
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
                  </div>


                  <!-- Shortcuts -->
                  <div class="widget d-none d-md-block">
                    <h4 class="widget-title">Recent Activity</h4>
                    <ul class="activitiez">
                      <li>
                        <div class="activity-meta">
                          <i>10 hours Ago</i>
                          <span><a href="#" title="">Commented on Video posted </a></span>
                          <h6>by <a href="time-line.html">black demon.</a></h6>
                        </div>
                      </li>
                      <li>
                        <div class="activity-meta">
                          <i>30 Days Ago</i>
                          <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                        </div>
                      </li>
                      <li>
                        <div class="activity-meta">
                          <i>2 Years Ago</i>
                          <span><a href="#" title="">Share a video on her timeline.</a></span>
                          <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                        </div>
                      </li>
                    </ul>
                  </div>


                  <!-- recent activites -->
                  <div class="widget stick-widget d-none d-md-block">
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
              <div class="col-lg-6">
                <div class="central-meta">
                  <div class="new-postbox">
                    <figure>
                      <img class="img-md-60 img-sm-45" src="<?php echo$data['profile_pic'] ?>" alt="">
                    </figure>
                    <div class="newpst-input">

                      <form method="POST" action="savepost.php" enctype="multipart/form-data">
                        <textarea name="post-body" rows="2" placeholder="write something" ></textarea>
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
                              <button name="post" type="submit">Post</button>
                            </li>
                          </ul>
                        </div>
                      </form>
                    </div>
                  </div>
                </div><!-- add post new box -->
                <div class="loadMore">
                 <?php 

                 $loadFriend = new posts($conn,$data['username']);
                 $loadFriend->loadPostFriends(); 

                 ?>
                 
                 

               </div><!-- centerl meta -->
             </div>
             <div class="col-lg-3">
              <aside class="sidebar static right  d-none d-md-block">
                <div class="widget">
                  <h4 class="widget-title">Your page</h4> 
                  <div class="your-page">
                    <figure>
                      <a href="#" title=""><img src="assetWebsite/images/resources/friend-avatar9.jpg" alt=""></a>
                    </figure>
                    <div class="page-meta">
                      <a href="#" title="" class="underline">My page</a>
                      <span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>9</em></a></span>
                      <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>2</em></a></span>
                    </div>
                    <div class="page-likes">
                      <ul class="nav nav-tabs likes-btn">
                        <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
                        <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active fade show " id="link1" >
                          <span><i class="ti-heart"></i>884</span>
                          <a href="#" title="weekly-likes">35 new likes this week</a>
                          <div class="users-thumb-list">
                            <a href="#" title="Anderw" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-1.jpg" alt="">  
                            </a>
                            <a href="#" title="frank" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-2.jpg" alt="">  
                            </a>
                            <a href="#" title="Sara" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-3.jpg" alt="">  
                            </a>
                            <a href="#" title="Amy" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-4.jpg" alt="">  
                            </a>
                            <a href="#" title="Ema" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-5.jpg" alt="">  
                            </a>
                            <a href="#" title="Sophie" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-6.jpg" alt="">  
                            </a>
                            <a href="#" title="Maria" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-7.jpg" alt="">  
                            </a>  
                          </div>
                        </div>
                        <div class="tab-pane fade" id="link2" >
                          <span><i class="ti-eye"></i>440</span>
                          <a href="#" title="weekly-likes">440 new views this week</a>
                          <div class="users-thumb-list">
                            <a href="#" title="Anderw" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-1.jpg" alt="">  
                            </a>
                            <a href="#" title="frank" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-2.jpg" alt="">  
                            </a>
                            <a href="#" title="Sara" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-3.jpg" alt="">  
                            </a>
                            <a href="#" title="Amy" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-4.jpg" alt="">  
                            </a>
                            <a href="#" title="Ema" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-5.jpg" alt="">  
                            </a>
                            <a href="#" title="Sophie" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-6.jpg" alt="">  
                            </a>
                            <a href="#" title="Maria" data-toggle="tooltip">
                              <img src="assetWebsite/images/resources/userlist-7.jpg" alt="">  
                            </a>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- page like widget -->
                <div class="widget">
                  <div class="banner medium-opacity bluesh">
                    <div class="bg-image" style="background-image: url(assetWebsite/images/resources/baner-widgetbg.jpg)"></div>
                    <div class="baner-top">
                      <span><img alt="" src="assetWebsite/images/book-icon.png"></span>
                      <i class="fa fa-ellipsis-h"></i>
                    </div>
                    <div class="banermeta">
                      <p>
                        create your own favourit page.
                      </p>
                      <span>like them all</span>
                      <a data-ripple="" title="" href="#">start now!</a>
                    </div>
                  </div>                      
                </div>
                <div class="widget stick-widget">
                  <h4 class="widget-title">Profile intro</h4>
                  <ul class="short-profile">
                    <li>
                      <span>about</span>
                      <p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft </p>
                    </li>
                    <li>
                      <span>fav tv show</span>
                      <p>Sacred Games, Spartcus Blood, Games of Theron </p>
                    </li>
                    <li>
                      <span>favourit music</span>
                      <p>Justin Biber, Shakira, Nati Natasah</p>
                    </li>
                  </ul>
                </div>
              </aside>
            </div><!-- sidebar -->
          </div>  
        </div>
      </div>
    </div>
  </div>  
</section>

<?php  include "view/footer.php"?>
