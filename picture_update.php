<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$photo = $_FILES['photo']['name'];
		
        if(!empty($photo)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			$filename = $photo;	
		}
		else{
			$filename = $voter['photo'];
		}
		
        $sql = "UPDATE voters SET photo = '$filename' WHERE id = '".$voter['id']."'";
        
        if($conn->query($sql)){
            $_SESSION['success'] = 'Profile Picture updated successfully';
        }
        else{
            $_SESSION['error'] = $conn->error;
        }	
    }

	header('location:'.$return);

?>