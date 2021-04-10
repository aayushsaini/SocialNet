 <?php
	ob_start(); //turns on output buffering
	session_start();	
	$timezone = date_default_timezone_set("Asia/Calcutta");

	$connect = mysqli_connect("localhost", "root", "", "streamnet");
	if(mysqli_connect_errno()){
		echo "Failed to connect to the database! Error: ".mysqli_connect_errno();
	}

?>