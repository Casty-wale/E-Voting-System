<?php
	include 'includes/session.php';
	

	if(isset($_POST['add'])){
		$uploadfileTmp = $_FILES['upload']['tmp_name'];
		$uploadfileName = $_FILES['upload']['name'];

        $split = explode(".", $uploadfileName);

        
        if($split[1] == "xls" || $split[1] == "xlsx"){
            require ('PHPExcel/Classes/PHPExcel.php');
            require_once ('PHPExcel/Classes/PHPExcel/IOFactory.php');

            $objExcel = PHPExcel_IOFactory::load($uploadfileTmp);

            foreach($objExcel->getWorksheetIterator() as $worksheet){
                $highestrow = $worksheet->getHighestRow();
                for($row=2; $row<=$highestrow; $row++){
                    $voters_id= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
                    $firstname= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
                    $lastname= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2,$row)->getValue());
                    $email= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
                    $dob= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
                    $gender= strtolower(mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue()));
                    $level= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6,$row)->getValue());
                    $depart= mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7,$row)->getValue());
                    $new_dob= PHPExcel_Shared_Date::ExcelToPHP($dob);
                    $picz = gmdate("Y-m-d", $new_dob);

                    $result = explode('-',$picz);
                    $day = $result[2];
                    $month = $result[1];
                    $year = $result[0];
                    $newdate = $day."-".$month."-".$year;
                    $password = password_hash($newdate, PASSWORD_DEFAULT);

                    
                    $sqlquery = mysqli_query($conn,"SELECT `id` FROM `department` WHERE `depart_name` LIKE '%$depart%'"); 
	
                    $row1 = mysqli_fetch_assoc($sqlquery);
                    $result2 = $row1['id'];


                    $sql = mysqli_query($conn, "INSERT INTO voters (voters_id, password, firstname, lastname, email, dob, level, gender, department_id) 
		            VALUES ('$voters_id', '$password', '$firstname', '$lastname', '$email', '$newdate', '$level', '$gender', '$result2')");
                    
                    $_SESSION['success'] = 'File uploaded successfully.';
                }
            }
        }
        else{
            $_SESSION['error'] = 'Please upload a valid file type.';
        }

	header('location: voters.php');
    }
?>