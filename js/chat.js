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
	
	$('#chatheader > img').each(function()
	{
	$(this).hover(function()
		{
			this.src = "./img/chat_icons_hover.png";
		}, function()
		{
			this.src = "./img/chat_icons.png";
		});
	});
});
	
function initChat()
{
	loadMessages();
	//startChatChecks();
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

function loadMessages(cid)
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
			try
			{
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
				if (data.length == 0) $('#chatinformation').text("To start a conversation, find a post you're interested in and click the \"Message this Person\" button");
			}
			catch(err)
			{
				alert("Something went wrong, please try again later.");
			}
		},
		complete: function()
		{
			if (typeof cid != "undefined") readyLiveMessage(cid);
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
			try
			{
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
			catch(err)
			{
				alert("Something went wrong, please try again later.");
			}
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
	addChatText(cid, "<div style='padding:2px 0; color:black;'>Welcome to LiveChat!</div>\n", null);
	if (!online) addToChatText(cid, "<div style='padding:2px 0;color:black;'>This person is offline. They will see your messages next time they log in.</div>\n");
	addChatInput(cid);
}

function readyLiveMessage(cid)
{
	//Open conversations tab
	if (!$('#currentmessagestab').is(':visible')) openCurrentMessagesTab();

	var text = window.top.document.getElementById('chattext' + cid);
	if (text == null) return false;
	
	childNodeArray = window.top.document.getElementById('chattitlecontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++) 
	{
		//childNodeArray[i].style.border = "inset #A8D2FF 1px";
		//childNodeArray[i].style.opacity = 0.3;
		//childNodeArray[i].style.filter = 'alpha(opacity=30)';
		childNodeArray[i].firstChild.style.fontWeight = '400';
	}
	
	var childNodeArray = window.top.document.getElementById('chattextcontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++) childNodeArray[i].style.display="none";
	
	childNodeArray = window.top.document.getElementById('outboxcontainer').childNodes;
	for (var i = 0; i < childNodeArray.length; i++)	childNodeArray[i].style.display="none";
	
	text.style.display = "block";
	var e = window.top.document.getElementById('chattitle' + cid)
	//e.style.opacity = 0.6;
	//e.style.filter = 'alpha(opacity=60)';
	//e.style.border = "solid #18417A 1px";
	e.firstChild.style.fontWeight = '600';
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
	
	$('#chattitlecontainer').append("<div id='chattitle"+cid+"' class='chattitle cursorhand' onclick='readyLiveMessage(\""+cid+"\"); return true;'>"
	+"<div id='chattitletext"+cid+"' class='chattitletext'>" + label + "</div>"
	+"<div id='closebtn"+cid+"' class='closebtn' onclick='closeChat(\""+cid+"\"); return true;'>"
	+"<image src='img/closebtn.png' width='12px' height='12px' alt='' /></div>"
	+"</div>");
	
	var t = parseInt($('#chattitle'+cid).css('height'), 10);
	var e = $('#chatbox');
	var h = parseInt(e.css('height'), 10);
	var maxh = $(window).height();
	if (h < maxh - 110) e.css('height', h+t+"px");
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

function closeChat(cid)
{
	//var answer = confirm("Are you sure you want to close this conversation?\n\nAll messages will be deleted and this person will not be able to reply.");
	//if (answer == true)
	//{
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
		
		var e = $('#chatbox');
		var h = parseInt(e.css('height'), 10);
		h -= 25;
		if (h >= 400) e.css('height', h+"px");
		
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
	//}
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
	bottom = 0,
	timer;
	
	timer = setInterval(function() {
		elem.style.bottom = ( bottom -= 40 ) + "px";
		if ( bottom <= -400 ) {
			clearInterval(timer);
			elem.style.display = "none";
			$('#outboxcontainer').hide();
			document.getElementById("showchatbutton").style.visibility = "visible";
		}
	}, 10);
}

function showChat()
{
	setCookie('chat',true,365);
	var elem = document.getElementById("chatbox"),
	bottom = -400,
	timer;
	
	document.getElementById("showchatbutton").style.visibility = "hidden";
	elem.style.display = "block";
			
	timer = setInterval(function()
	{
		elem.style.bottom = ( bottom += 40 ) + "px";
		if ( bottom >= 0 )
		{
			clearInterval(timer);
			$('#outboxcontainer').show();
			document.getElementById('signinusername').focus();
		}
	}, 10);
}

function openPastMessagesTab()
{
	if (window.chatinterval) window.clearInterval(window.chatinterval);
	$('#currentmessagestab').hide();
	$('#outboxcontainer').hide();
	$('#chatheader > div').text('Past Messages');
	$('#chatheader > img:nth-child(2)').attr('onclick', 'openCurrentMessagesTab(); return true');
	$('#pastmessagestab').show();
	
	var dataString = 'all=true';
	$.ajax({
		url: "./scripts/loadMessages.php",
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
			try
			{
				var data = $.parseJSON(response);
				$.each(data, function(index, value)
				{
					var cid = value[0];
					var title = value[1];
					var name = value[2];
					if (title == "") title = "Unknown Title";
					if (name == "") title = "Unknown Name";
					addPastChatTitle(cid, title+" ("+name+")");
				});
				if (data.length == 0) $('#pastmessagescontainer').append("<div>You have 0 messages.</div>");
			}
			catch(err)
			{
				alert("Something went wrong, please try again later.");
			}
		}
	});
}

function addPastChatTitle(cid, label)
{	
	$('#pastmessagescontainer').append("<div id='pastchattitle"+cid+"' class='chattitle cursorhand' onclick='activateMessage(\""+cid+"\"); return true;'>"
	+"<div id='pastchattitletext"+cid+"' class='chattitletext'>" + label + "</div>"
	/*+"<div id='closebtn"+cid+"' class='closebtn' onclick='closeChat(\""+cid+"\"); return true;'>"
	+"<image src='img/closebtn.png' width='12px' height='12px' alt='' /></div>"*/
	+"</div>");
}

function openCurrentMessagesTab()
{
	$('#chatheader > div').text('Messages');
	$('#pastmessagestab').hide();
	$('#pastmessagescontainer').html('');
	$('#currentmessagestab').show();
	$('#outboxcontainer').show();
	$('#chatheader > img:nth-child(2)').attr('onclick', 'openPastMessagesTab(); return true');
}

function activateMessage(cid)
{
	var dataString = "cid="+cid;
	$.ajax({
		url: "./scripts/activateMessage.php",
		type: "post",
		data: dataString,
		success: function(response, textStatus, jqXHR)
		{
			loadMessages();
		}
	});
}