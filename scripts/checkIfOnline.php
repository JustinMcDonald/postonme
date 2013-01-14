<?php
if (isset($_SESSION['online']))
{
	if ($_SESSION['online'] == 1)
	{
		echo "<script type='text/javascript'>showAccountOps();</script>";
		
		$result = mysql_query("SELECT exp FROM account WHERE username='" . mysql_real_escape_string($_SESSION['username']) . "'");
		if (!$result)
		{
			echo "<script type='text/javascript'>alert('Something went wrong, please try again later.');</script>";
			exit();
		}
		else 
		{
			$account = mysql_fetch_array($result);
			echo "<script type='text/javascript'>styleSocialColor(" . $account['exp'] . ");</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>showGuestOps(); showGuestLevelMessage();</script>";
	}
	
	echo "<script type='text/javascript'>showWelcomeMessage('" . $_SESSION['username'] . "'); </script>";
} 
else
{
	include('createGuest.php');
	
	echo "<script type='text/javascript'>showGuestOps(); showWelcomeMessage('" . $_SESSION['username'] . "'); </script>";
	echo "<script type='text/javascript'>showGuestLevelMessage();</script>";
}
?>