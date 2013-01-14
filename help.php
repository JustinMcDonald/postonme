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

<div class="contentcontainer">
<h2>Help</h2>
<p>Have a question about the website? Please <a href='contact.php'>send us an email</a> and we would be delighted to help you out.</p>
<p>While we do our best to address issues of fraud and improper use of the site, we do not moderate complaints that arise between buyers and sellers, nor do we have the authority to hand down judgments favouring one party or another.</p>
<p>PostOnMe does not review or confirm the veracity of any claim made in the classifieds. 
It is the responsibility of the seller to adhere to website's <a href='terms.php'>Term of Use</a> when posting classifieds, and the responsibility of the buyer to evaluate claims made by sellers and protect themselves accordingly. 
Users who violate the <a href='terms.php'>Term of Use</a> of PostOnMe may have their accounts terminated.</p>
<p>If you suspect that a classified posting is either fraudulent or illegal, we encourage you flag it and <a href='contact.php'>Contact Us</a> immediately.</p>
<p>PostOnMe has compiled a best practices guide to encourage safer behavior.</p>
<p>Remember that vigilance and caution are your best defense against unscrupulous posters. 
If a deal seems too good to be true, it probably is.</p>
<div><br/></div>
<p><b>Best practices with accounts and personal information</b></p>
<ul>
	<li>PostOnMe will never ask for your password or account information. 
	Do not reveal your password or account information to a third party.</li>
	<li>Avoid auto-filling your username and password on public computers.</li>
</ul>
<p><b>Best practices buying or selling textbooks and other classifieds</b></p>
<ul>
	<li>Never give out any personal or financial information (e.g. social insurance number, bank account number) to a buyer or seller.</li>
	<li>PostOnMe does not have arrangements with PayPal or any other company to provide secure online payment for classified items. 
	Any posting that claims to offer secure online payment through PostOnMe is a scam.</li>
	<li>Never agree to wire funds to a seller. 
	A legitimate seller will not pressure you to use a money transfer company only.</li>
	<li>Never allow a buyer to pay more than the asking price this is a common scam.</li>
	<li>Never agree to involve third parties or intermediaries in a payment scheme.</li>
	<li>Do not finalize a transaction until you are completely satisfied with all the terms.</li>
	<li>We strongly encourage users to meet buyers/sellers in-person to see the product and exchange funds.</li>
	<li>Record details about the sale item (price, etc.) and the contact information of the buyer/seller in case there are any problems.</li>
	<li>Arrange buyer-seller meetings in public spaces during daylight hours, or go with a friend.</li>
</ul>
<div><br/></div>
<p><b>Frequently Asked Questions</b></p>
<ul>
	<li>Coming soon..</li>
</ul>

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