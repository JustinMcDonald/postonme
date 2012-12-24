<div id='chatbox' class='themeborder' style="display:<?php if ($_COOKIE['chat'] == '') echo 'none'; else if ($_COOKIE['chat'] == 'true') echo 'block'; else echo 'none'; ?>">
	<div style='height:15%'></div>
	<div id='hidechatbutton' class='cursorhand leftarrowbutton' onclick='hideChat(); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>
	<div id='chatinformation'></div>
	<div id='chattitlecontainer'></div>
	<div id='chattextcontainer'></div>
	<div id='outboxcontainer'></div>
</div>

<div id='showchatbutton' onclick='showChat(); return true;' style="visibility:<?php if ($_COOKIE['chat'] == '') echo 'visible'; else if ($_COOKIE['chat'] == 'true') echo 'hidden'; else echo 'visible'; ?>"><img class='cursorhand rightarrowbutton' src='img/expandThumb.png' alt='' width='18px' height='18px'/></div>
