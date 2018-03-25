$ = jQuery;

$(document).ready(function($) {

    var $moveable = $('.circle-view');
    $(document).mousemove(function(e){
        $moveable.css({'top': e.pageY,'left': e.pageX});
    });

	//initialize Owl Slider on Page if it isi set
	if($('.pageSlider').length) {
		$('.pageSlider').owlCarousel({
			loop:true,
			autoplay: true,
			autoplayTimeout:5000,
			margin:0,
			nav:false,
			dots: true,
			items: 1
		});
	}

    // mobilemenu Code
    var main_menu = $(".mainMenu > ul").clone();
    main_menu.removeAttr("id class").find("li").removeAttr("id");
    main_menu.appendTo("#mobilemenu");
    $("#mobilemenu").mmenu({
        "offCanvas": {
            "zposition":"front"
        }
    });

	// Initialize dropkick select for forms
	$('select').dropkick({
		mobile: true
	});

	// Initialize class vertical Align
    $('.vAlign').each(function(){
        $(this).css('margin-top', ($(this).height() / -2) + "px");
    });

 });

jQuery(document).bind('gform_page_loaded', function(event, form_id, current_page){
	$('select').dropkick({
		mobile: true
	});
});

jQuery(window).on('load', function(){
	$('.loader-container').fadeOut(600);
});