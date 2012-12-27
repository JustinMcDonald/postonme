<?php
include('/home/postonme/hidden_scripts/db.php');

$query = "SELECT * FROM account WHERE username LIKE 'Guest%' AND tmponline=false";

$accounts = mysql_query($query);

while($account = mysql_fetch_array($accounts))
{	
	$username = $account['username'];
	
	$cids = mysql_query("SELECT id FROM conversation WHERE (active_inquirer=true AND inquirer='$username') OR (active_poster=true AND poster='$username')");
	
	if (!$cids) error_log($cids);
	
	$time = time();
	while($cid = mysql_fetch_array($cids))
	{
		mysql_query("INSERT INTO messages (conv_id, date, written_by, message, read_message) VALUES ('$cid', $time, 'POSTONME', '$username has left the conversation.', 0)");
	}
	
	$query = "UPDATE conversation SET active_inquirer=false WHERE inquirer='".mysql_real_escape_string($username)."'";
	if(!mysql_query($query)) error_log(mysql_error(), 0);
	
	$query = "UPDATE conversation SET active_poster=false WHERE poster='".mysql_real_escape_string($username)."'";
	if(!mysql_query($query)) error_log(mysql_error(), 0);
	
	//$query = "DELETE FROM messages WHERE username='$username'";
	//if(!mysql_query($query)) error_log(mysql_error(), 0);
	
	$query = "DELETE FROM account WHERE username='".mysql_real_escape_string($username)."'";
	if(!mysql_query($query)) error_log(mysql_error(), 0);
}
?>
