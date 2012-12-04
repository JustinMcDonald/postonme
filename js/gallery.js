function openGallery(path, event)
{
	stopEvent(event);
	var gallery = window.top.document.getElementById('gallery');
	gallery.innerHTML = "<div><img src='"+path+"' alt='' id='galleryimg' class='themeborder'/></div>";
	gallery.style.visibility = "visible";
}

function closeGallery(event){
	stopEvent(event);
	window.top.document.getElementById('gallery').style.visibility = "hidden";
}

function setOpa(element, opa) {
	element.style.opacity = opa;
	element.style.MozOpacity = opa;
	element.style.KhtmlOpacity = opa;
	element.style.filter = 'alpha(opacity=' + (opa * 100) + ');';
}

function fadeOut(element, duration) {
	for (i = 0; i <= 1; i += 0.01) {
		setTimeout("setOpa("+element+", " + (1 - i) +")", i * duration);
	}
}

function fadeIn(element, duration) {
	for (i = 0; i <= 1; i += 0.01) {
		setTimeout("setOpa("+element+", "  + i +")", i * duration);
	}
}