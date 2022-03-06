<?php
    $servername = "localhost";
    $dbuser = "user";
    $dbname = "clubs";
    $pass = "pass";
	$conn = new mysqli($servername, $dbuser, $pass, $dbname) or die("Connection failed %s\n" . $conn -> error);
	
	$cipher = 'AES-128-CBC';
    $key = 'thebestsecretkey';
    $iv = 'onepossiblevalue';
	
	$sql = "SELECT Username, studentID, email, phoneNo, dob, medicalDecleration, doctorInformation, nextOfKinName, nextOfKinContact FROM studentInformation";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$cipherUser = hex2bin($row["Username"]);
			$plainUser = openssl_decrypt($cipherUser, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherStudentID = hex2bin($row["studentID"]);
			$plainStudentID = openssl_decrypt($cipherStudentID, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherEmail = hex2bin($row["email"]);
			$plainEmail = openssl_decrypt($cipherEmail, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherPhoneNo = hex2bin($row["phoneNo"]);
			$plainPhoneNo = openssl_decrypt($cipherPhoneNo, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherDob = hex2bin($row["dob"]);
			$plainDob = openssl_decrypt($cipherDob, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherMedicalDecleration = hex2bin($row["medicalDecleration"]);
			$plainMedicalDecleration = openssl_decrypt($cipherMedicalDecleration, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherDoctorInformation = hex2bin($row["doctorInformation"]);
			$plainDoctorInformation = openssl_decrypt($cipherDoctorInformation, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherNextOfKinName = hex2bin($row["nextOfKinName"]);
			$plainNextOfKinName = openssl_decrypt($cipherNextOfKinName, $cipher, $key, OPENSSL_RAW_DATA, $iv);
			$cipherNextOfKinContact = hex2bin($row["nextOfKinContact"]);
			$plainNextOfKinContact = openssl_decrypt($cipherNextOfKinContact, $cipher, $key, OPENSSL_RAW_DATA, $iv);
		echo "Username: " . $plainUser. "<br> student ID: " . $plainStudentID. "<br> email: " . $plainEmail. "<br> Phone Number: " . $plainPhoneNo. "<br> Date of Birth: " . $plainDob . "<br> Medical Decleration: " . $plainMedicalDecleration. "<br> Doctor Information: " . $plainDoctorInformation;
		}
	}
	else 
	{
		echo "0 results";
	}
	$conn->close();
?>