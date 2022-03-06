<?php
    $servername = "localhost";
    $dbuser = "user";
    $dbname = "clubs";
    $pass = "pass";
	$conn = new mysqli($servername, $dbuser, $pass, $dbname) or die("Connection failed %s\n" . $conn -> error);


	
	$cipher = 'AES-128-CBC';
    $key = 'thebestsecretkey';
    $iv = 'onepossiblevalue';

	$plainUsername = $_POST['username'];
    $password = $_POST['password'];
	$passwordHash = md5($password, true);
	
	$cipherUser = openssl_encrypt($plainUsername, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$hexUser = bin2hex($cipherUser);
	
    $sql = "SELECT Username, Password FROM studentInformation WHERE username = '$hexUser'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$cipherUser = hex2bin($row["Username"]);
			$plainUser = openssl_decrypt($cipherUser, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$databasePass = hex2bin($row["Password"]);
			$plainDatabasePass = openssl_decrypt($databasePass ,$cipher, $key, OPENSSL_RAW_DATA, $iv);
			$VerifyPass = password_verify($plainDatabasePass, $passwordHash);
			if($VerifyPass)
			{
				header("Location:loggedData.php");
				$_SESSION["username"] = $cipherUsername;
				$_SESSION["password"] = $cipherPassword;
			}
		}
	}
	else 
	{
		echo "Username/Password Combination Incorrect";
	}
	$conn->close();
?>