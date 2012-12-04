<?php
include('scripts/session.php');
?>
<html>
<head>
	<title>Post On Me! - Sell it Quicker, Buy it Cheaper</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/nav.css"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="css/chat.css"/>
	<link rel="stylesheet" type="text/css" href="css/post.css"/>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jQuery/jquery.form.js"></script>
	<script src="/js/navbar.js"></script>
	<script src="/js/chatSystem.js"></script>
	
</head>
<body  onload="checkOnline(); return false;">

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
<div class="smallfiller"></div>

<p class="hidden" id="alert"></p>

<iframe id="iframeAlert" name="iframeAlert" src="scripts/postAdvertisement.php?first=true"></iframe>

<form action="scripts/postAdvertisement.php" method=post id="adform" enctype="multipart/form-data" target="iframeAlert">
	<div class="contentcontainer">
		
		<div class="postentity">
			<div class="postdescription">Required<span>*</span></div>
		</div>
		
		<!--<div class="postentity">
			<div class="postdescription">Reset Form</div>
			<div class="postform">
				<input type="button" value="Reset Form" onClick="this.form.reset()" />
			</div>
		</div>-->
		
		<div class="postentity">
			<div class="postdescription">Category<span>*</span></div>
			<div class="postform">
				<select name="categorytext" class="textarea" selected="">
					<option>Appliances</option>
					<option>Bikes</option>
					<option>Cellphones</option>
					<option>Clothes</option>
					<option>Collectibles</option>
					<option>Computers</option>
					<option>Electronics</option>
					<option>Furniture</option>
					<option>Jewelry</option>
					<option>Movies/Music</option>
					<option>Textbooks</option>
					<option>Tools</option>
					<option>Toys</option>
					<option>Videogames</option>
				</select>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Type<span>*</span></div>
			<div class="postform">
				<input type="radio" name="adtype" value=0 checked>I am Selling<br>
				<input type="radio" name="adtype" value=1>I am Buying
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Title<span>*</span></div>
			<div class="postform">
				<input id="posttitle" type="text" name="titletext" class="textarea" value="10-50 characters" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black'; this.style.font-style='normal'"></text><br>
			</div>
		</div>			
		
		<div class="postentity">
			<div class="postdescription">Price<span>*</span></div>
			<div class="postform">
				$<input id="postprice" type="text" name="pricetext" class="textarea" value="numbers 0-9" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black';"></text><br>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Detail<span>*</span></div>
			<div class="postform">
				<textarea id="postdetail" class='textarea messagefield' name='detailtext' id='detailtext'></textarea>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Email<span>*</span></div>
			<div class="postform">
				<input id="postemail" type="text" name="emailtext" class="textarea" value="valid email address" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black';"></text><br>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">LiveChat</div>
			<div class="postform">
				<div class="newline">
					<div class="subfieldtitles">Username:</div>
					<input id="postchatname" type="text" name="chatname" class="textarea livechatfield" value="1-15 characters (a-z, 0-9)" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black';"></text>
				</div>
				<div class="newline">
					<div class="subfieldtitles">Password:</div>
					<input id="postchatpass" type="text" name="chatpass" class="textarea livechatfield"  value="1-15 characters" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black';"></text>
				</div>
				<div class="newline">
					<div class="subfieldtitles">Retype Password:</div>
					<input id="postchatpass2" type="text" name="chatpass2" class="textarea livechatfield"  value="1-15 characters" onfocus="if(this.value==this.defaultValue) this.value=''; this.style.color='black';"></text>
				</div>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Images</div>
			<div class="postform">
				Upload your image <input type="file" name="file" id="file" />
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Terms of Use<span>*</span></div>
			<div class="postform">
				<input type="checkbox" name="termsofuse">
				I agree to the <a href="terms.html" target="_blank">Terms of Use</a>.
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription" style="color:white;">.</div>
			<div class="postform">
				<input type="submit" name="submitad" value="Submit Advertisement" id="submitad" class="themegradient cursorhand themeborder">
			</div>
		</div>
		
	</div>
</form>

<div class="bigfiller"></div>

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