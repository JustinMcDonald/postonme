<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<?php include("./common/headers.php"); ?>
	
	<link rel="stylesheet" type="text/css" href="css/post.css"/>

	<script type="text/javascript" src="js/jQuery/jquery.form.js"></script>
	<script src="/js/post.js"></script>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=451061051608923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<p class="hidden" id="alert"></p>

<iframe id="iframeAlert" name="iframeAlert" src="./iframes/postAdvertisement.php?first=true" allowtransparency="true" frameBorder="0"></iframe>

<form action="./iframes/postAdvertisement.php" method=post id="adform" enctype="multipart/form-data" target="iframeAlert">
	<div class="contentcontainer" style="text-align:center">
		
		<div class="postentity">
			<h2>Create an Advertisement!</h2>It's Free!
		</div>
		
		<!--<div class="postentity">
			<div class="postdescription">Reset Form</div>
			<div class="postform">
				<input type="button" value="Reset Form" onClick="this.form.reset()" />
			</div>
		</div>-->
		
		<div class="postentity" id="signupspot" style='display: <?php if (!isset($_SESSION['online'])) echo 'block'; else if ($_SESSION['online'] == 1) echo 'none'; else echo 'block'; ?> '>
			<div class="postdescription">LiveChat<br><div>The fastest way online to buy & sell your stuff!</div></div>
			<div class="postform">
				<div class="newline">
					<div class="subfieldtitles">Username:</div>
					<input id="postchatname" type="text" name="chatname" class="textarea livechatfield" title="1-15 characters (a-z, 0-9)" maxlength="15" autocomplete='off'></text>
				</div>
				<div class="newline">
					<div class="subfieldtitles">Password:</div>
					<input id="postchatpass" type="password" name="chatpass" class="textarea livechatfield"  title="5-15 characters" maxlength="15" autocomplete='off'></text>
				</div>
				<div class="newline">
					<div class="subfieldtitles">Retype Password:</div>
					<input id="postchatpass2" type="password" name="chatpass2" class="textarea livechatfield"  title="5-15 characters" maxlength="15" autocomplete='off'></text>
				</div>
				<!--<div class="newline">
					<div class="subfieldtitles">Referred By: <span style="font-size:0.8em">(optional)</span></div>
					<input id="postreference" type="text" name="postreference" class="textarea livechatfield"  title="1-15 characters" maxlength="15" autocomplete='off'></text>
				</div>-->
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Location<span>*</span></div>
			<div class="postform">
				<select name="postlocation" class="textarea" selected="" id='locationoptions'>
					<option>Georgian College</option>
					<option>Western University</option>
				</select>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Category<span>*</span></div>
			<div class="postform">
				<select name="categorytext" class="textarea" selected="">
					<option>Art, Crafts</option>
					<option>Appliances</option>
					<option>Bikes</option>
					<option selected="selected">Books, Textbooks</option>
					<option>CD, DVD, BluRay</option>
					<option>Clothing</option>
					<option>Computers, Accessories</option>
					<option>Electronics</option>
					<option>Furniture</option>
					<option>Games, Collectibles</option>
					<option>Musical Instruments</option>
					<option>Sports Equipment</option>
					<option>Tickets</option>
					<option>Videogames, Consoles</option>
					<option>Everything Else</option>
				</select>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Type<span>*</span></div>
			<div class="postform">
				<input id="100" type="radio" name="adtype" value=0 checked>
				<label for="100">I am Selling</label>
				<input id="101" type="radio" name="adtype" value=1>
				<label for="101">I am Buying</label>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Title<span>*</span></div>
			<div class="postform">
				<input id="posttitle" type="text" name="titletext" class="textarea" value="5-75 characters"  maxlength="75" title='Use Keywords. This is how people will find your advertisement.'></text><br>
			</div>
		</div>			
		
		<div class="postentity">
			<div class="postdescription">Price ($)<span>*</span></div>
			<div class="postform">
				<input id="postprice" type="text" name="pricetext" class="textarea" value="numbers (0-9)" maxlength="4"></text><br>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Detail<span>*</span></div>
			<div class="postform">
				<textarea id="postdetail" class='textarea messagefield' name='detailtext' id='detailtext' maxlength="500">Write some details..</textarea>
			</div>
		</div>
		
		<div class="postentity" id='emailfield'>
			<div class="postdescription">Email<span>*</span></div>
			<div class="postform">
				<input id="postemail" type="text" name="emailtext" id="emailtext" class="textarea" value="valid email address" title="This is how people will contact you. Don't worry, it's hidden."></text><br>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Image</div>
			<div class="postform">
				Upload your image <input type="file" name="file" id="file" title='Upload an Image' />
			</div>
		</div>
		
		<!--<div class="postentity">
			<div class="postdescription">Terms of Use<span>*</span></div>
			<div class="postform">
				<input type="checkbox" name="termsofuse">
				I agree to the <a href="terms.html" target="_blank">Terms of Use</a> and <a href="privacy.html" target="_blank">Privacy Policy</a>.
			</div>
		</div>-->
		
		<div class="postentity">
			<div class="postdescription" style="font:0.75em verdana">Required<span>*</span></div>
			<div class="postform">
				<input type="submit" name="submitad" value="Submit Advertisement" id="submitad" class="themecolor cursorhand themeborder" title='Submit this Advertisement'>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription" style="color:white;">.</div>
			<div class="postform" style="font:0.75em verdana;">
				By submitting your advertisement you are agreeing to our <a href="terms.php" target="_blank" title='Terms of Use'>Terms of Use</a> and <a href="privacy.php" target="_blank" title='Privacy Policy'>Privacy Policy</a>.
			</div>
		</div>
	</div>
</form>

<div class="filler"></div>

<?php
include("common/newsbox.php");
include('common/chatbox.php');
include('common/accountpanels.php');
include('common/navbar.php');
include('common/footer.php');
include("common/screenlock.php");
include("scripts/checkIfOnline.php");
?>
	
</body>
</html>