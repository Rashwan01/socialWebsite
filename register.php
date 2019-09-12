<?php 
session_start();
include "helper/init.php";
include "form/reg_form.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Form by Colorlib</title>
    <!--  ">
    -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min"></script>
      <script src="js/respond.min"></script>
    <![endif]-->
    <!-- Font Icon -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/font/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="asset/css/register.css">
    <!-- Main css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </head>
  <body>

    <div class="main">
      <section class="signup">

        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
         <?php 
         if(isset($msgSuccess)){
          echo $msgSuccess;
        } ?>
        <div class="signup-content">

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="signup-form" class="signup-form">
            <h2 class="form-title">Create account</h2>
            <div class="form-group">
              <input type="text"
              class="form-input"
              name="fname"
              value="<?php if(isset($_session["fname"])){echo $_session["fname"]; }?>" 
              data-validation="alphanumeric length"
              data-validation-length="2-50"
              data-validation-allowing="-_"
              data-validation-error-msg-alphanumeric ="The input value can only contain alphanumeric characters"
              data-validation-error-msg-length ="First name  must be between 2-50 character"
              placeholder="Your first Name"/>

                        <?php /*
                        if(in_array("first name can not be empty ", $arr)){
                            echo "<p style='color:red'>first name can not be empty </p>";
                        }elseif(in_array("first name must be between 2 and 50",$arr))
                        {
                           echo "<p style='color:red'>first name must be between 2 and 50 </p>";
                         }*/ ?>
                       </div>

                       <div class="form-group">
                        <input type="text"
                        class="form-input"
                        name="lname"
                        value="<?php if(isset($_session["lname"])){echo $_session["lname"]; }?>" 
                        placeholder="Your last Name"
                        data-validation="alphanumeric length"
                        data-validation-length="3-15"
                        data-validation-allowing="-_"
                        data-validation-error-msg-alphanumeric ="The input value can only contain alphanumeric characters"
                        data-validation-error-msg-length ="last name  must be between 2-50 character"
                        />
                        <?php
                     /*if(in_array("last name can not be empty ", $arr)){
                        echo "<p style='color:red'>last name can not be empty </p>";
                    }elseif(in_array("last name must be between 2 and 50",$arr))
                    {
                       echo "<p style='color:red'>last name must be between 2 and 50 </p>";
                     }*/
                     ?>
                   </div>
                   <div class="form-group">
                    <input type="email" 
                    class="form-input "
                    name="email"
                    value="<?php if(isset($_session["email"])){echo $_session["email"]; }?>" 
                    id="email"
                    placeholder="Your Email"
                    data-validation="email"
                    data-validation-error-msg = "please enter valid Email"
                    />
                    <span style="display: none;" id = "error"></span>
                    <?php
                /* if(in_array("email can not be empty ", $arr)){
                    echo "<p style='color:red'>email  can not be empty </p>";
                }elseif(in_array("email is already exist",$arr))
                {
                   echo "<p style='color:red'>email is aleardy exist </p>";
                 } */

                 ?>
               </div>
               <div class="form-group">
                <input type="password"
                class="form-input"
                name="password_confirmation"
                data-validation="length"
                data-validation-length="min8"
                data-validation-error-msg = "password  value is shorter than 8 characters"
                id="password" 
                placeholder="Password"
                />
                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
            <?php /*if(in_array("password can not be empty ", $arr)){
                echo "<p style='color:red'>password name can not be empty </p>";
            }elseif(in_array("password must be between 8 and 255",$arr))
            {
               echo "<p style='color:red'>password must be between at least 8 character  </p>";
           }
           */
           ?>
         </div>
         <div class="form-group">
          <input type="password" 
          class="form-input"
          name="password" 
          data-validation="confirmation"
          placeholder="Repeat your password"
          data-validation-error-msg = "password is Not matched"
          />
        </div>

        <div class="g-recaptcha" data-sitekey="6LdVMbUUAAAAALaErWiuUETYtUK0Ksg0A-pUhUE1"></div>
        <?php if(isset($recaptchaError))
        {
          echo $recaptchaError;
        } ?>

    <div class="form-group">
          <input type="checkbox" 
          name="agree"
          id="agree-term"
          class="agree-term" 
          />
          <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
        </div>
      </form>
      <p class="loginhere">
        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
      </p>
    </div>
  </div>
</section>

</div>

<!-- JS -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>
<script src="asset/js/ajax.js"></script>
<script src="asset/js/fontawesome-all.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    modules : 'file'
  });
</script>
<script>
  $.validate({
    modules : 'security'
  });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
