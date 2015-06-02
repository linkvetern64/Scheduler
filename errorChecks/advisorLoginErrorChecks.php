<?php

//start the session
session_start();

require_once("advisors/libs.php");

//default debug
$debug = false;
$COMMON = new Common($debug);

//validation
$error2 = false;
$error2_msg = "";

if(isset($_POST['advisor_login'])) {
   
   $UserID = $_POST['username'];
   $Password = $_POST['password'];

   if(empty($UserID))
   {
	$error2 = true;
	$error2_msg = "Please enter the username.";
   }
   elseif(empty($Password))
   {
	$error2 = true;
	$error2_msg = "Please enter the password.";
   }
   else
   {
	$user_data = getAdvisorByName($UserID);
	$username = $user_data["Name"];
	$private_key = $user_data["Password"];
	if($private_key == $Password && $UserID == $username){
		//Redirects the user to the CSEE Advising page
		 
		$_SESSION["auth"] = true;
		$_SESSION["id"] = $user_data["id"];
		header("Location:advisors/granted.php");
	}
	else{
		header("Location:advisors/logout.php");
		echo("Entry Denied");
	}
   }
}
?>