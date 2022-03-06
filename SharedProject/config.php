<?php
    $servername = "localhost";
    $dbuser = "user";
    $dbname = "clubs";
    $pass = "pass";
	$conn = new mysqli($servername, $dbuser, $pass, $dbname) or die("Connection failed %s\n" . $conn -> error);
?>