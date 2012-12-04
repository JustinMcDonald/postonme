<?php
$user = $_GET['user'];
$reset = $_GET['reset'];
$code = $_GET['code'];

if ($reset)
{
	$response = mysql_query("SELECT verificationcode, active FROM account WHERE username='$user'");
	if ($response)
	{
		$activateaccount = mysql_fetch_array($response);
		$accountcode = $activateaccount['verificationcode'];
		$accountactive = $activateaccount['active'];
	}
	else 
	{
		echo "<script>alert('aSomething went wrong, please try again later.');</script>";
		exit();
	}
	
	if ($code == $accountcode && $accountactive)
	{
		echo "
			<div id='resetpassbox' class='themeborder'>
				<div id='hideforgotbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel(\"resetpassbox\"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
				<form id='resetpassform' action='' method='post' onsubmit='resetPassword(\"$user\", \"$code\"); return false;'>
					<p><b>Create a new password:</b></p>
					<div>Password:</div>
					<input type='password' name='resetpassword1' id='resetpassword1' class='themeborder' maxlength=15 autocomplete='off'/>
					<div>Retype Password:</div>
					<input type='password' name='resetpassword2' id='resetpassword2' class='themeborder' maxlength=15 autocomplete='off'/>
					<input type='submit' name='resetsubmit' value='Reset Password' class='themeborder cursorhand themegradient chatbutton' title='Reset my passwords.'/>
				</form>
			</div>";
	}
	else echo "<script>alert('bSomething went wrong, please try again later.');</script>";
	
	echo "<script>$('#resetpassword1').focus();</script>";
}
?>