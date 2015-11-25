<?php
	$con = new mysqli("173.71.126.184:3306","alanrgan","penguins666", "pokerdb");
	if ($con->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$name = $_POST['name'];
?>