<?php
$_SESSION['online'] = 0;
$unique = false;
$num = 0;
while (!$unique)
{
	$num = rand(10, 10000);
	$query = "SELECT username FROM account WHERE username=\"Guest" . $num . "\"";  
	$result = mysql_query($query); 
	if (!$result)
	{
		echo "<script>alert('Something went wrong, please try again later.');</script>";
		exit();
	}
	if (!(mysql_num_rows($result) > 0))
	{
		$guestname = "Guest" . $num;
		$query = "INSERT INTO account (username, online, tmponline, email) VALUES ('$guestname', false, true, '$guestname')"; 
		if(!mysql_query($query))
		{
			echo "<script>alert('Something went wrong, please try again later.');</script>";
			exit();
		}
		$_SESSION['username'] = "Guest" . $num;
		$unique = true;
	} 
}
?>