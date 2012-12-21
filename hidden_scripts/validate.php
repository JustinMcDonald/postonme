<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('db.php');

if ($_SESSION['online'] == true)
{
	$validateuser = $_SESSION['username'];
	$validatepass = $_SESSION['password'];
} 
else
{
	$validateuser = $tempuser;
	$validatepass = $temppass;
}

$response = mysql_query("SELECT password, active, username FROM account WHERE username='".mysql_real_escape_string($validateuser)."'");

if ($response)
{
	if (mysql_num_rows($response) > 0)
	{
		while ($account = mysql_fetch_array($response))
		{
			$realpass = $account['password'];
			$active = $account['active'];
			$properusername = $account['username'];
			if ($validatepass == $realpass)
			{
				if ($active) return SUCCESS;
				else return ACCOUNT_INACTIVE;
			}
			else return PASSWORD_MISMATCH;
		}
		return SQL_ERROR;
	}
	else return PASSWORD_MISMATCH;
}
else
{
	error_log(mysql_error(), 0);
	return SQL_ERROR;
}
?>