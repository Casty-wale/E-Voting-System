<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$voters_id = $_POST['voters_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$level = $_POST['level'];
		$depart = $_POST['department'];

		$sqlquery = mysqli_query($conn,"SELECT `id` FROM `department` WHERE `depart_name` = '$depart'"); 
	
		$row1 = mysqli_fetch_assoc($sqlquery);
		$result = $row1['id'];

		$sql = "SELECT * FROM voters WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


		$sql = "UPDATE voters SET voters_id = '$voters_id', firstname = '$firstname', lastname = '$lastname', dob = '$dob', level = '$level', department_id = '$result' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: voters.php');

?>