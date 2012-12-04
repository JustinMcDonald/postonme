function indicateError(id)
{
	var e = $('#'+id);
	e.css('border', '2px solid #F22E2E');
	e.css('background-color', '#FFFAFA');
	e.focus();
	/*$('html, body').animate({
         scrollTop: $("#"+id).offset().top
     }, 2000);*/
}

function removeFormErrors(form)
{
	$(form).find('input[type=text], input[type=password], textarea').each(function()
	{
		$(this).css('border', '1px outset rgb(162,162,162)');
		$(this).css('background-color', 'rgb(255,255,255)');
	});
}

function setCookie(c_name,value,exdays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++)
	{
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name)
		{
			return unescape(y);
		}
	}
	return null;
}

function setCaretPosition(elem, caretPos) {
    var range;

    if (elem.createTextRange) {
        range = elem.createTextRange();
        range.move('character', caretPos);
        range.select();
    } else {
        //elem.focus();
        if (elem.selectionStart !== undefined) {
            elem.setSelectionRange(caretPos, caretPos);
        }
    }
}

function stopEvent(e) {
 
	if(!e) var e = window.event;
 
	//e.cancelBubble is supported by IE -
        // this will kill the bubbling process.
	e.cancelBubble = true;
	e.returnValue = false;
 
	//e.stopPropagation works only in Firefox.
	if ( e.stopPropagation ) e.stopPropagation();
	//if ( e.preventDefault ) e.preventDefault();		
 
       return false;
}

function findCSSRule(selector)
{
	var mySheet = document.styleSheets[1];
	ruleIndex = -1;				// Default to 'not found'
	theRules = mySheet.cssRules ? mySheet.cssRules : mySheet.rules;
	for (i=0; i<theRules.length; i++)
	{
		alert(theRules[i].selectorText);
		if (theRules[i].selectorText == selector)
		{
			ruleIndex = i;
			break;
		} // endif theRules[i]
	} // end for i
	return ruleIndex;
} // end findCSSRule()
 
function changeRule(selector, property, setting)
{
	var mySheet = document.styleSheets[1];
	theRule = mySheet.cssRules ? mySheet.cssRules[findCSSRule(selector)] : mySheet.rules[findCSSRule(selector)];
	eval('theRule.style.' + property + '="' + setting + '"');
	return false;
} // end changeRule()

function addCSSRule(selector, newRule)
{
	var mySheet = document.styleSheets[1];
	if (mySheet.addRule)
	{
		mySheet.addRule(selector, newRule);		// For Internet Explorer
	}
	else
	{
		ruleIndex = mySheet.cssRules.length;
		mySheet.insertRule(selector + '{' + newRule + ';}', ruleIndex);	// For Firefox, Chrome, etc.
	} // endif mySheet.addRule
} // end addCSSRule()

function disableDraggingFor(element)
{
	// this works for FireFox and WebKit in future according to http://help.dottoro.com/lhqsqbtn.php
	element.draggable = false;
	// this works for older web layout engines
	element.onmousedown = function(event)
	{
		if (!event) var event = window.event;
		if (event.preventDefault) event.preventDefault();
		return false;
	};
}
