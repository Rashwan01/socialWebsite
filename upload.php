<?php 
include "userAuth.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $avatarName = $_FILES["avatar"]['name'];
    echo     $avatarName;
    $avatarType = $_FILES["avatar"]['type'];
    $avatarTemp = $_FILES["avatar"]['tmp_name'];
    $avatarSize= $_FILES["avatar"]['size'];
    $strings = explode('.', $avatarName);
    $reqExten =  strtolower(end($strings) );
    $ALLOW_EXTEN = array("jpeg","png","jpg","gif");
    if(in_array($reqExten,$ALLOW_EXTEN))
    {
        $STORAGE ="assetWebsite/images/uploads/".rand(0,100000) . $avatarName;
        move_uploaded_file($avatarTemp  ,$STORAGE);

        if(isset($_POST['profile_pic']))
        {

            $sql = $conn->prepare("update users set profile_pic = ? where username = ?");
            $sql ->execute(array($STORAGE,$data["username"]));
            if($sql)
            {
            header("location:profile.php");
            }
        }
        elseif(isset($_POST['profile_cover']))
        {
           $sql = $conn->prepare("update users set cover_url = ? where username = ?");
           $sql ->execute(array($STORAGE,$data["username"]));
           if($sql)
           {
            header("location:profile.php");
        }

    }
}

}
