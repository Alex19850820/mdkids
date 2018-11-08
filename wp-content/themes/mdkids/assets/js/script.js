'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Shared = function Shared() {
	_classCallCheck(this, Shared);
};

window.onload = function (e) {
	//dropdown
	$('.jsDropOpen').mouseenter(function () {
		$(this).parent('li').children('.drop-menu').addClass('drop-active');
	});
	$('.jsDropClose').mouseleave(function () {
		$(this).parent('li').children('.drop-menu').removeClass('drop-active');
	});

	//search
	var searchBtn = document.querySelector('.jsSearch');
	var searchBlock = document.querySelector('.jsSearchBlock');
	searchBtn.onclick = function () {
		searchBlock.classList.toggle('search-active');
	};
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
