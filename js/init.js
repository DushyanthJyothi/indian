jQuery(document).ready(function($) {

	function windowsFix() {
		/*	Windows phone viewport fix as described here: http://getbootstrap.com/getting-started/ */
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement('style')
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      '@-ms-viewport{width:auto!important}'
		    )
		  )
		  document.querySelector('head').appendChild(msViewportStyle)
		}
	}
	$(window).on('load', windowsFix);
} );