jQuery(document).ready(function($) {
    $('.navbar-wp .dropdown-menu > li > a').css('background','#202F5B');
	
	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});
 
});

 
