$(document).ready(function() {
	$('#loadingGIF').hide();
	
	$('#advsearch').bind('click', function(){
		expandAdvancedHandler()
	});
	
	$('#advsearch').hover(function()
	{
		this.src = "./img/advanced_search_hover.png";
	}, function()
	{
		this.src = "./img/advanced_search.png";
	}).tooltip();
	
	$('#searchgo img').bind('click', function(){
		openWindow('navsearchbar');
	});
	
	$('#searchgo img').hover(function()
	{
		this.src = "./img/search_go_hover.png";
	}, function()
	{
		this.src = "./img/search_go.png";
	}).tooltip();
	
	$('#advpanel').click(function () {
		$('#navsearchbar').focus();
	});
	
	$('#chatbox, #slider-range').bind('click', function (event) {
		stopEvent(event);
	});
	
	$('#navsearchbar').bind('focusin', function(){
		this.style.color='#C9C9C9';
		setCaretPosition(this, 0);
	});
	
	$('#navsearchbar').bind('click', function(){
		if (this.value==this.defaultValue) {
			setCaretPosition(this, 0);
		}
	});
	
	$('#navsearchbar').bind('focusout', function(){
		this.style.color='#ADADAD';
	});
	
	$('#navsearchbar').bind('keydown', function(){
		if (this.value==this.defaultValue) this.value='';
		this.style.color='black';
	});
	
	$('#navsearchbar').bind('keyup', function(){
		if (this.value=='') {
			this.value=this.defaultValue;
			setCaretPosition(this, 0);
			this.style.color='#ADADAD';
		}
	});
	
	$('#navbar').bind('click', function()
	{
		expandSocialPanel();
	});
	
	$('#expinfo').bind('click', function()
	{
		showAlert("<div style='text-align:left'><p style='text-align:justify;font-weight:600;'>Level Up to make your ads stand out!</p>"+
		"<p style='text-align:center'>Store:</p>"+
		"<ul style='list-style:none'><li>1 exp : Bump an Advertisement</li>"+
		"<li>more coming soon..</li></ul>"+
		"<p style='text-align:center'>Scoring System:</p>"+
		"<ul style='list-style:none'><li>5 exp : Refer a Friend*</li>"+
		"<li>3 exp : Confirmed Bug Report^</li>"+
		"<li>2 exp : Approved Suggestion^</li>"+
		"<li>2 exp : Accurate Ad Flagging^</li>"+
		"<li>more coming soon..</li></ul>"+
		"<p style='font-size:0.8em'>*Have a friend create & activate an account	using your username as a reference.</p>"+
		"<p style='font-size:0.8em'>^Bug reports, suggestions and flagging may take up to 24 hours to proccess. Experience will be penalized for false reports or flagging and unconstructive suggestions.</p></div>");
	});
	
	$('#locations').bind('click', function()
	{
		$('#locations ul').toggle();
	});
	
	$('#accountsettings').bind('click', function()
	{
		$('#accountsubops').toggle();
	});
	
	disableDraggingFor(document.getElementById('brand'));
	
	$('#accountname, #brand, #locations, #interact li, #accountops, #guestops').bind('click', function(event)
	{
		stopEvent(event);
	});
	
	
	setSlider();	
	
});


function setSlider() 
{
    var values = [0, 5, 10, 15, 20, 30, 40, 50, 60, 75, 100, 125, 150, 175, 200, 250, 300, 400, 500, 750, 1000, 1500, 2000, 3000, 4000, 5000, 6000, 7500, 10000],
    	slider = $("#slider-range");
    
    $('#highroller').on('change', function() {
        if (this.checked) {
            $("#slider-value").val("$100-$5000");
            slider.slider({
                range: true,
                min: 100,
                max: 10000,
                values: [100, 5000]
            });
        }
        else {
            $("#slider-value").val("$0-$250");
            slider.slider({
                range: true,
                min: 0,
                max: 500,
                values: [0, 250]
            });
        }
    });
        
      
    slider.slider({
        animation: "fast",
        range: true,
        min: 0,
        max: 500,
        values: [0, 250],
        step: 5,

        slide: function(event, ui) {
            var includeLeft = event.keyCode != $.ui.keyCode.RIGHT;
            var includeRight = event.keyCode != $.ui.keyCode.LEFT;
            var value = findNearest(includeLeft, includeRight, ui.value);

            $('#highroller').click(function() {
                if (this.checked) {
                    slider.slider("option", "max", 10000);
                    slider.slider("option", "values", [100, 5000]);
                    $("#slider-value").val("$100-$5000");
                }
                else {
                    slider.slider("option", "max", 500);
                    slider.slider("option", "values", [0, 250]);
                    $("#slider-value").val("$0-$500");
                }
            });


            if (ui.value == ui.values[0]) {
                slider.slider('values', 0, value);
            }
            else {
                slider.slider('values', 1, value);
            }
            $("#slider-value").val("$" + $("#slider-range").slider("values", 0) + "-$" + $("#slider-range").slider("values", 1));
        }
    });

        $('#highroller').click(function() {
                if (this.checked) {
                    $("#slider-value").val("$100-$5000");
                    slider.slider({
                        min: 100,
                        max: 10000,
                        values: [100, 5000]
                    });
                }
        else {
            $("#slider-value").val("$0-$500");
            slider.slider({
                        min: 0,
                        max: 1000,
                        values: [0, 500]
                    });
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



function openWindow(searchbar) {
	var searchval = document.getElementById(searchbar).value;
	if (searchval == "Search") searchval = "";
	
	var order = "date";
	
	var type = "";
	if ($('#200').is(':checked')) type += $('#200').val();
	if ($('#201').is(':checked')) type += $('#201').val();
	
	var price = $('#slider-value').val().replace('$','').replace('-$','-');
	
	var date = $('#date input[type=radio]:checked').val();
	if (!(date >= 0)) date = "";
	
	var online = 0;
	if ($('#202').is(':checked')) online = 1;
	
	var images = 0;
	if ($('#203').is(':checked')) images = 1;
	
	var category = "";
	$("#categories input[type=checkbox]:checked").each(function(){
		var val = $(this).val();
		category += val + "-";
	});
	
	var location = $('#currentlocation').text();
	
	var limit = '40';
	
	var newurl = "http://www.postonme.com/view.php?search=" + searchval + "&order=" + order + "&type=" + type + "&price=" + price + "&date=" + date + "&category=" + category + "&location=" + location + "&online=" + online + "&images=" + images + "&limit=" + limit;
	window.location = newurl;
}

function expandAdvancedPanel()
{
	$('#navbar').unbind('click');
	$('#navbar').bind('click', function(event)
	{
		stopEvent(event);
	});
	hideSocialField();
	var elem = document.getElementById("navbar"),
	height = 80,
	timer;
	
	timer = setInterval(function()
	{
		elem.style.height = ( height += 15 ) + "px";
		if ( height >= 200 )
		{
			$('#advpanel').show();
			//if ($('#hidechatbutton').is(':visible')) $('#hidechatbutton').trigger('click');
			clearInterval(timer);
		}
	}, 5);
}

function collapseAdvancedPanel()
{
	var elem = document.getElementById("navbar"),
	height = 200,
	timer;
	
	timer = setInterval(function()
	{
		elem.style.height = ( height -= 15 ) + "px";
		if ( height <= 80 )
		{
			$('#navbar').unbind('click');
			$('#navbar').bind('click', function()
			{
				collapseSocialPanel();
			});
			showSocialField();
			clearInterval(timer);
		}
	}, 5);
}

function expandSocialPanel()
{
	$('#navbar').unbind('click');
	
	$('#navbar').bind('click', function()
	{
		collapseSocialPanel();
	});
	
	//Clear the old timer
	if (window.socialtimer) clearInterval(window.socialtimer);
	var elem = document.getElementById("navbar"),
	height = 50,
	socialtimer;
	
	window.socialtimer = setInterval(function()
	{
		elem.style.height = ( height += 3 ) + "px";
		if ( height >= 80)
		{
			showSocialField();
			clearInterval(window.socialtimer);
		}
	}, 7);
}

function collapseSocialPanel()
{
	$('#navbar').unbind('click');
	$('#navbar').bind('click', function()
	{
		expandSocialPanel();
	});
	if (window.socialtimer) clearInterval(window.socialtimer);
	hideSocialField();
	var elem = document.getElementById("navbar"),
	height = 80,
	socialtimer;
	
	window.socialtimer = setInterval(function()
	{
		elem.style.height = ( height -= 3 ) + "px";
		if ( height <= 50 )
		{
			clearInterval(window.socialtimer);
		}
	}, 7);
}

function expandAdvancedHandler() {
	var e = $('#advsearch');
	e.unbind('click');
	expandAdvancedPanel();
	$('#navsearchbar').focus();
	e.bind('click', function(){
		collapseAdvancedHandler()
	});
	$(document).bind('click', function(){
		collapseAdvancedHandler()
	});
	$('#iframeView').contents().bind('click', function(){
		collapseAdvancedHandler()
	});
}

function collapseAdvancedHandler() {
	$(document).unbind('click');
	$('#iframeView').contents().unbind('click');
	var e = $('#advsearch');
	e.unbind('click');
	$('#advpanel').hide();
	collapseAdvancedPanel();
	e.bind('click', function(){ 
		expandAdvancedHandler()
	});
}

function hideSocialField()
{
	$('#fbfield').hide();
	$('#expfield').hide();
}

function showSocialField()
{
	$('#fbfield').show();
	$('#expfield').show();
	
	//Reactivate the facebook like butotn
	/*var like_box = $('#fbField .fb-like-inactive');
	like_box.removeClass('fb-like-inactive');
	like_box.addClass('fb-like');*/
	FB.XFBML.parse(document.getElementById('fbfield'));
}

function changeLocation(location)
{
	setCookie('location',location,365);
	$('#currentlocation').text(location);
	if (window.location.href.match(/view/)) openWindow("navsearchbar");
}