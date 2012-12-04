<?php
if (isset($_SESSION['online']))
{
	if ($_SESSION['online'] == 1)
	{
		echo "<script>hideChatLogin(); shiftFrontColumnsLeft();</script>";
		
		$result = mysql_query("SELECT exp FROM account WHERE username=\"" . $_SESSION['username'] . "\"");
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
		echo "<script>showChatLogin(); showGuestLevelMessage();</script>";
	}
	
	echo "<script>showWelcomeMessage('" . $_SESSION['username'] . "'); if (document.URL.substring(24,28)=='post') formChecks();</script>";
} 
else
{
	include('createGuest.php');
	
	echo "<script>showChatLogin(); showWelcomeMessage('" . $_SESSION['username'] . "'); if (document.URL.substring(24,28)=='post') formChecks();</script>";
	echo "<script>showGuestLevelMessage();</script>";
}
?>