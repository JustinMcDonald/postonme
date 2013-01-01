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
		//openWindow('searchbar');
		$('#frontbanner').fadeOut('fast', function() {
			$('#browsecategories').css('display', 'block').css('opacity', '0').css('bottom', '80px').animate({ opacity: 1, bottom: -15}, 1200);
		});
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
	
	$('#browsecategories label').each(function()
	{
		$(this).bind('click', function()
		{
			window.location = 'http://www.postonme.com/view.php?order=date&category='+$(this).text()+'-&location=Western%20University&online=0&images=0&limit=40';
		});
	});
});

function showSignupColumn()
{
	$('#frontedit').hide();
	$('#frontsignup').show();
}

function showEditColumn()
{
	$('#frontsignup').hide();
	$('#frontedit').show();
}

function showSignupPanel()
{
	showGlassPanel("signupbox");
	$('#frontsignup').unbind('click');
	$('#frontsignup').bind('click', function()
	{
		hideSignupPanel();
	});
}

function hideSignupPanel()
{
	hideGlassPanel("signupbox");
	$('#frontsignup').unbind('click');
	$('#frontsignup').bind('click', function()
	{
		showSignupPanel();
	});
}