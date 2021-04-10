<?php

//declare variable to prevent errors
$fname = "";
$lname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";    //signup date
$errorArray = array();

if(isset($_POST['register_button'])){
	//Registration form values

	//First Name
	$fname = strip_tags($_POST['reg_fname']); //remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces1
	$fname = ucfirst(strtolower($fname));
	$_SESSION['reg_fname'] = $fname;	//stores fname in session variable
	//Last Name
	$lname = strip_tags($_POST['reg_lname']); //remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname));
	$_SESSION['reg_lname'] = $lname;	//stores lname in session variable

	//Email
	$email = strip_tags($_POST['reg_email']); //remove html tags
	$email = str_replace(' ', '', $email); //remove spaces
	$email = strtolower($email);
	$_SESSION['reg_email'] = $email;	//stores email in session variable

	//Email2
	$email2 = strip_tags($_POST['reg_email2']); //remove html tags
	$email2 = str_replace(' ', '', $email2); //remove spaces
	$email2 = strtolower($email2);
	$_SESSION['reg_email2'] = $email2;	//stores email2 in session variable

	//Password
	$password = strip_tags($_POST['reg_password']); //remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //remove html tags

	$date = date("Y-m-d");  //current date

	if($email == $email2){
		//check if email is in valid format
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			//check if email already exists
			$email_check = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");
			//count number of rows returned
			$num_rows = mysqli_num_rows($email_check);																							
			if($num_rows > 0){
				array_push($errorArray, "Email already in use<br>");
			}
		}
		else{
			array_push($errorArray, "Invalid Format<br>"); ;
		}
	}
	else{
		array_push($errorArray, "Emails don't match<br>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2){
		array_push($errorArray, "Your first name must be between 2 and 25 characters<br>");
	}
	if(strlen($lname) > 25 || strlen($lname) < 2){
		array_push($errorArray, "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2){
		array_push($errorArray, "Your passwords do not match<br>");
	}
	else{
		if(preg_match('/[^A-Za-z0-9]/', $password)){
			array_push($errorArray, "Your password can only contain english character or numbers<br>");
		}
	}
	 if(strlen($password) > 30 || strlen($password) < 5){
		array_push($errorArray, "Your password must be between 5 and 30 characters<br>");
	 }

	if(empty($errorArray)){
		$password = md5($password); //encrypt
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($connect, "SELECT username FROM users WHERE username='$username' ");
		$i = 0;
		while(mysqli_num_rows($check_username_query) != 0){
			$i++;
			$username = $username . $i;
			$check_username_query = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
		}

		//Profile pic assignment
		$profile_pic = "assets/images/profile_pics/default_profile_pics/profile_pic2.png";
		$query = mysqli_query($connect, "INSERT INTO users VALUES ('',  '$fname', '$lname', '$username', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		array_push($errorArray, "<span style='color:#14C800;'>You're all set! You can now login</span><br>");

		//clear session variable
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";

	}

}

?>