$(document).ready(function()
{
	$('#searchbar').bind('click', function(event)
	{
		event.stopPropagation();
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
});

function shiftFrontColumnsRight()
{
	var s = $('#frontsearch');
	s.css('background-color', '#0083B2');
	s.hover(function()
	{
		$(this).css('background-color', '#1295c4');
	}, function()
	{
		$(this).css('background-color', '#0083B2');
	});
	
	var s = $('#frontpost');
	s.css('background-color', '#005A7B');
	s.hover(function()
	{
		$(this).css('background-color', '#167091');
	}, function()
	{
		$(this).css('background-color', '#005A7B');
	});
	
	$('#frontedit').hide();
	$('#frontrelax').show();
}

function shiftFrontColumnsLeft()
{
	var s = $('#frontsearch');
	s.css('background-color', '#00BBFE');
	s.hover(function()
	{
		$(this).css('background-color', '#12cbFf');
	}, function()
	{
		$(this).css('background-color', '#00BBFE');
	});
	
	var s = $('#frontpost');
	s.css('background-color', '#0083B2');
	s.hover(function()
	{
		$(this).css('background-color', '#1295c4');
	}, function()
	{
		$(this).css('background-color', '#0083B2');
	});
	
	$('#frontrelax').hide();
	$('#frontedit').show();
}