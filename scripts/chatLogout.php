<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

$validation = include("/home/postonme/hidden_scripts/validate.php");

if  ($validation == 1)
{
	$user = $_SESSION['username'];
	$query = "UPDATE account SET online=false WHERE username='$user'";
	$result = mysql_query($query);
	if ($result)
	{
		$sessid = session_id();
		mysql_query("DELETE FROM sessions WHERE ID=$sessid");
		
		$_SESSION['password'] = '';
		
		include('createGuest.php');
	
		echo SUCCESS;
	} 
	else echo SQL_ERROR;
}
else {
	echo $validation;
}
?>