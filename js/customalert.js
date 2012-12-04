$(document).ready(function()
{
	$('#screenlock').bind('click', function (event) {
		stopEvent(event);
	});
	
	var setting = getCookie('location');
	if (setting == null)
	{
		showAlert(
		"<img src='../img/welcome_banner.png' alt='' width='280px' height='28px'/>"+
		"<div>Please Select Your Location</div>"+
		"<ul>"+
			"<li onclick='setDefaultLocation(\"Georgian College\");'>Georgian College</li>"+
			"<li onclick='setDefaultLocation(\"Western University\");'>Western University</li>"+
		"</ul>");
	}
});

function setDefaultLocation(location)
{
	setCookie('location', location, 365);
	changeLocation(location);
	$('#customalert').hide();
	$('#screenlock').hide();
}

function showAlert(html)
{
	var e = $('#customalert');
	e.html("<div><img src='img/close_alert.png' alt='' width='24px' height='24px' onclick='hideAlert();' id='close_alert'/></div>" + html);
	$('#screenlock').show();
	e.show();
	
	$('#close_alert').hover(function()
	{
		this.src = "./img/close_alert_hover.png";
	}, function()
	{
		this.src = "./img/close_alert.png";
	});
}

function hideAlert()
{
	$('#customalert').hide();
	$('#screenlock').hide();
}

function modifyImage()
{
	showAlert(
	""+
	"");
}

function showEmailAlert(adid)
{
	showAlert(
	"<form id='responseform' action='' method=post onsubmit='sendEmail(" + adid + "); return false;'>"+
		"<div>Email:</div>"+
		"<input type='text' name='emailtext' value='Write your email..' onfocus='if(this.value==this.defaultValue) this.value=\"\";' class='emailfield' />"+
		"<div>Message:</div>"+
		"<textarea class='messagefield' name='messagetext' onfocus='if(this.value==this.defaultValue) this.value=\"\";'>Write a message..</textarea>"+
		"<input type='submit' value='Send Email' class='submitbtn cursorhand themeborder themecolor' title='Email this Message'>"+
	"</form>"
	);
	
	$('#responseform input[type=text], #responseform textarea').bind('focusin', function(){
		if (this.value==this.defaultValue) this.style.color='#ADADAD';
		setCaretPosition(this, 0);
		this.selectionStart = 0;
		this.selectionEnd = 0;
	});
	
	$('#responseform input[type=text], #responseform textarea').bind('click', function(){
		if (this.value==this.defaultValue) {
			setCaretPosition(this, 0);
			this.selectionStart = 0;
			this.selectionEnd = 0;
		}
	});
	
	$('#responseform input[type=text], #responseform textarea').bind('focusout', function(){
		if (this.value=='') this.value=this.defaultValue;
		this.style.color='#C9C9C9;';
	});
	
	$('#responseform input[type=text], #responseform textarea').bind('keydown', function(){
		if (this.value==this.defaultValue) this.value='';
		this.style.color='black';
	});
	
	$('#responseform input[type=text], #responseform textarea').bind('keyup', function(){
		if (this.value=='') {
			this.value=this.defaultValue;
			setCaretPosition(this, 0);
			this.selectionStart = 0;
			this.selectionEnd = 0;
			this.style.color='#C9C9C9';
		}
	});
}

function sendEmail(id)
{
	var form = $('#responseform');
	form.submit('');
	
	var email = $('#responseform input[type=text]').val();
	var message = $('#responseform textarea').val();
	
	if (email == "" || email == "Write your email..")
	{
		alert("Please provide an email.");
		return;
	}
	if (message == "" || message == "Write a message..")
	{
		alert("Please write a message.");
		return;
	}
	var to = "../scripts/sendEmail.php?email="+email+"&message="+message+"&adid="+id;
	$.ajax({
		url : to,
		type: "get",
		success: function (response, textStatus, jqXHR)
		{
			if (response == 1)
			{
				alert("Email successfully sent!\nMake sure you check your email regularly for replies.");
				$('#responseform input[type=text]').val('Enter your email..');
				$('#responseform textarea').val('Write a message..');
			}
			else alert(response);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert("Something went wrong, please try again later");
		},
		/*complete: function (jqXHR, textStatus)
		{
			form.submit('sendEmail('+id+'); return false;');
		},*/
	});
}