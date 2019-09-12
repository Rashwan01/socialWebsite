
<?php
if(isset($_SESSION['NoBack']))
{
  header("location:dashboard.php");
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{

  $fname = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
  $fname = str_replace(" ", "", $fname);
  $fname = ucfirst(strtolower($fname));
  $_session['fname'] = $fname;
  $lname = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
  $lname = str_replace(" ", "", $lname);
  $lname = ucfirst(strtolower($lname));
  $_session['lname'] = $lname;
  $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
  $_session['email'] = $email;
  $password = filter_var($_POST['password_confirmation'],FILTER_SANITIZE_STRING);
  $re_password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $secretKey= "6LdVMbUUAAAAANQrqK1M9W7JY613q3xZkcMEcKGP";
  $responseKey = $_POST["g-recaptcha-response"];
  $userIp = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIp";
  $response = file_get_contents($url);
  $response = json_decode($response);
  $arr = [];

/// check for valid format if valid then 
  if($email)
  {
        // give me all info for the users have this email 
    $sql = $conn->prepare("select * from users where email = ?");
    $sql->execute(array($email));
    $sql->fetchAll();
    $row = $sql->rowCount();

// if exist say it
    if($row>0)
    {
      $arr[] = "email is already exist"; 
    }
  }
  else
  {
   $arr[] = " Email is nvalid Format";
 }
 $func = new functions();
 $func->length($lname,"last name",2,50);
 $func->length($fname,"first name",2,50);
 $func->length($password,"password",8,255);
 $func->confirmed_password($password,$re_password);
 $func->pattern($password,"password");
 $func->NOT_NULL($fname,"first name");
 $func->NOT_NULL($lname,"last name");
 $func->NOT_NULL($email,"email");
 $func->NOT_NULL($password,"password");
 $recaptchaError ="";
 if( $response->success == false)

 {
  $recaptchaError = "<span class='help-block form-error' >invalid recaptcha</span>";
}

if(empty($arr)  && $response->success)
{
    //encrypt password with md5 tech
  $password = md5($password);
    // make username unqiue
  $username =uniqid($fname);
  $sql = $conn->prepare("insert into users VALUES(null,?,?,?,?,?,now(),'assetWebsite/images/resources/bloglist-2.jpg',0,0,'on',',','assetWebsite/images/resources/timeline-4.jpg','010100000','male','iam good man')");
  $sql->execute(array($fname,$lname,$username,$email,$password) );

  if($sql)
  {
    $msgSuccess = "<div class = 'alert alert-success'> Sign Up is Done..</div>";
    $_session['NoBack'] ="true";
    $_SESSION['fname'] = $fname;
    $_SESSION['email'] = $email;
    header("refresh:2;url=dashboard.php");
  }


}
/*
another way to invert dublication  
  $username = $fname."-".$lname."%";
    $sql = $conn->prepare("select * from users where username  like '$username' ");
    $sql->execute(array());
    $sql->fetchAll();
    $row = $sql->rowCount();
    if($row>0){   $username = $fname."-".$lname.$row;}
}

    echo $username;
*//*
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
*/

  }



  ?>
