function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if (element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if ($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({
			scrollTop: scroll_to
		}, 1000);
	}
}

function open_notifications() {
	let notifications = document.getElementById("notifications");
	notifications.style.display = "block";
}

function close_notifications() {
	let notifications = document.getElementById("notifications");
	notifications.style.display = "none";
}

document.addEventListener("click", function (event) {
	if (event.target.closest(".notifications")) return;
	if (event.target.closest(".notifications-buttom")) return;
	close_notifications();
});


jQuery(document).ready(function() {
	/*
	    Sidebar
	*/
	$('.dismiss, .overlay').on('click', function () {
		$('.sidebar').removeClass('active');
		$('.sidebar').addClass('inactive');
		$('.overlay').removeClass('active');
	});

	$('.open-menu').on('click', function (e) {
		e.preventDefault();
		$('.sidebar').addClass('active');
		$('.sidebar').removeClass('inactive');
		$('.overlay').addClass('active');
		// close opened sub-menus
		$('.collapse.show').toggleClass('show');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
	});

	/* replace the default browser scrollbar in the sidebar, in case the sidebar menu has a height that is bigger than the viewport */
	$('.popover').mCustomScrollbar({
		theme: "minimal-dark"
	});
	
	$('.labelToCheck').on('keypress', function (event) {
		if (event.which === 13) {
			$(this).prop('checked', !$(this).prop('checked'));
		}
	});

	/*
	    Navigation
	*/

	$('.to-top a').on('click', function (e) {
		e.preventDefault();
		if ($(window).scrollTop() != 0) {
			$('html, body').stop().animate({
				scrollTop: 0
			}, 1000);
		}
	});

});


/**
 * Tag Creation color and text preview 
 */
var newCatPreview = document.getElementById("newCatPreview");
var color_picker = document.getElementById("color-picker");
var color_picker_wrapper = document.getElementById("color-picker-wrapper");
var cat_input = document.getElementById("inputCat");

color_picker.onchange = function() {
	color_picker_wrapper.style.background = color_picker.value;   
	newCatPreview.style.background = color_picker.value;
}
cat_input.addEventListener("keyup",function(){
	newCatPreview.innerHTML = cat_input.value;
})

newCatPreview.innerHTML = "&nbsp";
color_picker_wrapper.style.background = color_picker.value;
newCatPreview.style.background = color_picker.value;


/**
 * Tag Edition and text preview
 */
var newCatPreviewEdit = document.getElementById("newCatPreviewEdit");
var color_pickerEdit = document.getElementById("color-pickerEdit");
var color_picker_wrapperEdit = document.getElementById("color-picker-wrapperEdit");
var cat_inputEdit = document.getElementById("inputCatEdit");

color_pickerEdit.onchange = function() {
	color_picker_wrapperEdit.style.background = color_pickerEdit.value;   
	newCatPreviewEdit.style.background = color_pickerEdit.value;
}
cat_inputEdit.addEventListener("keyup",function(){
	newCatPreviewEdit.innerHTML = cat_inputEdit.value;
})

newCatPreviewEdit.innerHTML = "&nbsp";
color_picker_wrapperEdit.style.background = color_pickerEdit.value;
newCatPreviewEdit.style.background = color_pickerEdit.value;
