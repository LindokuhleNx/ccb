<?php
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$Pnumber = $_POST['Pnumber'];
	$PAdress=$_POST['PAdress'];
	$iterms=$_POST['iterms'];
	
	//Database connection
	$conn = new mysqli('localhost','root','','ccb');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("INSERT into fooddonations (firsname, surname, 
			email, Pnumber, PAdress, iterms) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $firsname, $surname, 
			$email, $Pnumber, $PAdress, $iterms);
		$stmt->execute();
		echo "Appointment request sent...";
		$stmt->close();
		$conn->close();
	}
?>