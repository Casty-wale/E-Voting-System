<?php
	include 'includes/session.php';
	

	if(isset($_POST['add'])){
		$voters_id = $_POST['voters_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$level = $_POST['level'];
		$gender = strtolower($_POST['gender']);
		$depart = $_POST['department'];
		
		$result = explode('-',$dob);
		$day = $result[2];
		$month = $result[1];
		$year = $result[0];
		$newdate = $day."-".$month."-".$year;
		$password = password_hash($newdate, PASSWORD_DEFAULT);
		$email = $voters_id."@upsa.edu.gh";

		$sqlquery = mysqli_query($conn,"SELECT `id` FROM `department` WHERE `depart_name` = '$depart'"); 
	
		$row = mysqli_fetch_assoc($sqlquery);
		$result = $row['id'];

		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, dob, level, gender, department_id) 
		VALUES ('$voters_id', '$password', '$firstname', '$lastname', '$email', '$dob', '$level', '$gender', '$result')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>