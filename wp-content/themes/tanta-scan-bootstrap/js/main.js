/**
 * Tanta Scan Bootstrap Main.js
 */
jQuery(document).ready(function($) {
	// Add smooth scrolling to all links
	$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
			&&
			location.hostname == this.hostname
		) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000, function() {
					var $target = $(target);
					$target.focus();
					if ($target.is(":focus")) {
						return false;
					} else {
						$target.attr('tabindex','-1');
						$target.focus();
					};
				});
			}
		}
	});

	// Add mobile menu toggle for Bootstrap navbar
	$('.navbar-toggler').on('click', function() {
		$('#navbarNav').toggleClass('show');
	});

	// Add active class to current menu item
	var currentPath = window.location.pathname;
	$(".nav-link").each(function() {
		if (this.href === window.location.href) {
			$(this).addClass("active");
		}
	});

	// Add tooltip functionality
	$('[data-bs-toggle="tooltip"]').tooltip();
});