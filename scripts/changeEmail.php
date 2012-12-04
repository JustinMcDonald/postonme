<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
$pass = $_POST['pass'];
$newemail = $_POST['newemail'];

$encrypt = md5($pass);

if ($encrypt == $_SESSION['password'])
{
	if (!filter_var($newemail, FILTER_VALIDATE_EMAIL))
	{
		echo "Please provide a valid email.";
		exit();
	}
	
	$query = "SELECT email FROM account WHERE email=\"$newemail\"";  
	$result = mysql_query($query);  

	if (mysql_num_rows($result) > 0)
	{
		echo "The email you provided is already linked to another account.";
		exit();
	}
	$validation = include('/home/postonme/hidden_scripts/validate.php');
	if ($validation != 1) exit();
	
	$user = $_SESSION['username'];
	
	if (!mysql_query("UPDATE account SET email='$newemail' WHERE username='$user'")) echo "Something went wrong, please try again later.";
	
	if (!mysql_query("UPDATE advertisement SET contact='$newemail' WHERE username='$user'")) echo "Something went wrong, please try again later.";
	else echo SUCCESS;
}
else echo "Password mismatch.";
?>