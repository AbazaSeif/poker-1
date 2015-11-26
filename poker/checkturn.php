<?php
	$con = new mysqli("localhost","root","password", "pokerdb");
	if ($con->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$name = $_POST['name'];
?>
