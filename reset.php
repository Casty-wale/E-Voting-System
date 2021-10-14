<?php

//Resetting password after verification code is authenticated.

                
    if(isset($_POST["generate"])){
        $new_p = $_POST['new_password'];
        $Cnew_p = $_POST['Cnew_password'];
        $id = $_GET['id'];

        if($new_p != $Cnew_p){
            $_SESSION['error'] = 'The Password does not match. Please try again';
        }
        else{

            $np = password_hash($new_p, PASSWORD_DEFAULT);
            $Csql = "UPDATE voters SET password = '$np' WHERE id = '$id'";
            
            if($conn->query($Csql)){

                $_SESSION['success'] = "Password updated successfully. <a href='index.php'>Click here to login.</a>";
                // header('location: index.php');
                //exit();
            }
            else{
                $_SESSION['error'] = "Sorry, your password failed to update.";
                //exit();
            }

        }
    }

    header('location: reset_model.php');

?>