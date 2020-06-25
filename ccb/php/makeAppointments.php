<?php
//ini_set('error_reporting', E_ALL);
	$meetingTime = $_POST['meetingTime'];
	$meetingType = $_POST['meetingType'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$Pnumber = $_POST['Pnumber'];
	//Database connection
	$conn = new mysqli('localhost','root','','ccb');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("INSERT into appointments (meetingTime, meetingType, 
			firsname, surname, age, gender, email, Pnumber) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssissi", $meetingTime, $meetingType, $firsname,
			$surname, $age, $gender, $email, $Pnumber);
		$stmt->execute();
		echo "Appointment request sent...";
		$stmt->close();
		$conn->close();
	}
?>