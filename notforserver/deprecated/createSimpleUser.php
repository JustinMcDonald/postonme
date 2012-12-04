<?php
include('session.php');

$user = $_GET["user"];
$pass = $_GET["pass"];

include('db.php');

$query = "SELECT username FROM account WHERE username=\"$user\"";  
$result = mysql_query($query);  

if (!(mysql_num_rows($result) > 0)) { 

	$query = "INSERT INTO account (username, password) VALUES (\"$user\", \"$password\")"; 

	if (mysql_query($query)) {
		echo "Account successfully created!";
		$_SESSION['username'] = $user;
		$_SESSION['password'] = $pass;
		$_SESSION['online'] = true;
	} else echo "Account creation failed:" . mysql_error();
} else echo "That username already exists";
?>