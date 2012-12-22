<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');

$newuser = $_POST["user"];
$newpass = $_POST["pass"];
$email = $_POST["email"];
//$reference = $_POST["refer"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "Please provide a valid email.";
	exit();
}

$encrypt = md5($newpass);

$query = "SELECT username FROM account WHERE username='".mysql_real_escape_string($newuser)."'";  
$result = mysql_query($query);  

if (!(mysql_num_rows($result) > 0))
{
	$query = "SELECT email FROM account WHERE email='".mysql_real_escape_string($email)."'";  
	$result = mysql_query($query);  

	if (!(mysql_num_rows($result) > 0))
	{
		/*if ($reference != '')
		{
			$query = "SELECT username FROM account WHERE username='".mysql_real_escape_string($reference)."'";  
			$result = mysql_query($query); 
		}

		if (mysql_num_rows($result) > 0 || $reference == '')
		{*/
			$verification_code = generateRandomString(32);
			//$query = "INSERT INTO account (username, password, email, verificationcode, reference) VALUES (\"$newuser\", \"$encrypt\", \"$email\", \"$verification_code\", \"$reference\")";
			$query = "INSERT INTO account (username, password, email, verificationcode) VALUES ('".mysql_real_escape_string($newuser)."', '".mysql_real_escape_string($encrypt)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($verification_code)."')";
			//$query = "INSERT INTO account (username, password, email, verificationcode, chatIP) VALUES ('".mysql_real_escape_string($newuser)."', '".mysql_real_escape_string($encrypt)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($verification_code)."', $_SERVER['REMOTE_ADDR'])";
			if (mysql_query($query))
			{
				include('/home/postonme/public_html/email/emailVerification.php');
				/*$_SESSION['username'] = $newuser;
				$_SESSION['password'] = $encrypt;
				$_SESSION['online'] = true;*/
				echo SUCCESS . $newuser;
			}
			else echo SQL_ERROR;
		/*}
		else echo INVALID_REFERENCE;*/
	}
	else echo EMAIL_EXISTS;
}
else echo ACCOUNT_EXISTS;

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>