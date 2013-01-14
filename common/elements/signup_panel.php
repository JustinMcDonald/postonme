<div id='signupbox' class='themeborder glasspanel'>
	<div class='cursorhand leftarrowbutton' onclick='hideGlassPanel("signupbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='signuptitle'><img src='img/sign_up.png' alt='' width='130px' height='38px'/></div>
	<p><b>Create an account to have all of these awesome features:</b></p>
	<ul>
		<li>Edit your advertisements</li>
		<li>Bump your advertisements</li>
		<li>Delete your advertisements</li>
		<li>Recieve LiveChat messages</li>
	</ul>
	<form id='signupform' action='' method='post' onsubmit='signUp(); return false;'>
		<div>Username:</div>
		<div><input type='text' name='signupusername' id='signupusername' class='themeborder' maxlength='15'/></div>
		<div>Password:</div>
		<div><input type='password' name='signuppassword1' id='signuppassword1' class='themeborder' maxlength='15'/></div>
		<div>Retype Password:</div>
		<div><input type='password' name='signuppassword2' id='signuppassword2' class='themeborder' maxlength='15'/></div>
		<div>Email:</div>
		<div><input type='text' name='signupemail' id='signupemail' class='themeborder' maxlength='50'/></div>
		<!--<div>Referred By: <span style='font-size:0.8em'>(optional)</span></div>
		<input type='text' name='signupreference' id='signupreference' class='themeborder' maxlength=15/>-->
		<div><input type='submit' name='signupsubmit' value='Register Me!' class='themeborder cursorhand themecolor chatbutton' title='Register this Account'/></div>
		<div style='font-size:0.8em;margin-left:5px;'>By registering you agree to our <a href='terms.php' title='Terms of Use' id='suterms'>Terms of Use</a> and <a href='privacy.php' title='Privacy Policy' id='suprivacy'>Privacy Policy</a>.</div>
	</form>
	<div id='signupinformation'>An email has been sent to the address you provided. Please follow the directions to activate your account!</div>
</div>