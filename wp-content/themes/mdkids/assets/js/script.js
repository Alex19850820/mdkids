'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Shared = function Shared() {
	_classCallCheck(this, Shared);
};

window.onload = function (e) {
	//dropdown
	if (window.innerWidth > 993) {
		$('.jsDropOpen').mouseenter(function () {
			$(this).parent('li').children('.drop-menu').addClass('drop-active');
		});
		$('.jsDropClose').mouseleave(function () {
			$(this).parent('li').children('.drop-menu').removeClass('drop-active');
		});
	} else {
		$('.jsDropOpen').click(function () {
			$(this).parent('.jsParentDropMenu').children('.drop-menu').toggleClass('drop-active');
		});
	}

	$('.jsMobMenu').click(function () {
		$('.jsMenu').toggleClass('menu-active');
		$('.overlay').fadeToggle();
		$('.jsMobMenu').toggleClass('burger-active');
		$('body').toggleClass('body-overflow');
	});
	$('.overlay').click(function () {
		$('.jsMenu').removeClass('menu-active');
		$('.overlay').fadeToggle();
		$('.jsMobMenu').removeClass('burger-active');
		$('body').removeClass('body-overflow');
	});

	//search
	$('.jsSearchOpen').click(function () {
		$('.jsSearchOpen').addClass('search-open-noactive');
		$('.search-block input').addClass('search-active');
		setTimeout(function () {
			$('.search-block input').addClass('searchFlag');
		}, 2000);
	});

	$(document).click(function (e) {
		// событие клика по веб-документу
		var input = $(".search-block input"); // тут указываем ID элемента
		var inputBlock = $('.jsSearchBlock');
		if (!input.is(e.target) // если клик был не по нашему блоку
			&& inputBlock.has(e.target).length === 0 && input.hasClass('searchFlag')) {
			// и не по его дочерним элементам
			input.removeClass('search-active'); // скрываем его
			$('.jsSearchOpen').removeClass('search-open-noactive');
			input.removeClass('searchFlag');
		}
	});
};

jQuery(document).ready(function ($) {
dotDot();
});
function dotDot() {
	$(".mainNewsDot").dotdotdot({
		callback: function callback(isTruncated) {},
		/* Function invoked after truncating the text.
		   Inside this function, "this" refers to the wrapper. */

		ellipsis: '\u2026 ',
		/* The text to add as ellipsis. */

		height: 120,
		/* The (max-)height for the wrapper:
		   null: measure the CSS (max-)height ones;
		   a number: sets a specific height in pixels;
		   "watch": re-measures the CSS (max-)height in the "watch". */

		keep: null,
		/* jQuery-selector for elements to keep after the ellipsis. */

		tolerance: 0,
		/* Deviation for the measured wrapper height. */

		truncate: "word",
		/* How to truncate the text: By "node", "word" or "letter". */

		watch: "window"
		/* Whether to update the ellipsis:
		   true: Monitors the wrapper width and height;
		   "window": Monitors the window width and height. */
	});
}
//# sourceMappingURL=script.js.map