<div id='chatbox' class='themeborder' style="display:<?php if ($_COOKIE['chat'] == '') echo 'none'; else if ($_COOKIE['chat'] == 'true') echo 'block'; else echo 'none'; ?>">
	<div id='chatheader'>
		<div>Messages</div>
		<img src='img/chat_icons.png' alt='' width='36px' height='18px' onclick='openPastMessagesTab(); return true'/>
		<img src='img/chat_icons.png' alt='' width='36px' height='18px' onclick='hideChat(); return true'/>
		<!--<div id='hidechatbutton' class='cursorhand leftarrowbutton' onclick='hideChat(); return true;'><img src='img/collapseThumb.png' class='cursorhand' alt='' width='18px' height='18px'/></div>-->
	</div>
	<div id='currentmessagestab'>
		<div id='chatinformation'><!--<img src="img/chat_info.png" alt='' />--></div>
		<div id='chattitlecontainer'></div>
		<div id='chattextcontainer'></div>
	</div>
	<div id='pastmessagestab'>
		<div id='pastmessagescontainer'></div>
	</div>
</div>

<div id='showchatbutton' onclick='showChat(); return true;' style="visibility:<?php if ($_COOKIE['chat'] == '') echo 'visible'; else if ($_COOKIE['chat'] == 'true') echo 'hidden'; else echo 'visible'; ?>"><img class='cursorhand' src='img/message_tab.png' alt='' width='95px' height='17px'/></div>
