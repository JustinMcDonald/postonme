<div id='changepasswordbox' class='themeborder glasspanel'>
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
