<?php

    $server = "sql108.epizy.com";
    $username = "epiz_28823347";
    $password = "b5yTQowjh0yw";
    $dbname = "epiz_28823347_vote";

	$conn = mysqli_connect($server, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	
?>