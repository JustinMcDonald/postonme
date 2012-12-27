function chatLogout() 
{
	$.ajax({
		url: "./scripts/chatLogout.php",
		type: "post",
		success: function(response, textStatus, jqXHR)
		{
			switch(response)
			{
				case "1":
					//location.reload(true);
					location.href = 'http://www.postonme.com';
					break;
				default:
					alert("Something went wrong, please try again later.");
					break;
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong. Please try again later.");
		}
	});
}

function chatLogin()
{
	var form = window.top.document.getElementById('chatsigninform');
	removeFormErrors(form);
	var username = form.elements['signinusername'].value;
	var password = form.elements['signinpassword'].value;
	if (username == "")
	{
		indicateError('signinusername');
		alert("Please provide your username.");
		return;
	}
	if (password == "")
	{
		indicateError('signinpassword');
		alert("Please provide your password.");
		return;
	}
	
	if (window.chatinterval) window.clearInterval(window.chatinterval);
	
	var dataString = "user="+username+"&pass="+password;
	
	$.ajax({
		type: "POST",
		url: "./scripts/chatLogin.php",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			try
			{
				var json = JSON.parse(response);
				switch(json[0])
				{
					case 1:
						showWelcomeMessage(json[1]);
						styleSocialColor(json[2]);
						showAccountOps();
						if ( typeof showEditColumn == 'function' ) showEditColumn();
						loadMessages();
						hideGlassPanel('loginbox');
						break;
					case 2:
						alert("You must activate your account before logging in. Look for your account verification code in your email.");
						break;
					case 3:
						indicateError('signinusername');
						indicateError('signinpassword');
						alert("Password mismatch. Please retype your username and/or password.");
						break;
					default:
						alert("Something went wrong, please try again later.");
						location.reload(true);
						break;
				}
			}
			catch(e)
			{
				alert("Something went wrong, please try again later");
				location.reload(true);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("dSomething went wrong. Please try again later.");
			location.reload(true);
		},
		complete: function(jqXHR, textStatus)
		{
			startChatChecks();
		}
	});
}

function toggleGlassPanel(id)
{
	($('#'+id).css('visibility') == 'visible') ? hideGlassPanel(id) : showGlassPanel(id);
}

function showGlassPanel(id)
{
	var elem = document.getElementById(id),
	left = -210,
	timer;
	
	elem.style.visibility = "visible";
			
	timer = setInterval(function() {
		elem.style.left = ( left += 14 ) + "px";
		if ( left >= 0 ) {
			var input = elem.getElementsByTagName('input')[0];
			if (input != null) input.focus();
			clearInterval(timer);
		}
	}, 5);
}

function hideGlassPanel(id)
{
	var elem = document.getElementById(id),
	left = 0,
	timer;
	
	timer = setInterval(function() {
		elem.style.left = ( left -= 14 ) + "px";
		if ( left <= -210 ) {
			clearInterval(timer);
			elem.style.visibility = "hidden";
		}
	}, 5);
}

function showWelcomeMessage(username){
	window.top.document.getElementById('welcomemessage').innerHTML = "Hi there <a href='account.php' target='_top' id='accountname' title='Your Account'>" + username + "</a>!";
}

function signUp() {
	var form = window.top.document.getElementById('signupform');
	removeFormErrors(form);
	var username = form.elements['signupusername'].value;
	var password1 = form.elements['signuppassword1'].value;
	var password2 = form.elements['signuppassword2'].value;
	var email = form.elements['signupemail'].value;
	//var reference = form.elements['signupreference'].value;
	
	if (username == "") {
		indicateError('signupusername');
		alert("Please provide a username.");
		return;
	}
	if (password1 == "") {
		indicateError('signuppassword1');
		alert("Please provide a password.");
		return;
	}
	if (password2 == "") {
		indicateError('signuppassword2');
		alert("Please retype your password.");
		return;
	}
	if (password1 != password2) {
		indicateError('signuppassword2');
		indicateError('signuppassword1');
		alert("Your passwords do not match.");
		return;
	}
	if (username.substring(0, 5) == "Guest") {
		indicateError('signupusername');
		alert("Your username cannot begin with 'Guest'.");
		return;
	}
	if (username.length > 15) {
		indicateError('signupusername');
		alert("Your username must be 15 characters or less.");
		return;
	}
	if (password1.length < 5 || password1.length > 15) {
		indicateError('signuppassword2');
		indicateError('signuppassword1');
		alert("Your password must be between 5 and 15 characters.");
		return;
	}
	if (email == ""){
		indicateError('signupemail');
		alert("Please provide an email address");
		return;
	}
	
	//var dataString = "user="+username+"&pass="+password1+"&email="+email+"&refer="+reference;
	var dataString = "user="+username+"&pass="+password1+"&email="+email;
	
	$.ajax({
		type: "POST",
		url: "./scripts/createAccount.php",
		data: dataString,
		success: function(data, textStatus, jqXHR)
		{
			switch(data.substring(0,1))
			{
				case "1":
					$('#signupform').hide();
					//$('#signupinformation').show();
					alert("Your account has been created! An email has been sent to the address you provided with instructions to activate your account.");
					break;
				case "6":
					indicateError('signupusername');
					alert("That username is already taken.");
					break;
				case "7":
					indicateError('signupemail');
					alert("Please provide a valide email address.");
					break;
				case "8":
					indicateError('signupemail');
					alert("That email has already been used to create an account.");
					break;
				case "9":
					indicateError('signupreference');
					alert("The referenced username does not exist.");
					break;
				default:
					alert("Something went wrong. Please try again later.");
					break;
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong. Please try again later.");
		}
	});
}

function forgotPassword()
{
	var form = window.top.document.getElementById('forgotform');
	removeFormErrors(form);
	var email = form.elements['forgotemail'].value;
	if (email == "")
	{
		indicateError('forgotemail');
		alert("Please provide an email address");
		return;
	}
	
	var dataString = "email="+email;
	
	$.ajax({
		type: "POST",
		url: "./email/forgotPassword.php",
		data: dataString,
		success: function(data, textStatus, jqXHR)
		{
			switch (data)
			{
				case "7":
					indicateError('forgotemail');
					alert("Please provide a valid email address.");
					break;
				default:
					hideGlassPanel('forgotbox');
					alert(data);
					break;
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong, please try again later.");
		}
	});
}

function resetPassword(user, code)
{
	var form = window.top.document.getElementById('resetpassform');
	removeFormErrors(form);
	var pass1 = form.elements['resetpassword1'].value;
	var pass2 = form.elements['resetpassword2'].value;
	
	if (pass1 == ""){
		indicateError('resetpassword1');
		alert("Please provide a password.");
		return;
	}
	if (pass2 == ""){
		indicateError('resetpassword2');
		alert("Please retype your password.");
		return;
	}
	if (pass1 != pass2){
		indicateError('resetpassword2');
		indicateError('resetpassword1');
		alert("Your passwords do not match.");
		return;
	}
	
	var dataString = "user="+user+"&code="+code+"&pass="+pass1;
	
	$.ajax({
		type: "POST",
		url: "./scripts/resetPassword.php",
		data: dataString,
		success: function(data, textStatus, jqXHR)
		{
			$('#resetpassbox').hide();
			alert(data);
			window.location = "http://www.postonme.com/";
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong, please try again later.");
		}
	});
}

function changeEmail()
{
	var e = $('#changeemailbox');
	removeFormErrors(e);
	var pass = $('#changeemailpassword').val();
	var newemail = $('#changeemailemail').val();
	
	if (pass == "")
	{
		indicateError('changeemailpassword');
		alert("Please provide a password.");
		return;
	}
	if (newemail == "")
	{
		indicateError('changeemailemail');
		alert("Please provide an email.");
		return;
	}
	
	var dataString = "pass="+pass+"&newemail="+newemail;
	
	$.ajax({
		type: "POST",
		url: "./scripts/changeEmail.php",
		data: dataString,
		success: function(data, textStatus, jqXHR)
		{
			if (data != '1') alert(data);
			else
			{
				$('#changeemailbox').hide();
				alert("Your email has been updated successfully.");
				window.location.reload(true);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Something went wrong, please try again later.");
		}
	});
}

function changePassword()
{
	var e = $('#changepasswordbox');
	removeFormErrors(e);
	var pass = $('#changepasswordcurrent').val();
	var newpass1 = $('#changepasswordnew').val();
	var newpass2 = $('#changepasswordnew2').val();
	
	if (pass == ""){
		indicateError('changepasswordcurrent');
		alert("Please provide your current password.");
		return;
	}
	if (newpass1 == ""){
		indicateError('changepasswordnew');
		alert("Please provide a new password.");
		return;
	}
	if (newpass2 == ""){
		indicateError('changepasswordnew2');
		alert("Please retype your new password.");
		return;
	}
	if (newpass1 != newpass2){
		indicateError('changepasswordnew2');
		indicateError('changepasswordnew');
		alert("Your passwords do not match.");
		return;
	}
	
	var dataString = "pass="+pass+"&newpass="+newpass1;
	
	$.ajax({
		type: "POST",
		url: "./scripts/changePassword.php",
		data: dataString,
		success: function(data, textStatus, jqXHR)
		{
			if (data != '1') alert(data);
			else
			{
				$('#changepasswordbox').hide();
				alert("Your password has been updated successfully.");
				window.location.reload(true);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) 
		{
			alert("Something went wrong, please try again later.");
		},
	});
}