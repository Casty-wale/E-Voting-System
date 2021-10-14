<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}
	if(isset($_POST['save'])){
		
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$op = validate($_POST['old_password']);
		$np = validate($_POST['new_password']);
		$c_np = validate($_POST['con_password']);

		if($np !== $c_np){
			header("Location: home.php?error=The New and Confirmation Password does not match");
			exit();
		}else{
			$check = password_verify($op, $voter['password']);
			if($check == 1){
				$h_np = password_hash($np, PASSWORD_DEFAULT);
				$sql_1 = "UPDATE voters SET password = '$h_np' WHERE id = '".$voter['id']."'";
				
				if($conn->query($sql_1)){
					$_SESSION['success'] = 'Password updated successfully';
				}
				else{
					header("Location: home.php?error=Sorry, your password failed to update.");
					exit();
				}
			}else{
				header("Location: home.php?error=Your Old Password does not match");
				exit();
			}
			
		}
		
	}
	else{
		header("Location: home.php?error=Fill up required details first");
		exit();
	}

	header('location:'.$return);

?>