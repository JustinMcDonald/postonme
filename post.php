<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US" xmlns:og="http://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>PostOnMe | University Campus Classifieds</title>

	<?php include("./common/headers.php"); ?>
	
	<link rel="stylesheet" type="text/css" href="css/post.css"/>

	<script type="text/javascript" src="js/jQuery/jquery.form.js"></script>
	<script type='text/javascript' src="/js/post.js"></script>
	
</head>
<body onload="initChat(); return false;">

<div id="fb-root"></div>
<script type='text/javascript'>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=451061051608923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php include('common/nav_filler.php'); ?>

<p class="hidden" id="alert"></p>

<iframe id="iframeAlert" name="iframeAlert" src="./iframes/postAdvertisement.php?first=true" allowtransparency="true" frameBorder="0"></iframe>

<form action="./iframes/postAdvertisement.php" method='post' id="adform" enctype="multipart/form-data" target="iframeAlert">
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
		
		<?php 
			/*$show = false;
			if (!isset($_SESSION['online'])) $show = true; 
			else if ($_SESSION['online'] != 1) $show = true;
			
			if ($show) 
			echo "<div class='postentity' id='signupspot'>".
				"<div class='postdescription'>LiveChat<br/><div>-OPTIONAL-<br/>The fastest way online to buy &amp; sell your stuff.</div></div>".
				"<div class='postform'>".
					"<div class='newline'>".
						"<div class='subfieldtitles'>Username:</div>".
						"<input id='postchatname' type='text' name='chatname' class='textarea livechatfield' title='1-15 characters (a-z, 0-9)' maxlength='15' />".
					"</div>".
					"<div class='newline'>".
						"<div class='subfieldtitles'>Password:</div>".
						"<input id='postchatpass' type='password' name='chatpass' class='textarea livechatfield'  title='5-15 characters' maxlength='15' />".
					"</div>".
					"<div class='newline'>".
						"<div class='subfieldtitles'>Retype Password:</div>".
						"<input id='postchatpass2' type='password' name='chatpass2' class='textarea livechatfield'  title='5-15 characters' maxlength='15' />".
					"</div>".
					"<!--<div class='newline'>".
						"<div class='subfieldtitles'>Referred By: <span style='font-size:0.8em'>(optional)</span></div>".
						"<input id='postreference' type='text' name='postreference' class='textarea livechatfield'  title='1-15 characters' maxlength='15' autocomplete='off'>".
					"</div>-->".
				"</div>".
			"</div>";*/
		?>
		
		<div class="postentity">
			<div class="postdescription">Location<span>*</span></div>
			<div class="postform">
				<select name="postlocation" class="textarea" id='locationoptions'>
					<option>Georgian College</option>
					<option>Western University</option>
				</select>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Category<span>*</span></div>
			<div class="postform">
				<select name="categorytext" class="textarea">
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
				<input id="p100" type="radio" name="adtype" value='0' checked="checked" />
				<label for="p100">I am Selling</label>
				<input id="p101" type="radio" name="adtype" value='1'/>
				<label for="p101">I am Buying</label>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Title<span>*</span></div>
			<div class="postform">
				<input id="posttitle" type="text" name="titletext" class="textarea" value="5-75 characters"  maxlength="75" title='Use Keywords. This is how people will find your advertisement.'/><div><br/></div>
			</div>
		</div>			
		
		<div class="postentity">
			<div class="postdescription">Price ($)<span>*</span></div>
			<div class="postform">
				<input id="postprice" type="text" name="pricetext" class="textarea" value="numbers (0-9)" maxlength="4"/><input type="checkbox" name="pricenegotiable" id='pricenegotiable' value="1">Negotiable<div><br/></div>
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription">Detail<span>*</span></div>
			<div class="postform">
				<textarea id="postdetail" class='textarea messagefield' name='detailtext' cols='' rows=''>Write some details..</textarea>
			</div>
		</div>
		
		<div class="postentity" id='emailfield'>
			<div class="postdescription">Email<span>*</span></div>
			<div class="postform">
				<input id="postemail" type="text" name="emailtext" class="textarea" value="valid email address" title="This is how people will contact you. Don't worry, it's hidden."/><div><br/></div>
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
			<div class="postdescription">Required<span>*</span></div>
			<div class="postform">
				<input type="submit" name="submitad" value="Submit Advertisement" id="submitad" class="themecolor cursorhand themeborder" title='Submit this Advertisement' />
			</div>
		</div>
		
		<div class="postentity">
			<div class="postdescription" style="color:white;">.</div>
			<div class="postform">
				By submitting your advertisement you are agreeing to our <a id='pterms' href="terms.php" title='Terms of Use'>Terms of Use</a> and <a id='pprivacy' href="privacy.php" title='Privacy Policy'>Privacy Policy</a>.
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