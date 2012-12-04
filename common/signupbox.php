<div id='signupcontainer' class='themeborder'>
	<div id='hidesignupbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel("signupcontainer"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='signuptitle'><img src='img/sign_up.png' alt='' width='130px' height='38px'/></div>
	<p><b>Create an account to have all of these awesome features:</b></p>
	<ul>
		<li>Edit your advertisements</li>
		<li>Bump your advertisements</li>
		<li>Delete your advertisements</li>
		<li>Recieve LiveChat messages</li>
	</ul>
	<form id='signupform' action='' method=post onsubmit='signUp(); return false;'>
		<div>Username:</div>
		<input type='text' name='signupusername' id='signupusername' class='themeborder' maxlength=15 autocomplete='off'/>
		<div>Password:</div>
		<input type='password' name='signuppassword1' id='signuppassword1' class='themeborder' maxlength=15 autocomplete='off'/>
		<div>Retype Password:</div>
		<input type='password' name='signuppassword2' id='signuppassword2' class='themeborder' maxlength=15 autocomplete='off'/>
		<div>Email:</div>
		<input type='text' name='signupemail' id='signupemail' class='themeborder' maxlength=50 autocomplete='off'/>
		<!--<div>Referred By: <span style='font-size:0.8em'>(optional)</span></div>
		<input type='text' name='signupreference' id='signupreference' class='themeborder' maxlength=15 autocomplete='off'/>-->
		<input type='submit' name='signupsubmit' value='Register Me!' class='themeborder cursorhand themecolor chatbutton' title='Register this Account'/>
		<div style='font-size:0.8em;margin-left:5px;'>By registering you agree to our <a href='terms.php' target='_blank' title='Terms of Use'>Terms of Use</a> and <a href='privacy.php' target='_blank' title='Privacy Policy'>Privacy Policy</a>.</div>
	</form>
	<div id='signupinformation'>An email has been sent to the address you provided. Please follow the directions to activate your account!</div>
</div>