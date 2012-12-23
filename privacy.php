<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
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
		function submitSuggestion() {
			var message = document.getElementById('messagetext').value;
			
			var xmlhttp;
			if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
			else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");// code for IE6, IE5
			
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					var e = document.getElementById("alert");
					e.innerHTML=xmlhttp.responseText;
					e.classList.toggle('hidden');
				}
			}
			
			var url = "../scripts/emailSuggestion.php?message="+message;
			xmlhttp.open("GET",url,false);
			xmlhttp.send();
		}
	</script>
	
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

<div class="contentcontainer">

<h2>Privacy Policy</h2>

<p>PostOnMe has established this privacy policy to explain to you how your information is protected, collected and used, which may be updated by PostOnMe from time to time. PostOnMe will provide notice of materially significant changes to this privacy policy by posting notice on the PostOnMe site.</p>

<ol>
	<li>
		<p><b>Protecting Your Privacy</b></p>
		<ul>
			<li>We don't run banner ads, pop ups, pop unders, or any other kind of commercial ads.</li>
			<li>We don't share your information with third parties for marketing purposes.</li>
			<li>We don't engage in cross-marketing or link-referral programs with other sites.</li>
			<li>We don't employ tracking devices for marketing purposes ("cookies", "web beacons," single-pixel gifs).</li>
			<li>We don't send you unsolicited communications for marketing purposes.</li>
			<li>We offer email anonymization and relay, to reduce 3rd party harvesting & spam.</li>
			<li>Account information is password-protected. Keep your password safe.</li>
			<li>Forums use basic webserver authentication. Close your browser to log out.</li>
			<li>PostOnMe does not knowingly collect any information from persons under the age of 13. If PostOnMe learns that a posting is by a person under the age of 13, PostOnMe will remove that post.</li>
			<li>PostOnMe may provide links to third party websites, which may have different privacy practices. We are not responsible for, nor have any control over, the privacy policies of those third party websites, and encourage all users to read the privacy policies of each and every website visited.</li>
		</ul>
	</li>

	<li>
		<p><b>Data Collected</b></p>
		<ul>
			<li>We sometimes collect your email address, for purposes such as sending self-publishing and confirmation emails, authenticating user accounts, providing subscription email services, registering for forums, etc.</li>
			<li>We may collect personal information if you provide it in feedback or comments, post it on our classifieds or interactive forums, or if you contact us directly. Please do not post any personal information on PostOnMe forums or classifieds that you expect to keep private.</li>
			<li>Our web logs collect standard web log entries for each page served, including your IP address, page URL, and timestamp. 
			Web logs help us to diagnose problems with our server, to administer the PostOnMe site, and to otherwise provide our service to you.</li>
		</ul>
	</li>

	<li>
		<p><b>Data Stored</b></p>
		<ul>
			<li>All classified and forum postings are stored in our database, even after "deletion," and may be archived elsewhere.</li>
			<li>Our web logs and other records are stored indefinitely.</li>
			<li>Although we make good faith efforts to store the information in a secure operating environment that is not available to the public, we cannot guarantee complete security.</li>
		</ul>
	</li>

	<li>
		<p><b>Release Information</b></p>
		<ul>
			<li>PostOnMe may disclose information about its users if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process.</li>
			<li>PostOnMe may also disclose information about its users to law enforcement officers or others, in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms of Use; respond to claims that any posting or other content violates the rights of third-parties; or protect the rights, property, or personal safety of PostOnMe, its users or the general public.</li>
		</ul>
	</li>

	<li>
		<p><b>Feedback</b></p>
		<ul>
			<li>
			We welcome your feedback! Email us at info@postonme.com or drop us a suggestion in the <a href="suggestions.php">SuggestionBox</a>.
			</li>
		</ul>
	</li>
</ol>

</div>

<div class="filler"></div>

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