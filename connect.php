<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'formdb';

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];

//Database connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn -> connect_error) {
		die('Connection Failed: ' . $conn -> connect_error);
	} else {
		$stmt = $conn->prepare('Insert into dbconnect(fname, lname, gender) values(?, ?, ?)');	//dbconnect hoilo tableName. 3ta '?' mane 3ta column er value, ja amra html form a input krbo
		$stmt -> bind_param('sss', $fname, $lname, $gender);	//'s' for string, integer thakle 'i'
		$stmt -> execute();
		echo "Form Connected Successfully";
		$stmt -> close();
		$conn -> close();
	}


?>