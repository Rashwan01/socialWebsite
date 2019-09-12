<?php

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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title>Winku Social Network Toolkit</title>
  <link rel="icon" href="assetWebsite/images/fav.png" type="image/png" sizes="16x16"> 

  <link rel="stylesheet" href="assetWebsite/css/main.min.css">
  <link rel="stylesheet" href="assetWebsite/css/style.css">
  <link rel="stylesheet" href="assetWebsite/css/color.css">
  <link rel="stylesheet" href="assetWebsite/css/responsive.css">
  <link rel="stylesheet" href="assetWebsite/css/custom.css">
  <link rel="stylesheet" href="assetWebsite/css/media.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  <script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <!--<div class="se-pre-con"></div>-->
  <div class="theme-layout">

    <div class="responsive-header">
      <div class="mh-head first Sticky">

        <span class="mh-text">
          <a href="newsfeed.html" title=""><img src="assetWebsite/images/logo2.png" alt=""></a>
        </span>
        <span class="mh-btns-right">
          <a class="fa fa-align-justify" href="#shoppingbag"></a>
        </span>

      </div>
      <!-- Search form -->
      <div class="active-cyan-3 active-cyan-4 mb-4">
        <input id="searcho" class="form-control" type="text" placeholder="Search" aria-label="Search">
      </div>
      <div class="searchResult d-none">
        <ul id='resultoo' class="list-unstyled">
        
        </ul>
      </div>
    </div>



    <nav id="shoppingbag">
      <div>
        <ul class="list-unstyled slider-ul-holder">
          <a href="dashboard.php">  <li> <img class="w-30 mr-2" src="assetWebsite/images/profiles.svg"><span class="navigator">home</span></li></a>
          <a href="profile.php">  <li> <img class="w-30 mr-2" src="assetWebsite/images/man.svg"><span class="navigator">profile</span></li></a>   
          <a href="continueTochat.php">  <li><img class="w-30 mr-2" src="assetWebsite/images/chat.svg"><span class="navigator">message</span></li></a> 
          <a href="friendReq.php">  <li><img class="w-30 mr-2" src="assetWebsite/images/users.svg"><span class="navigator">friends</span></li></a>


        </ul>
        <h4 class="panel-title">Account Setting</h4>
        <ul class="list-unstyled slider-ul-holder">
         <a href="edit-profile-basic.php"><li><img class="w-30 mr-2" src="assetWebsite/images/settings.svg"></i><span class="navigator">settings</span></li></a>
         <a href="logout.php"><li><img class="w-30 mr-2" src="assetWebsite/images/exit-sign.svg"></i><span class="navigator">logout</span></li></a>
       </ul>
     </div>
   </div>
 </nav>
</div><!-- responsive header -->

<div class="topbar stick">
  <div class="logo">
    <a title="" href="newsfeed.html"><img src="assetWebsite/images/logo.png" alt=""></a>
  </div>

  <div class="top-area">
    <div class="top-search">
      <form method="post" class="">
        <input type="text" placeholder="Search Friend">
        <button data-ripple><i class="ti-search"></i></button>
      </form>
    </div>
    <ul class="setting-area">
      <li><a href="newsfeed.html" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
      <li>
        <a href="#" title="Notification" data-ripple="">
          <i class="ti-bell"></i><span>20</span>
        </a>
        <div class="dropdowns">
          <span>4 New Notifications</span>
          <ul class="drops-menu">
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-1.jpg" alt="">
                <div class="mesg-meta">
                  <h6>sarah Loren</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag green">New</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-2.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Jhon doe</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag red">Reply</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-3.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Andrew</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag blue">Unseen</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-4.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Tom cruse</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag">New</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-5.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Amy</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag">New</span>
            </li>
          </ul>
          <a href="notifications.html" title="" class="more-mesg">view more</a>
        </div>
      </li>
      <li>
        <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
        <div class="dropdowns">
          <span>5 New Messages</span>
          <ul class="drops-menu">
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-1.jpg" alt="">
                <div class="mesg-meta">
                  <h6>sarah Loren</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag green">New</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-2.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Jhon doe</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag red">Reply</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-3.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Andrew</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag blue">Unseen</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-4.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Tom cruse</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag">New</span>
            </li>
            <li>
              <a href="notifications.html" title="">
                <img src="assetWebsite/images/resources/thumb-5.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Amy</h6>
                  <span>Hi, how r u dear ...?</span>
                  <i>2 min ago</i>
                </div>
              </a>
              <span class="tag">New</span>
            </li>
          </ul>
          <a href="messages.html" title="" class="more-mesg">view more</a>
        </div>
      </li>
      <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
        <div class="dropdowns languages">
          <a href="#" title=""><i class="ti-check"></i>English</a>
          <a href="#" title="">Arabic</a>
          <a href="#" title="">Dutch</a>
          <a href="#" title="">French</a>
        </div>
      </li>
    </ul>
    <div class="user-img">
      <img src="assetWebsite/images/resources/admin.jpg" alt="">
      <span class="status f-online"></span>
      <div class="user-setting">
        <a href="#" title=""><span class="status f-online"></span>online</a>
        <a href="#" title=""><span class="status f-away"></span>away</a>
        <a href="#" title=""><span class="status f-off"></span>offline</a>
        <a href="#" title=""><i class="ti-user"></i> view profile</a>
        <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
        <a href="#" title=""><i class="ti-target"></i>activity log</a>
        <a href="#" title=""><i class="ti-settings"></i>account setting</a>
        <a href="/logout.php" ><i class="ti-power-off"></i>log out</a>
      </div>
    </div>
    <span class="ti-menu main-menu" data-ripple=""></span>
  </div>
</div><!-- topbar -->
