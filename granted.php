<?php
/**
	*This is the document that is displayed once the login has been preformed
	*this is the central hub of the advising website
	*Author:Josh Standiford
	*Email: jstand1@umbc.edu
	*file: index.php
	*/
session_start();

require_once("libs.php");
 
if(!$_SESSION["auth"]){
	header("Location:index.php");
}

$User_ID = $_SESSION["id"];
$conn = connect();
$query = mysql_query("select firstName FROM Advisors WHERE id = '" . $_SESSION["id"] . "'");
$results = mysql_fetch_array($query);
$firstName = $results[0];
$checkemDubs[0] = "checked";
$_SESSION["alert"] = true; //This determines if the alert is sent or not
//Initializes the calendar and spots
if(!isset($_SESSION["runOnce"])){
	$sess = getDay();
	$_SESSION["theDay"] = $sess[0];
	$_SESSION["DATE"] = $sess[1];
}

disconnect($conn);
?>
<html>
<head>
	<title>Advisor Homepage</title>
	<link rel="shortcut icon" href="Pictures/favicon.ico" />
	<link rel="icon" type="image/png" href="../students/images//icon.png" />
	<link href="Styles/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="Styles/popups.css" rel="stylesheet" type="text/css" media="all" />
	<link href="Styles/alerts.css" rel="stylesheet" type="text/css" media="all" />
	<link href="Styles/theme.css" rel="stylesheet" type="text/css" media="all" />
	<link href="Styles/popoutbox.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
	<!-- this script makes the alerts on mouse over disappear -->
	<script>
	$(document).ready(function()
		{
			$('#alert').mouseover(function() {
			   $("#alert").fadeOut(1000);
			});
		}	
	);
	
	</script>
	 
	<!-- This function -->
	<script>
	$(document).mouseup(function (e)
	{
		var container = new Array();
		container.push($('#'));

		$.each(container, function(key, value) {
			if (!$(value).is(e.target) // if the target of the click isn't the container...
				&& $(value).has(e.target).length === 0) // ... nor a descendant of the container
			{
				$(value).hide();
			}
		});
	});
	</script>
	<!--  -->
	<script type="text/javascript">
	function showInput() {
		if (document.getElementById('group').checked) {
			document.getElementById('ifChecked').style.display = 'block';
			document.getElementById('addAppointment').style.height = '425px';
		}
		else{
		document.getElementById('ifChecked').style.display = 'none';
		document.getElementById('addAppointment').style.height = '228px';
		}
	}
	
	//Sends email when reschedule occurs
	function pushEmail() {
		$.get("email.php");
		return false;
	}
	
	</script>
	<style>
 
  </style>
</head>
<body onload="showInput()" class="body">
<!-- HIDES ALERT FOR NOW
<div class="alerts error" id="alert"><img src="Pictures/error.png" width="40px" height="40px">error completing function</div>
-->
<h5>Welcome back, <?php echo($firstName); ?><a href="logout.php"> logout</a></h5>
 <?php
	echo("Hello");
 
 ?>
</body>
</html>