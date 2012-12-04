<?php
include('scripts/session.php');
?>
<html>
<head>
	<title>Post On Me! - Sell it Quicker, Buy it Cheaper</title>
	
	<link rel="shortcut icon" href="/img/logoicon.ico" >
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/luckyads.css"/>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script src="/js/chatSystem.js"></script>
	<script src="/js/navbar.js"></script>
	
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#searchbar').keydown(function(e) {
			if (e.keyCode == 13) {
				$('#searchform').submit();
			}
		});
	});
	
	function getCookie(c_name) {
		return document.cookie.substring(c_name.length + 1);
	}
	
	</script>

</head>
<body onload="checkOnline(); return false;">

<div id="navbar" class="navbar navbar-fixed-top themegradient">
	<div class="container">
		<div id="accountname"></div>
		<a id="brand" href="index.html" target="_top"><img src="img/companyLogo.png" width="200px" height="50px"></a>
		<ul id="links">
			<li>Western University</li>
		</ul>
		<ul id="interact">
			<li><a href="post.html" target="_top" id="navpost">Post</a></li>
			<li class="cursorhand" style="padding-left:0;"><img src="img/advanced_search.png" alt="" width="28px" height="28px" id="advsearch" class="cursorhand"></li>
			<li>
				<form action="" method="post" id="navsearchform" onsubmit="openWindow('navsearchbar'); return false;">
					<input type="text" name="navsearchtext" value="Search" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black'; this.style.textAlign='left';" class="smallbutton themeborder" id="navsearchbar">
				</form>
			</li>
		</ul>
	</div>
</div>

<div id="advpanel" class="themeborder">
	<div> <!--GENERAL CHECKBOXES-->
		<div class="inlineblock"> <!--buy/sell-->
			<fieldset>
				<legend>Buy it, Sell it</legend>
				<table id="buysell">
					<tr>
						<td><input type="checkbox" name="buying" value="1"></td>
						<td>I'm Buying</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="selling" value="2"></td>
						<td>I'm Selling</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="inlineblock"> <!--price-->
			<fieldset>
				<legend>Price</legend>
				<table>
					<tr>
						<td>Minimum:</td>
						<td>$<input type="text" name="pricemin" id="pricemin"></td>
					</tr>
					<tr>
						<td>Maxaimum:</td>
						<td>$<input type="text" name="pricemax" id="pricemax"></td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="inlineblock"> <!--date-->
			<fieldset>
				<legend>Date Posted</legend>
				<table id="date">
					<tr>
						<td><input type="radio" name="date" value="0"></td>
						<td>Today</td>
					</tr>
					<tr>
						<td><input type="radio" name="date" value="1"></td>
						<td>Since Yesterday</td>
					</tr>
					<tr>
						<td><input type="radio" name="date" value="2"></td>
						<td>Since Last Week</td>
					</tr>
					<tr>
						<td><input type="radio" name="date" value="3"></td>
						<td>Since Last Month</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="inlineblock"> <!--other-->
			<fieldset>
				<legend>Other</legend>
				<table>
					<tr>
						<td><input type="checkbox" name="online" id="online"></td>
						<td>Online Only</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="images" id="images"></td>
						<td>Images Only</td>
					</tr>
				</table>
			</fieldset>
		</div>
	</div>
	<div> <!--CATEGORIES-->
		<fieldset>
			<legend>Categories</legend>
			<table>
			</table>
		</fieldset>
	</div>
</div>

<div class="filler"></div>

<div class="container">

	<div class="smallfiller"></div>
	<div class="smallfiller"></div>
	
	<img id="slogan" src="img/homeSlogan.png" alt="" width="600px" height="165px">
	
	<div class="halfbody">
		<a href="post.html"><div class="bigbutton themeborder themegradient centerelement cursorhand" id="postbtn">Post</div></a>
		<p class="centerelement"><h3>Post An Advertisement!</h3></p>
	</div>

	<div class="halfbody">
		<form action="" method="post" id="searchform" onsubmit="openWindow('searchbar'); return false;">
			<div class="centerelement">
				<input type="text" name="searchtext" value="Search" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black'; this.style.textAlign='left';" class="bigbutton themecolor inlineblock" id="searchbar">
			</div>
		</form>
		<p class="centerelement" style="clear:left;"><h3>Search For Posts!</h3></p>
	</div>

</div>

<div id="chatbox" class="themeborder">
	<div id="hidechatbutton" class="cursorhand expandbutton" onclick="hideChat(); return true;"><img src="img/collapseThumb.png" class="cursorhand" alt="" width="18px" height="18px"></div>
	<div id="chatsignincontainer">
		<div id="chattitle"><img src="img/liveChat.png" alt="" width="75px" height="20px"></div>
		<div id="chatsignout" class="hidden themeborder themegradient" onclick="chatLogout(); return true;">Sign Out</div>
		<div id="chatsignin">
			<form id="chatsigninform" action='' method=post onsubmit="chatLogin(); return false;">
				<div>Username:</div>
				<input type="text" name="signinusername" id="signinusername" class="themeborder" maxlength=15>
				<div>Password:</div>
				<input type="text" name="signinpassword" id="signinpassword" class="themeborder" maxlength=15>				
				<input type="submit" name="signinsubmit" value="Sign In" class="themeborder cursorhand themegradient chatbutton">
				<input type="button" name="signupsubmit" value="Sign Up" class="themeborder cursorhand themegradient chatbutton" onclick="showSignUp(); return true;">
			</form>
		</div>
	</div>
	<div id="chattitlecontainer"></div>
	<div id="chattextcontainer"></div>
	<!--<form id="chatboxoutform" action='' method=post onsubmit="sendLiveMessage(); return false;">-->
		<input type="text" name="messageoutbox" disabled="disabled" class="messageoutbox" id="messageoutbox">
		<!--<input type="submit" name="submitmessageout" value="SUBMIT" id="submitmessageout" class="themegradient themeborder">-->
	<!--</form>-->
</div>

<div id="showchatbutton" onclick="showChat(); return true;"><img class="cursorhand" src="img/expandThumb.png" alt="" width="18px" height="18px"></div>

<div id="signupcontainer" class="themeborder">
	<div id="hidesignupbutton" class="cursorhand expandbutton" onclick="hideSignUp(); return true;"><img src="img/collapseThumb.png" class="cursorhand" alt="" width="18px" height="18px"></div>
	<div id="signuptitle"><img src="img/signUp.png" alt="" width="75px" height="25px"></div>
	<form id="signupform" action='' method=post onsubmit="___(); return false;">
		<div>Username:</div>
		<input type="text" name="signupusername" id="signupusername" class="themeborder" maxlength=15>
		<div>Password:</div>
		<input type="text" name="signuppassword1" id="signuppassword1" class="themeborder" maxlength=15>
		<div>Retype Password:</div>
		<input type="text" name="signuppassword2" id="signuppassword2" class="themeborder" maxlength=15>				
		<input type="submit" name="signupsubmit" value="Register Me!" class="themeborder cursorhand themegradient chatbutton">
	</form>
</div>

<div id="bottombanner">
	<div>
		<ul>
			<li><a href="contact.html">ContactUs</a></li>
			<li><a href="about.html">AboutUs</a></li>
			<li><a href="help.html">Help</a></li>
			<li><a href="bugs.html">BugReportBox</a></li>
			<li><a href="suggestions.html">SuggestionBox</a></li>
		</ul>
	</div>
</div>

</body>
</html>