<div id='newsbox' class='themeborder' style="display:<?php if ($_COOKIE['news'] == '') echo 'none'; else if ($_COOKIE['news'] == 'true') echo 'block'; else echo 'none'; ?>">
	<div style='height:15%'></div>
	<div id='hidenewsbutton' class='cursorhand rightarrowbutton' onclick='hideNews(); return true;'><img src='img/expandThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='newstitle'><img src='img/news.png' alt='' width='85px' height='29px'/></div>
	<div id='overflowfield'>
		
		<div class='newscontainer'>
			<div class='newsdate'>
				January 08, 2012
			</div>
			<div class='newstitle'>
				Coming Soon..
			</div>
			<div class='newsdetails'>
				<ul>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1000"); return true;'>Events</li>
					<li class='newssubdetails' id='n1000'>Get the word out about interesting events. Find out what is happening on campus and in the community.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1001"); return true;'>Ride Sharing</li>
					<li class='newssubdetails' id='n1001'>Looking for a ride?  Save money by carpooling with other students for the same destination at the same time.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1002"); return true;'>Jobs &amp; Internships</li>
					<li class='newssubdetails' id='n1002'>Provide efficient way for employers to reach students and provide them with meaningful employment opportunities.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1003"); return true;'>Housing</li>
					<li class='newssubdetails' id='n1003'>Connect students in need of rental accommodation with landlords who have rental properties available.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1004"); return true;'>Document Sharing</li>
					<li class='newssubdetails' id='n1004'>Looking for a document? Share files with the entire campus and search files shared by other students.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1005"); return true;'>Comments</li>
					<li class='newssubdetails' id='n1005'>Express opinions about what you think about classified advertisements, events, jobs and internships on the website.</li>
					<li class='cursorhand hoverunderline' onclick='toggleSubDetails("n1006"); return true;'>Discussion Forum</li>
					<li class='newssubdetails' id='n1006'>Start your own threads about any topic and post replies. Get advice, laugh, chat and debate with other students.</li>
				</ul>
			</div>
		</div>
		
		<div class='newscontainer'>
			<div class='newsdate'>
				January 08, 2012
			</div>
			<div class='newstitle'>
				PostOnMe launches at Western University!
			</div>
			<div class='newsdetails'> 
				<a href='suggestions.php'>Tell us what you want to see! Give us your thoughts in the <i>Suggestion Box</i></a>
			</div>				
		</div>
	</div>
</div>
<div id='shownewsbutton' class='leftarrowbutton' onclick='showNews(); return true;' style="visibility:<?php if ($_COOKIE['news'] == '') echo 'visible'; else if ($_COOKIE['news'] == 'true') echo 'hidden'; else echo 'visible'; ?>"><img class='cursorhand' src='img/collapseThumb.png' alt='' width='18px' height='18px'/></div>