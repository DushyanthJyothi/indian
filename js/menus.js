jQuery(document).ready(function($) {

	function navMenu() {

		var headerMainToggle = $('#header-main-toggle');
		var bouncer1 = $('.bouncer1');
		var bouncer2 = $('.bouncer2');
		var bouncer3 = $('.bouncer3');
		

		var menuToggle = $('#menu-toggle');
		var sidebarToggle = $('#sidebar-toggle');
		var searchToggle = $('#search-toggle');
		var socialToggle = $('#social-links-toggle');

		var headerNav = $('#header-toggles');
		var menuNav = $('#menu-toggle-nav');
		var sidebarNav = $('#sidebar-toggle-nav');
		var searchNav = $('#search-toggle-nav');
		var socialNav = $('#social-links-toggle-nav');

		function myToggleClass( $myvar ) {
			if ( $myvar.hasClass( 'active' ) ) {
				$myvar.removeClass( 'active' );
			} else {
				$myvar.addClass('active');
			}
		}
		
		// Display/hide menu
		menuToggle.on('click', function() {
			menuNav.slideToggle();
			myToggleClass($(this));

			sidebarNav.hide();
			searchNav.hide();
			socialNav.hide();

			sidebarToggle.removeClass('active');
			searchToggle.removeClass('active');
			socialToggle.removeClass('active');
			
		});

		// Display/hide sidebar
		sidebarToggle.on('click', function() {
			sidebarNav.slideToggle();
			myToggleClass($(this));

			menuNav.hide();
			searchNav.hide();
			socialNav.hide();

			menuToggle.removeClass('active');
			searchToggle.removeClass('active');
			socialToggle.removeClass('active');
		});

		// Display/hide search
		searchToggle.on('click', function() {
			searchNav.slideToggle();
			myToggleClass($(this));

			menuNav.hide();
			sidebarNav.hide();
			socialNav.hide();
			
			menuToggle.removeClass('active');
			sidebarToggle.removeClass('active');
			socialToggle.removeClass('active');			
		});

		// Display/hide search
		socialToggle.on('click', function() {
			socialNav.slideToggle();
			myToggleClass($(this));

			menuNav.hide();
			sidebarNav.hide();
			searchNav.hide();
			
			menuToggle.removeClass('active');
			sidebarToggle.removeClass('active');
			searchToggle.removeClass('active');			
		});
		
		// Display/hide header-menu
		headerMainToggle.on('click', function(event) {
			headerNav.slideToggle();
			myToggleClass($(this));

			menuNav.hide();
			sidebarNav.hide();
			searchNav.hide();
			socialNav.hide();

			menuToggle.removeClass('active');
			sidebarToggle.removeClass('active');
			searchToggle.removeClass('active');
			socialToggle.removeClass('active');
		});

		/*Stop headerMainToggle animation on load*/
		bouncer1.removeClass("animation");
		bouncer2.removeClass("animation");
		bouncer3.removeClass("animation");

	}
	$(window).on('load', navMenu);

} );


