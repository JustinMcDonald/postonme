$(document).ready(function()
{
	$('#searchbar').bind('click', function(event)
	{
		stopEvent(event);
	});
	
	$('#frontsignup').bind('click', function()
	{
		showSignupPanel();
	});
	
	$('#frontsearch').bind('click', function(event)
	{
		/*event.stopPropagation();
		$('#advsearch').trigger('click');*/
		openWindow('searchbar');
	});
	
	$('#frontpost').bind('click', function()
	{
		window.location = 'http://www.postonme.com/post.php';
	});
	
	$('#frontedit').bind('click', function()
	{
		window.location = 'http://www.postonme.com/account.php';
	});
	
	
	$('#searchbar').bind('keydown', function(){
		if(!e) var e = window.event;
		if (e.keyCode == 13) {
			$('#searchform').submit();
		}
	});
	
	$('#searchbar').bind('keydown', function(){
		if(!e) var e = window.event;
		if (e.keyCode == 13) {
			$('#searchform').submit();
		}
	});
	
	$('#frontpage img').each(function()
	{
		disableDraggingFor(this);
	});
	
	disableDraggingFor(document.getElementById('frontbanner'));
});

function shiftFrontColumnsRight()
{
	$('#frontedit').hide();
	$('#frontsignup').show();
}

function shiftFrontColumnsLeft()
{
	$('#frontsignup').hide();
	$('#frontedit').show();
}

function showSignupPanel()
{
	showGlassPanel("signupcontainer");
	$('#frontsignup').unbind('click');
	$('#frontsignup').bind('click', function()
	{
		hideSignupPanel();
	});
}

function hideSignupPanel()
{
	hideGlassPanel("signupcontainer");
	$('#frontsignup').unbind('click');
	$('#frontsignup').bind('click', function()
	{
		showSignupPanel();
	});
}