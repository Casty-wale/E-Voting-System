<?php
    session_start();
	include 'includes/conn.php';
    

    /////////////*Token Generator*////////////
    function Token_Generator($username){
        // $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
        $token = md5($username .microtime());
        return $token;
    }
    /////////////*Send Email Function*////////////
    function send_email($email,$sub,$msg,$header){
        return mail($email,$sub,$msg,$header);
    }

	if(isset($_POST['generate'])){
		$voter = $_POST['voter'];

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Student ID is incorrect. Please try again..';
		}
		else{
			$row = $query->fetch_assoc();
            $username = $row['firstname'] .$row['lastname'];
            
            $Email = $row['email'];
            $vote_id = $row['id'];
            $code = Token_Generator($username);
            
            // " positions (description, max_vote, priority) VALUES ('$description', '$max_vote', '$priority')";
            $sql_1 = "UPDATE voters SET verification_code = '$code', activate = 0 WHERE id = '".$vote_id."'";
            $setCode = $conn->query($sql_1);
            $subject = "Reset Your Password, the varification code is " .$code;
            $msg = "Please click the link below to reset your account password http://localhost/voting/code.php?Email=$Email&Code=".$vote_id;
            $header = "From: No-Reply admin@nolineittuts.com";
			
            send_email($Email,$subject,$msg,$header);
            
            if(send_email($Email,$subject,$msg,$header)){
                $_SESSION['success'] = 'A varification link has been sent to your E-mail';

            }
            else{
                $_SESSION['error'] = "Sorry, we couldn't send you an mail... Please try again.";
            }
		}
    
	}
    
    header('location: recover_model.php');

?>