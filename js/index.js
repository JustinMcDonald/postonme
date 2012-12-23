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
	
	$('.slider').slider({
		
	});
	
	$('#frontpage img').each(function()
	{
		disableDraggingFor(this);
	});
	
	disableDraggingFor(document.getElementById('frontbanner'));
	
	$('#slider-range').slider({
		range: true,
		values:[0,1000],
		orientation: 'horizontal'
	});
	//setSlider();
});


function setSlider() {
    var values = [0, 5, 10, 15, 20, 30, 40, 50, 60, 75, 100, 125, 150, 175, 200, 250, 300, 400, 500, 750, 1000, 1500];

    var slider = $("#slider-range").slider({
        orientation: 'horizontal',
        animation: "fast",
        range: true,
        min: 0,
        max: 1000,
        values: [0, 1000],
        slide: function(event, ui) {
            $('#highroller').click(function() {
                if (this.checked) {
                    values.push(2000, 3000, 4000, 5000, 6000, 7500, 10000);
                    slider.slider("option", "max", 10000);
                    slider.slider("option", "values", [100, 10000]);
                }
                else {
                    values.splice(22, 7);
                    slider.slider("option", "max", 1000);
                    slider.slider("option", "values", [0, 1000]);
                }
            });

            var includeLeft = event.keyCode != $.ui.keyCode.RIGHT;
            var includeRight = event.keyCode != $.ui.keyCode.LEFT;
            var value = findNearest(includeLeft, includeRight, ui.value);
            if (ui.value == ui.values[0]) {
                slider.slider('values', 0, value);
            }
            else {
                slider.slider('values', 1, value);
            }
            $("#slider-value").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
        }
    });

    function findNearest(includeLeft, includeRight, value) {
        var nearest = null;
        var diff = null;
        for (var i = 0; i < values.length; i++) {
            if ((includeLeft && values[i] <= value) || (includeRight && values[i] >= value)) {
                var newDiff = Math.abs(value - values[i]);
                if (diff == null || newDiff < diff) {
                    nearest = values[i];
                    diff = newDiff;
                }
            }
        }
        return nearest;
    }
}

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