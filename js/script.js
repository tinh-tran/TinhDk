//jQuery that WP loads is in "no conflict" mode
jQuery(document).ready(function ($) {
	// $() will work as an alias for jQuery() inside of this function

	// Tooltip bootstrap
	$('[data-toggle="tooltip"]').tooltip();

	// Back to top
	$(window).scroll(function () {
		if ($(this).scrollTop() > 180) {
			$('.back-to-top').show();
		} else {
			$('.back-to-top').hide();
		}
	});
	$('.back-to-top').on('click', function (event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 700);
	});

	// Loader CV
	setTimeout(function () {
		$('.loader').fadeOut('slow', function () {
			$('#cv-main').fadeIn('slow', function () {
				$(this).css('display', 'block');
			});
		});
	}, 2000);

	// Particle Effects
	function confetti() {
		$.each($(".particletext.confetti"), function () {
			for (var i = 0; i <= 5; i++) {
				$(this).append('<span class="particle c' + $.rnd(1, 2) + '" style="top:' + $.rnd(100, 0) + '%; left:' + $.rnd(0, 100) + '%;width:' + $.rnd(5, 6) + 'px; height:' + $.rnd(3, 4) + 'px;animation-delay: ' + ($.rnd(0, 40) / 10) + 's;"></span>');
			}
		});
	}
	jQuery.rnd = function (m, n) {
		m = parseInt(m);
		n = parseInt(n);
		return Math.floor(Math.random() * (n - m + 1)) + m;
	}
	confetti();

	function hearts() {
		$.each($("#post-765 .posts-home"), function(){
			var heartcount = ($(this).width()/50);
			for(var i = 0; i <= heartcount; i++) {
				var size = ($.rnd(40,80)/10);
				$(this).append('<span class="particle" style="top:' + $.rnd(20,110) + '%; left:' + $.rnd(0,100) + '%;width:' + size + 'px; height:' + size + 'px;animation-delay: ' + ($.rnd(40,100)/10) + 's;"></span>');
			}
		});
	}
	hearts();

	// Search - Popover
	$('[data-toggle="popover"]').popover({
		trigger: 'focus',
	});

	$('#search').popover({
		trigger: 'focus',
		placement: 'bottom',
		html: true,
		content: 'Search + press <kbd>enter</kbd>',
	});

	// ekko lightbox
	
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});
	$('.entry-content a.lightbox').hover(function() {
		$(this).toggleClass('active');
	});
	//========================end.
});