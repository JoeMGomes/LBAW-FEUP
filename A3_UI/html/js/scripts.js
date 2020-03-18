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

jQuery(document).ready(function () {
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
	$('.sidebar').mCustomScrollbar({
		theme: "minimal-dark"
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