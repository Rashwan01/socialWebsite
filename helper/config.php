<?php
$dsn = "mysql:host=127.0.0.1;dbname=socail";
$user = "root";
$pass = "";
$options = array(

PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

);
try
{
   $conn = new PDO($dsn,$user,$pass,$options);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $E)

{
    echo "faild to connect" . $E->getmessage();
}


?>
