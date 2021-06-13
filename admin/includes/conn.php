<?php
	$conn = new mysqli('localhost', 'root', '', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	// $server = "sql109.epizy.com";
    // $username = "epiz_28826396";
    // $password = "6h6wuKayiEZ24y";
    // $dbname = "epiz_28826396_dbvote";

	// $conn = mysqli_connect($server, $username, $password, $dbname);

	// if (!$conn) {
	//     die("Connection failed: " . mysqli_connect_error());
	// }
?>