<?php
session_start();
require_once("libs.php");

$UserID = $_POST["name"];
$Password = $_POST["password"];

//Establishes connection to PHPMyadmin which contains the password database

	$user_data = getAdvisorByName($UserID);
	$username = $user_data["Name"];
	$private_key = $user_data["Password"];
	if($private_key == $Password && $UserID == $username){
		//Redirects the user to the CSEE Advising page
		 
		$_SESSION["auth"] = true;
		$_SESSION["id"] = $user_data["id"];
		header("Location:../advisors/granted.php");
	}
	else{
		header("Location:../advisors/logout.php");
		echo("Entry Denied");
	} 

