<?php
    session_start();
    include 'includes/conn.php';
   //checking the verification code.
   if(isset($_POST["generate"])){
        $token = $_POST['vcode'];
        $id = $_GET['Code'];

        echo $_SESSION['id'];

        $vsql = "SELECT * FROM voters WHERE verification_code = '$token' AND id = '$id'";
        $query3 = $conn->query($vsql);
        //$row = $query3->fetch_assoc();
        
        if($query3->num_rows < 1){
            $_SESSION['error'] = 'The varification code is invalid';
            //exit();
        }
        else{
            $vsql_1 = "UPDATE voters SET verification_code = 0, activate = 1 WHERE id = '$id'";
            $setCode = $conn->query($vsql_1);
            header('location: reset.php?id='.$id);
            
        }
    }

    header('location: code.php');
?>