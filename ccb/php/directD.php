<?php
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$Pnumber = $_POST['Pnumber'];
	$amount = $_POST['amount'];
	$refNumber = $_POST['refNumber'];
	
	//Database connection
	$conn = new mysqli('localhost','root','','ccb');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("INSERT into deposits (firsname, surname, gender, email, Pnumber, amount, refNumber) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiss", $firsname,
			$surname, $gender, $email, $Pnumber, $amount, $refNumber);
		$stmt->execute();
		echo "Appointment request sent...";
		$stmt->close();
		$conn->close();
	}
?>