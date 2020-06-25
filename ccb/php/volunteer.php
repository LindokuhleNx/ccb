<?php
	$name = $_POST['firstname'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$Pnumber = $_POST['Pnumber'];
	$PAdress=$_POST['PAdress'];
	$message=$_POST['message'];
	
	//Database connection
	$conn = new mysqli('localhost','root','','ccb');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("INSERT into volunteer (name, surname, age, gender,
			email, Pnumber, PAdress, message) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssississ", $name, $surname, $age, $gender, 
			$email, $Pnumber, $PAdress, $message);
		$stmt->execute();
		echo "Appointment request sent...";
		$stmt->close();
		$conn->close();
	}
?>