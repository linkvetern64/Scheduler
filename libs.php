<?php 
session_start();
function connect(){
	$db ="jstand1";
	$conn = @mysql_connect("studentdb.gl.umbc.edu", "jstand1", "jstand1") or die("Could not connect to MySQL");
	$rs = @mysql_select_db($db, $conn) or die("Could not connect select $db database");
	return $conn;
}

/*
 *Gets the calender by the users ID
 *Preconditions: ID cannot be null
 *Postconditions: returns the calender of the name
 */
function getCalenderName($id){
	$conn = connect();
	
	$result = mysql_query("SELECT Calendar FROM  `Advisors` WHERE ID = '" . $id . "'");
	
	disconnect($conn);
	
	return mysql_fetch_array($result);
}

function disconnect($conn){
	mysql_close($conn);
}

/**Finds out if the day is available or not **/
function checkDay($day){

	 
	$User_ID = $_SESSION["id"];
	$conn = connect();
	$results = mysql_fetch_array(mysql_query("SELECT `" . $day . "` FROM `Availability` WHERE id = " . $User_ID));
	 
	
	if($results[0] == 1){
		return "checked";
	}
}

function getDay(){
	$date = date('m-d-Y');
	$time = date('Y-m-d');
	$year = substr($year,0,4) ;
	$_SESSION["MONTH"] = substr($_SESSION["DATE"],5,7) ;
	$_SESSION["DAY"] = substr($_SESSION["DATE"],7,8) ;
	$_SESSION["theDay"] =  $_SESSION["MONTH"] . "-" . $_SESSION["YEAR"]; 
	$_SESSION["runOnce"] = 1;
	return array($date,$time);
}
function getAdvisorByName($name){
	
	$conn = connect();
		 
	//Gathers the private key to validate the login user
	$result = mysql_query("SELECT * FROM  `Advisors` WHERE Name = '" . $name . "'");
	
	disconnect($conn);
	return mysql_fetch_array($result);
}

//Returns a list of the advisors names
function getAdvisorList(){
	$conn = connect();
	$result = mysql_query("SELECT DISTINCT CONCAT(firstName, ' ', lastName) FROM `Advisors` ");
	
	$rows = array();
	
	while($row = mysql_fetch_array($result)){
		$rows[] = $row[0];
	}
	
	disconnect($conn);
	return $rows;
}

//Returns the number of advisors within the advisors table
function numAdvisors(){
	$conn = connect();
	$result = mysql_query("SELECT COUNT(DISTINCT id) FROM `Advisors`");
	disconnect($conn);
	$num = mysql_fetch_array($result);
	return $num[0];
}

function getAdvisorByID($id){
	$conn = connect();
		 
	//Gathers the private key to validate the login user
	$result = mysql_query("SELECT * FROM  `Advisors` WHERE id = '" . $id . "'");
	
	disconnect($conn);
	return mysql_fetch_array($result);
}

