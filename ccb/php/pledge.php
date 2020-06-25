<?php
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$Pnumber = $_POST['Pnumber'];
	$PAdress=$_POST['PAdress'];
	$typeOfPledge=$_POST['typeOfPledge'];
	$frequencyOfPledge=$_POST['frequencyOfPledge'];
	$donatedBy= $_POST['donatedBy'];
	$amount = $_POST['amount'];
	
	Database connection
	$conn = new mysqli('localhost','root','','ccb');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else
	{
		$stmt = $conn->prepare("INSERT into pledges (firsname, surname, age, gender,
			email, Pnumber, PAdress,typeOfPledge, frequencyOfPledge, donatedBy, amount) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssississsss", $firsname, $surname, $age, $gender, 
			$email, $Pnumber, $PAdress, $typeOfPledge, $frequencyOfPledge, $donatedBy, $amount);
		$stmt->execute();
		echo "Appointment request sent...";
		$stmt->close();
		$conn->close();
	}
	
	?>