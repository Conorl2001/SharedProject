<?php
    $servername = "localhost";
    $dbuser = "user";
    $dbname = "clubs";
    $pass = "pass";
	
	$cipher = 'AES-128-CBC';
    $key = 'thebestsecretkey';
    $iv = 'onepossiblevalue';

    $conn = new mysqli($servername, $dbuser, $pass, $dbname) or die("Connection failed %s\n" . $conn -> error);
    $plainUser = $_POST['username'];
    $Password = $_POST['password'];
	$confirmPass = $_POST['confirmPassword'];
    $plainEmail = $_POST['email'];
    $plainStudentID = $_POST['studentID'];
    $plainPhoneNo = $_POST['phoneNo'];
    $plainDob = $_POST['dob'];
    $plainMedicalDecleration = $_POST['medicalDecleration'];
    $plainDoctorInformation = $_POST['doctorInformation'];
    $plainNextOfKinName = $_POST['nextOfKinName'];
    $plainNextOfKinContact = $_POST['nextOfKinContact'];
	if($Password !== $confirmPass)
	{
		echo "Passwords do not match";
	}
	else
	{
		$hashPassword = md5($Password, true);
		$cipherPassword = openssl_encrypt($hashPassword, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherUser = openssl_encrypt($plainUser, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherEmail = openssl_encrypt($plainEmail, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherStudentID = openssl_encrypt($plainStudentID , $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherPhoneNo = openssl_encrypt($plainPhoneNo, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherDob = openssl_encrypt($plainDob, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherMedicalDecleration = openssl_encrypt($plainMedicalDecleration, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherDoctorInformation = openssl_encrypt($plainDoctorInformation, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherNextOfKinName = openssl_encrypt($plainNextOfKinName, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		$cipherNextOfKinContact = openssl_encrypt($plainNextOfKinContact, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		
		$hexPassword = bin2hex($cipherPassword);
		$hexUser = bin2hex($cipherUser);
		$hexEmail = bin2hex($cipherEmail);
		$hexStudentID = bin2hex($cipherStudentID);
		$hexPhoneNo = bin2hex($cipherPhoneNo);
		$hexDob = bin2hex($cipherDob);
		$hexMedicalDecleration = bin2hex($cipherMedicalDecleration);
		$hexDoctorInformation = bin2hex($cipherDoctorInformation);
		$hexNextOfKinName = bin2hex($cipherNextOfKinName);
		$hexNextOfKinContact = bin2hex($cipherNextOfKinContact);
		 
		$sql= "Insert into studentinformation (Username,Password, studentID,email,phoneNo,  dob, medicalDecleration, doctorInformation, nextOfKinName, nextOfKinContact) VALUES ('$hexUser','$hexPassword','$hexStudentID','$hexEmail','$hexPhoneNo','$hexDob','$hexMedicalDecleration','$hexDoctorInformation','$hexNextOfKinName','$hexNextOfKinContact')";
		 
		if ($conn->query($sql) === TRUE) 
		{
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header("Location: http://localhost/SharedProject/login.html");
		} 
		else 
		{
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
    