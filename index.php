 <?php
	/**
	*This document is designed to be the front end of the webpage
	*Author:Josh Standiford
	*Email: jstand1@umbc.edu
	*file: index.php
	*/
 ?>
<html>
<head>
	<title>Scheduler</title>
	<link href="Styles/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="shortcut icon" href="Pictures/calendar.ico" />
</head>
<body style="background-color:#445566">
<div>
	<!--This div creates a buffer zone for the login -->
	<div id="buffer" style="text-align:center">
	<hr>
	<h1>Scheduler log-in </h1>
	<hr>
	</div> 
	
	<div id="login">
		<div id="loginBox">
			<form action="login.php" method="post">
			Username<br>
			<input type="text" name="name"><br>
			<!-- Change type to password from text once you get done -->
			Password<br>
			<input type="password" name="password"><br>
			<input type="submit">
			</form>
		</div>
	</div>
	
</div>
</body>
</html>