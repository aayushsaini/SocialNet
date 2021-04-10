 <?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register to Stream</title>
    <!--Import Google Icon Font-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
</head>

<body>

    <?php
        if(isset($_POST['register_button'])) {
            echo '
            <script>       
                $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#signupForm").show();
                });
            </script>';
        }
    ?>

    <div class="wrapper">
		<div class="info-wrap">
			<h1 class='logo'>Stream.io</h1>
			<img src='assets/images/background/info-x.svg' style='width:130%; margin-left:39%'/>
			<h6 class='info-footer'>About | Privacy Policy</h6>
		</div>
        <div class="form-wrap">
            <div id='loginForm'>
                <form action="register.php" method="POST" class='login-form'>
                    <h1 class='login-head'>Login</h1>
                    <?php if(in_array("Invalid Login Credentials<br/>", $errorArray)){
                        echo "<span style='color:#EC7B7B'>Invalid Login Credentials</span><br/>";
                    }
                    ?>
                    <input class='user_input_login' type="email" name="log_email" placeholder="Enter your email" value="<?php 
                    if(isset($_SESSION['log_email'])){
                        echo $_SESSION['log_email'];
                    }?>" required>
                    <br>
                    <input class='user_input_login' type="password" name="log_password" placeholder="Enter your password">
                    <br>
                    <input type="submit" name="login_button" value="Login"class='btn'>
                    <br>
                    <h6 class='signup-option' onclick='signup_activate()'>Don't have an account? Sign up now!</h6>
                </form>
            </div>

            <div id="signupForm" style="display:none">
                <form action="register.php" method="POST" class='signup-form'>
                    <h1 class='signup-head'>Signup</h1>
                    <input class='user_input' type="text" name="reg_fname" placeholder="First Name" value="<?php 
                    if(isset($_SESSION['reg_fname'])){
                        echo $_SESSION['reg_fname'];
                    }?>" required>
                    <br>
                    <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $errorArray)) echo "Your first name must be between 2 and 25 characters<br>";?>

                    <input class='user_input' type="text" name="reg_lname" placeholder="Last Name" value="<?php 
                    if(isset($_SESSION['reg_lname'])){
                        echo $_SESSION['reg_lname'];
                    }?>" required>
                    <br>
                    <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $errorArray)) echo "Your last name must be between 2 and 25 characters<br>";?>

                    <input class='user_input' type="email" name="reg_email" placeholder="Email" value="<?php 
                    if(isset($_SESSION['reg_email'])){
                        echo $_SESSION['reg_email'];
                    }?>" required>
                    <br>
                    <?php if(in_array("Email already in use<br>", $errorArray)) {echo "Email already in use<br>";}
                    else if(in_array("Invalid Format<br>", $errorArray)) {echo "Invalid Format<br>";}?>

                    <input class='user_input' type="email" name="reg_email2" placeholder="Confirm Email" required>
                    <br>
                    <?php if(in_array("Invalid Format<br>", $errorArray)) {echo "Invalid Format<br>";}
                    else if(in_array("Emails don't match<br>", $errorArray)) {echo "Emails don't match<br>";}?>

                    <input class='user_input' type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <?php if(in_array("Your password can only contain english character or numbers<br>", $errorArray)) {echo "Your password can only contain english character or numbers<br>";}
                    else if(in_array("Your password must be between 5 and 30 characters<br>", $errorArray)) {echo "Your password must be between 5 and 30 characters<br>";}?>

                    <input class='user_input' type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <?php if(in_array("Your passwords do not match<br>", $errorArray)) {echo "Your passwords do not match<br>";}
                    else if(in_array("Your password can only contain english character or numbers<br>", $errorArray)) {echo "Your password can only contain english character or numbers<br>";}
                    else if(in_array("Your password must be between 5 and 30 characters<br>", $errorArray)) {echo "Your password must be between 5 and 30 characters<br>";}?>

                    <input type="submit" name="register_button" value="Sign up" class='btn'>
                    <br>
                    <?php if(in_array("<span style='color:#14C800;'>You're all set! You can now login</span><br>", $errorArray)) {echo "<span style='color:#14C800;'><br>You're all set! You can now login</span><br>";} ?>
                    <h6 class='login-option' onclick="login_activate()">Already have an account? Login!</h6>

                </form>
            </div>
        </div>
    </div>

</body>

</html>