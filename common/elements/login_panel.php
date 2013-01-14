<div id='loginbox' class='themeborder glasspanel'>
	<div class='cursorhand leftarrowbutton' onclick='hideGlassPanel("loginbox"); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='chatsignin'>
		<form id='chatsigninform' action='' method='post' onsubmit='chatLogin(); return false;'>				
			<div>Username:</div>
			<div><input type='text' name='signinusername' id='signinusername' class='themeborder' maxlength='15'/></div>
			<div>Password:</div>
			<div><input type='password' name='signinpassword' id='signinpassword' class='themeborder' maxlength='15'/></div>
			<div><br/></div>
			<div><input type='submit' name='signinsubmit' value='Log In' class='themeborder cursorhand themecolor chatbutton' title='Sign in with the credentials above.'/></div>
		</form>
	</div>
</div>