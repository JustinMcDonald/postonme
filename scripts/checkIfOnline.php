<?php
if (isset($_SESSION['online']))
{
	if ($_SESSION['online'] == 1)
	{
		echo "<script>showAccountOps();</script>";
		
		$result = mysql_query("SELECT exp FROM account WHERE username='" . mysql_real_escape_string($_SESSION['username']) . "'");
		if (!$result)
		{
			echo "<script>alert('Something went wrong, please try again later.');</script>";
			exit();
		}
		else 
		{
			$account = mysql_fetch_array($result);
			echo "<script>styleSocialColor(" . $account['exp'] . ");</script>";
		}
	}
	else
	{
		echo "<script>showGuestOps(); showGuestLevelMessage();</script>";
	}
	
	echo "<script>showWelcomeMessage('" . $_SESSION['username'] . "'); </script>";
} 
else
{
	include('createGuest.php');
	
	echo "<script>showGuestOps(); showWelcomeMessage('" . $_SESSION['username'] . "'); </script>";
	echo "<script>showGuestLevelMessage();</script>";
}
?>