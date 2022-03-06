<?php
    $servername = "localhost";
    $dbuser = "user";
    $dbname = "clubs";
    $pass = "pass";
	$conn = new mysqli_connect($servername, $dbuser, $pass, $dbname);
	
	if(!$conn)
	{
		die(mysqli_connect_error());
	}
?>