<?php
include('/home/postonme/hidden_scripts/definitions.php');
include('/home/postonme/hidden_scripts/session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML Strict//EN"><META http-equiv="Content-Type" content="text/html; charset=utf-8">

<html xmlns="http://www.w3.org/1999/xhtml" slick-uniqueid="1">
<head>

	<?php include("./common/headers.php"); ?>
	
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

<h2>PostOnMe Terms of Use</h2>

<p><b>1. General Information</b></h2>
<p>PostOnMe provides services through its website including but not limited to classified advertising and email forwarding. 
By accessing or using PostOnMe, you are a "user" and you accept and agree to the Terms of Use below as a legal contract between you and PostOnMe. </p>
<p>The Terms of Use include and incorporate additional guidelines applicable to particular categories or services available on PostOnMe as set forth to users upon access to such categories or services. 
PostOnMe may post changes to the Terms of Use at any time, and any such changes will be applicable to all subsequent access to or use of PostOnMe.</p>
<p>This Terms of Use constitute the entire agreement between you and PostOnMe and supersede any prior written or oral agreement. If you do not accept and agree to all provisions of the Terms of Use, now or in the future, you may reject the Terms of Use by immediately terminating all access and use of PostOnMe, in which case any continuing access or use of PostOnMe is unauthorized.</p>
<p>You are also required to comply with, and to ensure compliance with, all laws, ordinances and regulations applicable to your activities on PostOnMe.</p>
<p>The Terms of Use grant you a limited, revocable, nonexclusive license to access PostOnMe and use PostOnMe, in whole or in part, including but not limited to PostOnMe intellectual property therein, solely in compliance with the Terms of Use.</p>

<p><b>2. Moderation</b></h2>
<p>PostOnMe has the right, but not the obligation, to regulate content posted to, stored on or transmitted via PostOnMe by any user; to regulate content (including but not limited to any authorized or unauthorized access to or use of PostOnMe) by any user (or any other third party in any manner); and to enforce the Terms of Use, for any reason and in any manner or by any means that PostOnMe, in PostOnMe its sole discretion, deems necessary or appropriate.</p>
<p>PostOnMe may, in its sole discretion and without notice, start, stop or modify any regulation or enforcement measures at any time. PostOnMe action or inaction to regulate content or conduct or to enforce against any potential violation of the Terms of Use by any user (or any other third party) does not waive PostOnMe's right to implement or not implement regulation or enforcement measures with respect to any subsequent or similar content, conduct or potential Terms of Use violation.</p>
<p>You also understand and agree that any action or inaction by PostOnMe to prevent, restrict, redress or regulate content, or to implement other enforcement measures against any content, conduct or potential Terms of Use violation is undertaken voluntarily and in good faith, and you expressly agree that PostOnMe shall not be liable to you or anyone else for any action or inaction to prevent, restrict, redress, or regulate content, or to implement other enforcement measures against any content, conduct or potential violation of the Terms of Use.</p>
<p>Although PostOnMe may moderate content, conduct Terms of Use compliances on PostOnMe at PostOnMe's discretion, PostOnMe have no authority to make binding commitments, promises or representations to anyone that they will "take care" of any alleged problem or complaint, or that they will otherwise stop, cure or prevent any problem, content, conduct or purported Terms of Use violation from occurring or recurring.</p>
<p>Accordingly, you further agree that any representation by PostOnMe that PostOnMe would or would not prevent, restrict, redress or regulate content  or to implement other enforcement measures against any content, conduct or potential or purported Terms of Use violation is superseded by this provision and is nonbinding and unenforceable. 
Specifically, you agree that PostOnMe shall in no circumstance be liable as a result of any representation that PostOnMe would or would not restrict or redress any content, conduct or potential or purported Terms of Use violation.</p>
<p>PostOnMe also has the right in its sole discretion to limit, modify, interrupt, suspend or discontinue all or any portions of PostOnMe at any time without notice. PostOnMe shall not be liable for any such limitations, modifications, interruptions, suspensions or discontinuance, or any purported losses, harm or damages arising from or related thereto.</p>

<p><b>3. Content</b></h2>
<p>PostOnMe does not control, is not responsible for and makes no representations or warranties with respect to any user content. You are solely responsible for your access to, use of and/or reliance on any user content. 
You must conduct any necessary, appropriate, prudent or judicious investigation, inquiry, research and due diligence with respect to any user content.</p>
<p>You are also responsible for any content that you post or transmit and, if you create an account, you are responsible for all content posted or transmitted through or by use of your account.</p>
<p>Content prohibited from PostOnMe includes but is not limited to:</p>
<ul>
	<li>Illegal content</li>
	<li>Content in facilitation of the creation, advertising, distribution, provision or receipt of illegal goods or services</li>
	<li>Offensive content (including, without limitation, defamatory, threatening, hateful or pornographic content)</li>
	<li>Content that discloses another's personal, confidential or proprietary information</li>
	<li>False or fraudulent content (including but not limited to false, fraudulent or misleading responses to user ads transmitted via PostOnMe)</li>
	<li>Malicious content (including, without limitation, malware or spyware)</li>
	<li>Content that offers, promotes, advertises, or provides links to posting or auto-posting products or services, account creation or auto-creation products or services, flagging or auto-flagging products or services, bulk telephone numbers, or any other product or service that if utilized with respect to PostOnMe would violate these Terms of Use or PostOnMe's other legal rights </li>
	<li>Content that offers, promotes, advertises or provides links to unsolicited products or services</li>
</ul>
<p>You automatically grant and assign to PostOnMe, and you represent and warrant that you have the right to grant and assign to PostOnMe, a perpetual, irrevocable, unlimited, fully paid, fully sub-licensable license to copy, perform, display, distribute, prepare derivative works from (including, without limitation, incorporating into other works) and otherwise use any content that you post.</p>
<p>You also expressly grant and assign to PostOnMe all rights and causes of action to prohibit and enforce against any unauthorized copying, performance, display, distribution, use or exploitation of, or creation of derivative works from, any content that you post.</p>
<p>You agree to indemnify and hold PostOnMe harmless from and against any third-party claim, cause of action, demand or damages related to or arising out of:</p>
<ul>
	<li>Content that you post or transmit (including but not limited to content that a third-party deems defamatory or otherwise harmful or offensive)</li>
	<li>Activity that occurs through or by use of your account (including, without limitation, all content posted or transmitted)</li>
	<li>Your use of or reliance on any user content</li>
	<li>Your violation of the Terms of Use</li>
</ul>

<p><b>4. Conduct </b></h2>
<p>PostOnMe does not control, is not responsible for and makes no representations or warranties with respect to any user or user conduct. You are solely responsible for your interaction with or reliance on any user or user conduct. You must perform any necessary, appropriate, prudent or judicious investigation, inquiry, research and due diligence with respect to any user or user conduct.</p>
<p>You are also responsible for your own conduct and activities on, through or related to PostOnMe, and, if you create an account on PostOnMe, you are responsible for all conduct or activities on, through or by use of your account.</p>
<p>You agree to indemnify and hold PostOnMe harmless from and against any third-party claim, cause of action, demand or damages related to or arising out of your own conduct or activities on, through or related to PostOnMe, and related to or arising out of any conduct or activities on, through or by use of your PostOnMe account, if any. 
This indemnification obligation includes payment of any attorneys' fees and costs incurred by PostOnMe.</p>

<p><b>5. Postings</b></h2>
<p>PostOnMe is intended and designed as a local service. 
The same or substantially similar content may not be posted in more than one PostOnMe category. 
A user may post content only in the single PostOnMe category to which it is most relevant, and must not post content to inappropriate categories. 
A user may post the same or substantially similar content no more than once every 48 hours.</p>
<p>Users may not circumvent any technological measure implemented by PostOnMe to restrict the manner in which content may be posted on PostOnMe or to regulate the manner in which content (including but not limited to email) may be transmitted to other users.</p>
<p>This prohibition includes, without limitation, a ban on the use of multiple email addresses (created via an email address generator or otherwise); the use of multiple IP addresses (via proxy servers, modem toggling, or otherwise); CAPTCHA circumvention, automation or outsourcing; multiple and/or fraudulent PostOnMe accounts, including phone-verified accounts; URL shortening, obfuscation or redirection; use of multiple phone lines or phone forwarding for verification; and content obfuscation via HTML techniques, printing text on images, inserting random text or content "spinning."</p>
<p>It is expressly prohibited for any third party to post content to PostOnMe on behalf of another. Users must post content only on their own behalf, and may not permit, enable, induce or encourage any third party to post content for them.</p>
<p>It is expressly prohibited to post content to PostOnMe using any automated means. 
Users must post all content personally and manually through all steps of the posting process. 
It is also expressly prohibited for any user to develop, offer, market, sell, distribute or provide an automated means to perform any step of the posting process (in whole or in part). 
Any user who develops, offers, markets, sells, distributes or provides an automated means to perform any step of the posting process (in whole or in part) shall be responsible and liable to PostOnMe for each instance of access to PostOnMe (by any user or other third party) using that automated means.</p>
<p>Affiliate marketing is expressly prohibited on PostOnMe. Users may not post content or communicate with any PostOnMe user for purposes of affiliate marketing or in connection with any affiliate marketing system, scheme or program in any manner or under any circumstance.</p>

<p><b>6. Accounts</b></h2>
<p>A user may maintain and use no more than one account to post content. A user specifically may not create or use additional accounts for the purpose of circumventing technological restrictions (security measures) in the posting process or otherwise for posting content in violation of the Terms of Use.</p>
<p>A user may create an account only on him/her own behalf. 
A user must not permit, enable, induce or encourage others to create accounts for him/her. 
The creation of accounts for others is expressly prohibited. 
A user must only use him/her own account, and may not use any account of another. 
The purchase and sale of accounts is expressly prohibited. 
A user must create his/her account personally and manually and may not create accounts by any automated means.</p>
<p>A user must create his/her account personally and manually and may not create accounts by any automated means. 
Without limitation, this includes the obligation that the user personally and manually solves any CAPTCHA challenge in the account creation process. 
The circumvention of any technological restriction or security measure in the account creation or process is also expressly prohibited.</p>

<p><b>7. Flagging</b></h2>
<p>A user shall not "flag" (or otherwise seek removal of) content on PostOnMe without a personal, good-faith belief that the content violates the Terms of Use. A user may flag content only on his/her own behalf. A user must not permit, enable, induce or encourage others to flag content for them. A user must not flag content for others. A user may flag a specific item of content only once. A user flagging content must do so manually and may not employ any automated means.</p>
<p>A user may flag a specific item of content only once.</p>
<p>A user flagging content must do so manually and may not employ any automated means, products (including, without limitation, software programs) or services to flag content. A user must not circumvent any technological restrictions (security measures) in the flagging process. Without limitation, this prohibition includes a ban on the use of multiple IP addresses for flagging (by use of proxy servers or any means whatsoever).</p>

<p><b>8. Unauthorized Access and Activities</b></h2>
<p>This section 8 applies to all uses and users of PostOnMe. PostOnMe has sole and absolute discretion to authorize or deny any exception or exceptions to the terms in this section 8.</p>
<p>To maintain the integrity and functionality of PostOnMe for its users, access to PostOnMe and/or activities related to PostOnMe that are harmful to, inconsistent with or disruptive of PostOnMe and/or its users' beneficial use and enjoyment of PostOnMe are expressly unauthorized and prohibited. For example, without limitation:</p>
<ul>
	<li>The collection of PostOnMe users' personal information (including but not limited to email addresses, IP addresses) is not allowed for any purpose.</li>
	<li>Any copying, aggregation, display, distribution, performance or derivative use of PostOnMe or any content posted on PostOnMe whether done directly or through intermediaries is prohibited.</li>
	<li>Any access to or use of PostOnMe to design, develop, test, update, operate, modify, maintain, support, market, advertise, distribute or otherwise make available any program, application or that enables or provides access to, use of, operation of or interoperation with PostOnMe is prohibited. </li>
	<li>If you access PostOnMe or copy, display, distribute, perform or create derivative works from PostOnMe WebPages in violation of the Terms of Use or for purposes inconsistent with the Terms of Use, your access, copying, display, distribution, performance or derivative work is unauthorized. </li>
	<li>Any effort to decompile, disassemble or reverse engineer all or any part of PostOnMe in order to identify, acquire, copy or emulate any source code or object code is expressly prohibited.</li>
	<li>Any activities (including but not limited to posting voluminous content) that are inconsistent with use of PostOnMe in compliance with the Terms of Use or that may impair or interfere with the integrity, functionality, performance, usefulness, usability, or quality of all or any part of PostOnMe in any manner are expressly prohibited.</li>
	<li>Any attempt (whether or not successful) to engage in, or to enable, induce, encourage, cause or assist anyone else to engage in, any of the above unauthorized and prohibited access and activities is also expressly prohibited and is a violation of the Terms of Use.</li>
</ul>

<p><b>9. User Communications, Transactions, Interactions, Disputes and Relations</b></h2>
<p>PostOnMe are not parties to, have no involvement or interest in, make no representations or warranties as to, and have no responsibility or liability with respect to any communications, transactions, interactions, disputes or any relations whatsoever between you and any other user, person or organization ("your interactions with others"). You must conduct any necessary, appropriate, prudent or judicious investigation, inquiry, research or due diligence with respect to your interactions with others.</p>
<p>You agree to indemnify and hold PostOnMe harmless from and against any third-party claim, cause of action, demand or damages related to or arising out of your interactions with others. This indemnification obligation includes payment of any attorneys' fees and costs incurred by PostOnMe.</p>

<p><b>10. Disclaimers</b></h2>
<p>Your access to, use of and reliance on PostOnMe and content accessed through PostOnMe is entirely at your own risk. PostOnMe (Including, without limitation, the websites, programs, services, forums and content accessed through the websites, programs, services and forums) is provided on an "As Is" or "As Available" basis without any warranties of any kind.</p>
<p>All express and implied warranties (Including, without limitation, warranties of merchantability, fitness for a particular purpose, and non-infringement of proprietary rights) are expressly disclaimed.</p>
<p>Without limiting the foregoing, PostOnMe also disclaims all warranties for or with respect to:</p>
<ul>
	<li>The security, reliability, timeliness, accuracy and performance of PostOnMe and content accessed through PostOnMe</li>
	<li>Computer worms, viruses, spyware, adware and any other malware, malicious code or harmful content or components accessed, received or disseminated through, related to or as a result of PostOnMe or content accessed through PostOnMe.</li>
	<li>Any transactions or potential transactions, goods or services promised or exchanged, information or advice offered or exchanged, or other content, interactions, representations or communications through, related to or as a result of use of PostOnMe or content accessed through PostOnMe (Including, without limitation, accessed through any links on PostOnMe or in content)</li>
</ul>

<p><b>11. Notification of Claims of Infringement</b></h2>
<p>If you believe that your work has been copied in a way that constitutes copyright infringement or that your intellectual property rights (including trademark rights) have been otherwise violated, please email us at support@postonme.com.</p>

<p><b>12. Limitations of Liability</b></h2>
<p>PostOnMe shall under no circumstances be liable for any access to, use of or reliance on PostOnMe by you or anyone else, or for any transactions, communications, interactions, disputes or relations between you and any other person or organization arising out of or related to PostOnMe or content accessed through PostOnMe, including but not limited to liability for injunctive relief as well as any harm, injury, loss or damages of any kind incurred by you or anyone else (Including, without limitation, direct, indirect, incidental, special, consequential, statutory, exemplary or punitive damages, even if PostOnMe has been advised of the possibility of such damages). 
This limitation of liability applies regardless of, but is not restricted to, whether the alleged liability, harm, injury, loss or damages arose from authorized or unauthorized access to or use of PostOnMe or content accessed through PostOnMe; any inability to access or use PostOnMe or content accessed through PostOnMe; or any removal, deletion, limitation, modification, interruption, suspension, discontinuance or termination of PostOnMe or content accessed through PostOnMe.</p>
<p>These limitations shall also apply with respect to damages resulting from any transactions or potential transactions, goods or services promised or exchanged, information or advice offered or exchanged, or other content, interactions, representations, communications or relations through, related to or as a result of PostOnMe or content accessed through PostOnMe (Including, without limitation, any links on PostOnMe and links in content accessed through PostOnMe).</p>
<p>You hereby release PostOnMe from all claims, demands and damages of every kind and nature, known and unknown, direct and indirect, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way related to PostOnMe or content accessed through PostOnMe, or any interactions with others arising out of or related to PostOnMe or content accessed through PostOnMe.</p>
<p>These limitations shall apply to the fullest extent permitted by law.</p>

<p><b>13. Damages</b></h2>
<p>You agree to pay to PostOnMe the total amount of all actual damages (including but not limited to direct, indirect, consequential and incidental damages) caused by any violation of the Terms of Use for which you bear responsibility; EXCEPT you acknowledge that, for certain Terms of Use violations, actual damages would be extremely difficult or impossible to quantify. </p>
<p>Furthermore you agree that the amounts of liquidated damages described therein are reasonable estimates of PostOnMe damages for such violations, and that liquidated damages for violations of the Terms of Use are and will be cumulative.</p>

<p><b>14. Privacy</b></h2>
<p>PostOnMe has established a <a href="privacy.php">Privacy Policy</a> covering the collection, use, and disclosure of user information.</p>

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