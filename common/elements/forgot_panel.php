<div id='forgotbox' class='themeborder glasspanel'>
	<div id='hideforgotbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel("forgotbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<p><b>Forgot your password?</b></p>
	<p>No problem.</p>
	<p>We'll send you an email to reset your password, you'll be on your way in a few minutes.</p>
	<div>Email:</div>
	<form id='forgotform' action='' method=post onsubmit='forgotPassword(); return false;'>
		<input type='text' name='forgotemail' id='forgotemail' class='themeborder'/>
		<input type='submit' name='forgotsubmit' value='Send Email' class='themeborder cursorhand themecolor chatbutton' title='Send an email to reset your password.'/>
	</form>
</div>