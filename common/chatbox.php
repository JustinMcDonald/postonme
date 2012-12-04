<div id='chatbox' class='themeborder'>
	<div style='height:15%'></div>
	<div id='hidechatbutton' class='cursorhand leftarrowbutton' onclick='hideChat(); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='chatsignincontainer'>
		<div id='chattitle'><img src='img/live_chat.png' alt='' width='127px' height='29px'/></div>
		<input type='button' id='youraccount' value='Your Ads' class='themeborder cursorhand themecolor chatbutton' onclick='window.location.href = "http://www.postonme.com/account.php"' title='Visit your advertisement page'/>
		<input type='button' id='chatsignout' value='Log Out' class='themeborder cursorhand themecolor chatbutton' onclick='chatLogout(); return true;' title='Log Out'/>
		<input type='button' id='accountsettings' value='Account Settings' class='themeborder cursorhand themecolor chatbutton' onclick='showGlassPanel("settingsbox"); return true;' title='View or change your account settings.'/>
		<div id='chatsignin'>
			<form id='chatsigninform' action='' method=post onsubmit='chatLogin(); return false;'>				
				<div>Username:</div>
				<input type='text' name='signinusername' id='signinusername' class='themeborder' maxlength=15/>
				<div>Password:</div>
				<input type='password' name='signinpassword' id='signinpassword' class='themeborder' maxlength=15/>				
				<input type='submit' name='signinsubmit' value='Log In' class='themeborder cursorhand themecolor chatbutton' title='Sign in with the credentials above.'/>
				<input type='button' name='signupsubmit' value='Register' class='themeborder cursorhand themecolor chatbutton' onclick='showGlassPanel("signupcontainer"); return true;' title='Register your own account.'/>
				<div id='forgotbutton' class='cursorhand' onclick='showGlassPanel("forgotbox"); return true;' title='Forgot your password?'>Forgot?</div>
			</form>
		</div>
	</div>
	<div id='chatinformation'>
		<img src='img/chat_info.png' alt='' width='200px' height='78px'/>
	</div>
	<div id='chattitlecontainer'></div>
	<div id='chattextcontainer'></div>
	<div id='outboxcontainer'></div>
</div>

<div id='forgotbox' class='themeborder'>
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

<div id='settingsbox' class='themeborder'>
	<div id='hideforgotbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel("settingsbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<p><b>Account Settings</b></p>
	<input type='button' id='changeemail' value='Change Email' class='themeborder cursorhand themecolor chatbutton' onclick='showGlassPanel("changeemailbox"); return true;' title='View or change your account settings.'/>
	<input type='button' id='changepassword' value='Change Password' class='themeborder cursorhand themecolor chatbutton' onclick='showGlassPanel("changepasswordbox"); return true;' title='View or change your account settings.'/>
</div>

<div id='changeemailbox' class='themeborder'>
	<div id='hideforgotbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel("changeemailbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<p><b>Change Your Email</b></p>
	<div>Password:</div>
	<input type='password' name='changeemailpassword' id='changeemailpassword' class='themeborder' maxlength=15/>
	<div>New Email:</div>
	<input type='text' name='changeemailemail' id='changeemailemail' class='themeborder'/>
	<input type='submit' name='changeemailconfirm' value='Change Email' class='themeborder cursorhand themecolor chatbutton' onclick='changeEmail(); return true;' title='Confirm email change'/>
</div>

<div id='changepasswordbox' class='themeborder'>
	<div id='hideforgotbutton' class='cursorhand leftarrowbutton' onclick='hideGlassPanel("changepasswordbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<p><b>Change Your Password</b></p>
	<div>Current Password:</div>
	<input type='password' name='changepasswordcurrent' id='changepasswordcurrent' class='themeborder' maxlength=15/>
	<div>New Password:</div>
	<input type='password' name='changepasswordnew' id='changepasswordnew' class='themeborder' maxlength=15/>
	<div>Retype New Password:</div>
	<input type='password' name='changepasswordnew2' id='changepasswordnew2' class='themeborder' maxlength=15/>
	<input type='submit' name='changepasswordconfirm' value='Change Password' class='themeborder cursorhand themecolor chatbutton' onclick='changePassword(); return true;' title='Confirm password change'/>
</div>

<div id='showchatbutton' onclick='showChat(); return true;'><img class='cursorhand rightarrowbutton' src='img/expandThumb.png' alt='' width='18px' height='18px'/></div>