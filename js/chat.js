$(document).ready(function() {	
	$(window).bind('resize', function()
	{
		if ($(window).width() < 1143)
		{
			$("#chatbox").hide();
			$("#showchatbutton").css('visibility', 'visible');
		}
		else if ($(window).width() >= 1143 && getCookie('chat') == "true")
		{
			$("#chatbox").show();
			$("#showchatbutton").css('visibility', 'hidden');
		}
	});
});
	
function initChat()
{
	loadMessages();
	startChatChecks();
}

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
	var username = form.elements['signinusername'].value;
	var password = form.elements['signinpassword'].value;
	if (username == "") {
		alert("Please provide your username.");
		return;
	}
	if (password == "") {
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
						if ( typeof shiftFrontColumnsLeft == 'function' ) shiftFrontColumnsLeft();
						loadMessages();
						hideGlassPanel('loginbox');
						break;
					case 2:
						alert("You must activate your account before logging in. Look for your account verification code in your email.");
						break;
					case 3:
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

/*	createConversation()
	WHEN: INQUIRER STARTS A NEW CONVERSATION WITH A POSTER
	PARAM: adid - ADVERTISEMENT ID
*/
function createConversation(adid, online)
{
	$('#chat'+adid).attr('onclick', null);
	
	if (window.chatinterval) window.clearInterval(window.chatinterval);
	
	var dataString = "adid="+adid;
	
	$.ajax({
		type: "post",
		url: "./scripts/createConversation.php",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			if (response != null)
			{
				var data = $.parseJSON(response);
				if (data.length == 1) readyLiveMessage(data[0]);
				else
				{
					var cid = data[0];
					var title = data[1];
					var poster = data[2];
					createLiveChat(cid, title, poster, online);
					readyLiveMessage(cid);
					var chatbtn = $('#showchatbutton');
					if (chatbtn.css('visibility') == 'visible') chatbtn[0].onclick();
					startChatChecks();
				}
			} 
			else alert("Your session has expired.");
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("fSomething went wrong. Please try again later.");
		}
	});
}

function loadMessages()
{
	if (window.chatinterval) window.clearInterval(window.chatinterval);
	$.ajax({
		url: "./scripts/loadMessages.php",
		type: "post",
		success: function(response, textStatus, jqXHR)
		{
			if (response == null) 
			{
				alert("Your session has expired.");
				window.top.location.reload(true);
				return;
			}
			var data = $.parseJSON(response);
			$.each(data, function(index, value) { 
				var cid = value[0];
				var title = value[1];
				var name = value[2];
				var messages = value[3];
				createLiveChat(cid, title, name, true);
				$.each(messages, function(index, value) { 
					var writtenby = value[0];
					var message = value[1];
					if (writtenby == "POSTONME") 
					{
						addToChatText(cid, "<div style='padding:2px 0;'>"+message+"</div>\n");
						$('#messageoutbox'+cid).attr('disabled', 'disabled');
					}
					else (writtenby == name) ? addToChatText(cid, "<div class='yourtext'>" + writtenby + ": " + message + "</div>\n")  : addToChatText(cid, "<div class='mytext'>You: " + message + "</div>\n");
				});
				readyLiveMessage(cid);
				var chatbtn = $('#showchatbutton');
				if (chatbtn.css('visibility') == 'visible') chatbtn[0].onclick();
				startChatChecks();
			});
		}
	});
}

function startChatChecks()
{
	window.ajaxobject;
	window.chatinterval = window.setInterval(function()
	{
		var cids = new Array();
		var chats = $('#chattitlecontainer').children()
		chats.each(function(index)
		{
			cids.push(this.getAttribute('id').substring(9));
		});
		if (window.ajaxobject)
		{
			if (window.ajaxobject.readyState == 4) (cids.length > 0) ? checkForNewMessages(cids) : checkForNewConversations(cids);
		}
		else (cids.length > 0) ? checkForNewMessages(cids) : checkForNewConversations(cids);
	}, 1200);
}

/*
function checkConversationStatuses(cids)
{
	var dataString = "cids=";
	$.each(cids, function(index, value)
	{
		dataString += value + ",";
	});
	
	$.ajax({
		url: "./scripts/checkConversationStatuses.php",
		type: "post",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			var data = $.parseJSON(response);
			$.each(cids, function(index, value)
			{
				if (data[value] == 0) $('#messageoutbox'+value).attr('disabled', 'disabled');
			});
			checkForNewConversations(cids);
		}
	});
}*/

function checkForNewConversations(cids)
{
	var dataString = "cids=";
	$.each(cids, function(index, value)
	{
		dataString += value + ",";
	});
	
	window.ajaxobject = $.ajax({
		url: "./scripts/checkForNewConversations.php",
		type: "post",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			if (response == null) 
			{
				alert("Your session has expired.");
				window.top.location.reload(true);
				return;
			}
			var data = $.parseJSON(response);
			$.each(data, function(index, value) { 
				var cid = value[0];
				var title = value[1];
				var name = value[2];
				var messages = value[3];
				if (document.getElementById('chattitle'+cid) == null) 
				{
					createLiveChat(cid, title, name, true);
					$.each(messages, function(index, value) { 
						var writtenby = value[0];
						var message = value[1];
						if (writtenby == "POSTONME") 
						{
							addToChatText(cid, "<div style='padding:2px 0;'>"+message+"</div>\n");
							$('#messageoutbox'+cid).attr('disabled', 'disabled');
						}
						else addToChatText(cid, "<div class='yourtext'>" + writtenby + ": " + message + "</div>\n");
					});
					readyLiveMessage(cid);
					var chatbtn = $('#showchatbutton');
					if (chatbtn.css('visibility') == 'visible') chatbtn[0].onclick();
				}
			});
		}
	});
}

function checkForNewMessages(cids)
{
	var dataString = "cids=";
	$.each(cids, function(index, value)
	{
		dataString += value + ",";
	});
	
	window.ajaxobject = $.ajax({
		url: "./scripts/checkForNewMessages.php",
		type: "post",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			if (response == null) 
			{
				alert("Your session has expired.");
				window.top.location.reload(true);
				return;
			}
			var data = $.parseJSON(response);
			$.each(data, function(index, value) { 
				var cid = value[0];
				var messages = value[1];
				$.each(messages, function(index, value) { 
					var writtenby = value[0];
					var message = value[1];
					if (writtenby == "POSTONME")
					{
						addToChatText(cid, "<div style='padding:2px 0;'>"+message+"</div>\n");
						$('#messageoutbox'+cid).attr('disabled', 'disabled');
					}
					else addToChatText(cid, "<div class='yourtext'>" + writtenby + ": " + message + "</div>\n");
				});
				if (messages.length > 0) 
				{
					readyLiveMessage(cid);
					var chatbtn = $('#showchatbutton');
					if (chatbtn.css('visibility') == 'visible') chatbtn[0].onclick();
				}				
			});
			checkForNewConversations(cids);
		}
	});
}

function showAccountOps()
{
	$('#guestops').hide();
	$('#accountops').show();
}

function showGuestOps()
{
	$('#accountops').hide();
	$('#guestops').show();
}

/*	createLiveChat()
	WHEN:	INQUIRER CREATES A NEW CONVERSATION
			OR
			POSTER FINDS A NEW CONVERSATION
			OR
			LOADING MESSAGES
*/
function createLiveChat(cid, title, name, online)
{
	$('#chatinformation').hide();
	addChatTitle(cid, title+" ("+name+")");
	addChatText(cid, "<div style='padding:2px 0;'>Welcome to LiveChat!</div>\n", null);
	if (!online) addToChatText(cid, "<div style='padding:2px 0;'>This person is offline. They will see your messages next time they log in.</div>\n");
	addChatInput(cid);
	cleanTextSizes();
}

function readyLiveMessage(cid)
{
	var text = window.top.document.getElementById('chattext' + cid);
	if (text == null) return false;
	
	childNodeArray = window.top.document.getElementById('chattitlecontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++) 
	{
		childNodeArray[i].style.border = "inset #A8D2FF 1px";
		childNodeArray[i].style.opacity = 0.3;
		childNodeArray[i].style.filter = 'alpha(opacity=30)';

	}
	
	var childNodeArray = window.top.document.getElementById('chattextcontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++) childNodeArray[i].style.display="none";
	
	childNodeArray = window.top.document.getElementById('outboxcontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++)	childNodeArray[i].style.display="none";
	
	text.style.display = "block";
	var e = window.top.document.getElementById('chattitle' + cid)
	e.style.opacity = 0.6;
	e.style.filter = 'alpha(opacity=60)';
	e.style.border = "solid #18417A 1px";
	var outbox = window.top.document.getElementById('messageoutbox' + cid)
	outbox.style.display = "block";
	outbox.focus();
}

function addChatTitle(cid, label)
{
	var info = $('#chatinformation');
	if (info.is(':visible')) 
	{
		info.hide();
		$('#chatinfofill').hide();
	}
	
	/*var ni = window.top.document.getElementById("chattitlecontainer");
	var newNode = window.top.document.createElement("div");
	newNode.setAttribute('class', 'themeborder chattitle cursorhand');
	newNode.setAttribute('id', 'chattitle' + cid);
	newNode.setAttribute('onClick', 'readyLiveMessage(\"' + cid + '\"); return false;');
	newNode.innerHTML = "<div id='chattitletext"+cid+"' class='chattitletext'>" + label + "</div><div id='closebtn"+cid+"' class='closebtn' onclick='closeChat(\""+cid+"\"); return true;'><image src='img/closebtn.png' width='12px' height='12px' alt='' /></div>";
	ni.appendChild(newNode);*/
	
	$('#chattitlecontainer').append("<div id='chattitle"+cid+"' class='themeborder chattitle cursorhand' onclick='readyLiveMessage(\""+cid+"\"); return true;'>"
	+"<div id='chattitletext"+cid+"' class='chattitletext'>" + label + "</div>"
	+"<div id='closebtn"+cid+"' class='closebtn' onclick='closeChat(\""+cid+"\"); return true;'>"
	+"<image src='img/closebtn.png' width='12px' height='12px' alt='' /></div>"
	+"</div>");
}

function addChatText(cid, message, name)
{
	var ni = window.top.document.getElementById('chattextcontainer');
	var newNode = window.top.document.createElement('div');
	newNode.setAttribute('readonly', 'readonly');
	newNode.setAttribute('class', 'chattext');
	newNode.setAttribute('id', 'chattext' + cid);
	if (name == null) newNode.innerHTML = message;
	else newNode.innerHTML = "<div class='yourtext'>" + name + ": " + message + "</div>\n";
	ni.appendChild(newNode);
}

function addChatInput(cid)
{
	var ni = window.top.document.getElementById('outboxcontainer');
	var newNode = window.top.document.createElement('input');
	newNode.setAttribute('type', 'text');
	newNode.setAttribute('name', 'messageoutbox');
	newNode.setAttribute('class', 'messageoutbox');
	newNode.setAttribute('id', 'messageoutbox' + cid);
	newNode.setAttribute('value', 'Write something..');
	ni.appendChild(newNode);
	
	var outbox = $('#messageoutbox'+cid, window.top.document);
	
	outbox.bind('focusin', function()
	{
		this.style.color='#C9C9C9';
		setCaretPosition(this, 0);
	});
	
	outbox.bind('click', function(){
		if (this.value==this.defaultValue || this.value=="Write something..") setCaretPosition(this, 0);
	});
	
	outbox.bind('focusout', function()
	{
		this.style.color='#ADADAD';
	});
	
	outbox.bind('keydown', function(e)
	{
		if (this.value==this.defaultValue || this.value=="Write something..") this.value='';
		this.style.color='black';
		
		if (e.keyCode == 13) 
		{
			if (this.value != this.defaultValue && this.value!="Write something..") sendLiveMessage(cid);
		}
	});
	
	outbox.bind('keyup', function()
	{
		if (this.value=='') 
		{
			this.value="Write something..";
			setCaretPosition(this, 0);
			this.style.color='#ADADAD';
		}
	});
}

function addToChatText(cid, message)
{
	var textbox = window.top.document.getElementById('chattext' + cid);
	textbox.innerHTML += message;
	textbox.scrollTop = 99999;
}

function cleanTextSizes() {
	var childNodeArray = window.top.document.getElementById('chattextcontainer').childNodes;
	var newH = window.top.document.getElementById('chatbox').clientHeight;
	newH -= 200;
	newH -= window.top.document.getElementById('chatsignincontainer').clientHeight;
	newH -= window.top.document.getElementById('chattitlecontainer').clientHeight;
	for (var j = 0; j < childNodeArray.length; j++) childNodeArray[j].style.height = newH + "px";
}

function closeChat(cid)
{
	var answer = confirm("Are you sure you want to close this conversation?\n\nAll messages will be deleted and this person will not be able to reply.");
	if (answer == true)
	{
		if (window.chatinterval) window.clearInterval(window.chatinterval);
		$('#chattext'+cid).remove();
		$('#chattitle'+cid).remove();
		$('#messageoutbox'+cid).remove();
		var e = $('#chattitlecontainer').children().last();
		if (e[0] != null) e[0].onclick();
		else 
		{
			$('#chatinformation').show();
			$('#chatinfofill').show();
		}
		cleanTextSizes();
		
		var dataString = "cid="+cid;
		
		$.ajax({
			url: "./scripts/leaveConversation.php",
			type: "post",
			data: dataString,
			success: function(response, textStatus, jqXHR)
			{
				startChatChecks();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert("kSomething went wrong. Please try again later.");
			}
		});
	}
}

function sendLiveMessage(cid)
{
	var outbox = window.top.document.getElementById('messageoutbox'+cid);
	var message = outbox.value;
	outbox.value = "";
	var chattext = window.top.document.getElementById('chattext' + cid)
	chattext.innerHTML += "<div class='mytext'>You: " + message + "</div>\n";
	chattext.scrollTop = 99999;
	
	var dataString = "cid="+cid+"&message="+message;
	
	$.ajax({
		url: "./scripts/sendMessage.php",
		type: "post",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			if (response == null) 
			{
				alert("Your session has expired.");
				window.top.location.reload(true);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("lSomething went wrong. Please try again later.");
		}
	});
}

function hideChat(){
	setCookie('chat',false,365);
	var elem = document.getElementById("chatbox"),
	left = 0,
	timer;
	
	timer = setInterval(function() {
		elem.style.left = ( left -= 42 ) + "px";
		if ( left <= -210 ) {
			clearInterval(timer);
			elem.style.display = "none";
			document.getElementById("showchatbutton").style.visibility = "visible";
		}
	}, 10);
}

function showChat()
{
	setCookie('chat',true,365);
	var elem = document.getElementById("chatbox"),
	left = -210,
	timer;
	
	document.getElementById("showchatbutton").style.visibility = "hidden";
	elem.style.display = "block";
			
	timer = setInterval(function()
	{
		elem.style.left = ( left += 42 ) + "px";
		if ( left >= 0 )
		{
			clearInterval(timer);
			document.getElementById('signinusername').focus();
		}
	}, 10);
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
					$('#signupinformation').show();
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
	var email = form.elements['forgotemail'].value;
	if (email == ""){
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
					alert("Please provide a valid email address.");
					$('#forgotemail').focus();
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
	var pass1 = form.elements['resetpassword1'].value;
	var pass2 = form.elements['resetpassword2'].value;
	
	if (pass1 == ""){
		alert("Please provide a password.");
		return;
	}
	if (pass2 == ""){
		alert("Please retype your password.");
		return;
	}
	if (pass1 != pass2){
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
	var pass = $('#changeemailpassword').val();
	var newemail = $('#changeemailemail').val();
	
	if (pass == ""){
		alert("Please provide a password.");
		return;
	}
	if (newemail == ""){
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
	var pass = $('#changepasswordcurrent').val();
	var newpass1 = $('#changepasswordnew').val();
	var newpass2 = $('#changepasswordnew2').val();
	
	if (pass == ""){
		alert("Please provide your current password.");
		return;
	}
	if (newpass1 == ""){
		alert("Please provide a new password.");
		return;
	}
	if (newpass2 == ""){
		alert("Please retype your new password.");
		return;
	}
	if (newpass1 != newpass2){
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