<?php
include('/home/postonme/hidden_scripts/db.php');

$query = "SELECT * FROM account WHERE username LIKE 'Guest%' AND tmponline=false";

$accounts = mysql_query($query);

while($account = mysql_fetch_array($accounts))
{	
	$username = $account['username'];
	
	$query = "UPDATE conversation SET active_inquirer=false WHERE inquirer='$username'";
	if(!mysql_query($query)) error_log(mysql_error(), 0);
	
	//$query = "DELETE FROM messages WHERE username='$username'";
	//if(!mysql_query($query)) error_log(mysql_error(), 0);
	
	$query = "DELETE FROM account WHERE username='$username'";
	if(!mysql_query($query)) error_log(mysql_error(), 0);
}
?>
