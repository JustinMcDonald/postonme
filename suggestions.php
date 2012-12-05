<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1">
<head>
	<title>Post On Me! - Campus Classifieds</title>
	
	<link rel="shortcut icon" href="/img/logoicon.ico" >
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/newsbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/customalert.css"/>
	<link rel="stylesheet" type="text/css" href="css/accountops.css"/>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/functions.js"></script>
	<script src="/js/chat.js"></script>
	<script type="text/javascript" src="/js/exp.js"></script>
	<script src="/js/news.js"></script>
	<script src="/js/navbar.js"></script>
	<script type="text/javascript" src="/js/customalert.js"></script>
	<!--[if IE]>
		<script type="text/javascript" src="/js/DD_roundies.js"></script>
	<![endif]-->
	
	<script>
		$(document).ready(function()
		{
			$('#messagetext').bind('focusin', function(){
				if (this.value==this.defaultValue) this.style.color='#ADADAD';
				setCaretPosition(this, 0);
				this.selectionStart = 0;
				this.selectionEnd = 0;
			});
			
			$('#messagetext').bind('click', function(){
				if (this.value==this.defaultValue) {
					setCaretPosition(this, 0);
					this.selectionStart = 0;
					this.selectionEnd = 0;
				}
			});
			
			$('#messagetext').bind('focusout', function(){
				if (this.value=='') this.value=this.defaultValue;
				this.style.color='#C9C9C9;';
			});
			
			$('#messagetext').bind('keydown', function(){
				if (this.value==this.defaultValue) this.value='';
				this.style.color='black';
			});
			
			$('#messagetext').bind('keyup', function(){
				if (this.value=='') {
					this.value=this.defaultValue;
					setCaretPosition(this, 0);
					this.selectionStart = 0;
					this.selectionEnd = 0;
					this.style.color='#C9C9C9';
				}
			});
		});
		
		function submitSuggestion() {
			var message = document.getElementById('messagetext').value;
			
			var dataString = "message="+message;
			
			$.ajax({
				url: "../scripts/emailSuggestion.php",
				type: "post",
				data: dataString,
				success: function(response, textStatus, jqXHR)
				{
					alert(response);
					var e = document.getElementById('messagetext');
					e.style.color='#C9C9C9';
					e.value = 'Write your suggestion here..';
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert("Something went wrong, please try again later.");
				}
			});
		}
	</script>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=361597738233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<p class="hidden open" id="alert"></p>

<div class="contentcontainer">
	<h2>Suggestion Box</h2>
	<p>If you have a suggestion for improving PostOnMe, please send a message to us and we would be delighted to hear from you. 
	We will always read and evaluate the input that we receive from our users.</p>
	<div style="text-align:center">
		<textarea class='messagefield' name='messagetext' id="messagetext" onfocus="if(this.value==this.defaultValue) this.value='';">Write your suggestion here..</textarea><br>
		<input title="Submit this Suggestion" type='submit' value='Send Suggestion' class='submitbtn cursorhand themeborder themecolor' onclick="submitSuggestion(); return true;">
	</div>
</div>

<?php
include("common/newsbox.php");
include("common/chatbox.php");
include("common/accountpanels.php");
include("common/navbar.php");
include("common/footer.php");
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>

</body>
</html>