   <?php
   include "helper/config.php";
    if(isset($_GET["email"]));
    {
        $checkEmail  = $_GET["email"];
       
        // give me all info for the users have this email 
        $sql = $conn->prepare("select * from users where email = ?");
        $sql->execute(array($checkEmail));
        $sql->fetchAll();
        $row = $sql->rowCount();
        if($row>0)
        {
               echo $msg =  "Email is Already Exist";
        }
    }
 

?>
