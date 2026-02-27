/**
 * File functions.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {	
	// Menu style
	$('#primary-menu .nav-item:has(.sub-menu)').addClass('dropdown');
	$('#primary-menu .dropdown > .nav-link').addClass('dropdown-toggle');
	$('#primary-menu .dropdown > .nav-link').attr('data-toggle','dropdown');
	$('#primary-menu .dropdown > .nav-link').attr('role','button');
	$('#primary-menu .sub-menu').addClass('dropdown-menu');
	$('#primary-menu .sub-menu li').addClass('dropdown-item');
	$('#primary-menu .sub-menu li a').addClass('text-dark');
	$('#primary-menu .sub-menu li.active.dropdown-item').addClass('bg-secondary');
	
	// Navigation style
	$('.navigation .nav-links').addClass('d-flex justify-content-between my-3');
	$('.navigation .nav-links a').addClass('btn btn-secondary text-white');
	$('.navigation .nav-links .nav-previous a').prepend('<i class="fas fa-angle-double-left"></i> ');
	$('.navigation .nav-links .nav-next a').append(' <i class="fas fa-angle-double-right"></i>');
	$('.navigation.post-navigation').addClass('border-bottom border-secondary pb-3');
	
	// Lightbox
	$('a.lightbox').each(function(){
		$(this).data('caption', $(this).attr('title'));
		$(this).data('fancybox', 'gallery');
	});
	
	$('.wp-block-gallery a').each(function(){
		$(this).addClass('lightbox');
		$(this).data('caption', $(this).parent('figure').find('figcaption').text());
		$(this).data('fancybox', 'gallery');
	});

	Fancybox.bind("a.lightbox", {
		// Your custom options
		l10n: Fancybox.l10n.es_ES,
		plugins: { Compactmode },
		groupAll: true,
		Carousel: {
			formatCaption: (_carouselRef, slide) => {
				return slide.triggerEl?.nextElementSibling || "";
			},
			Thumbs: {
				type: "classic",
				Carousel: {
					center: (ref) => {
						return (
							!ref.isVertical() || ref.getTotalSlideDim() > ref.getViewportDim()
						);
					},
					vertical: false,
					breakpoints: {
						"(min-width: 640px)": {
							vertical: true,
						},
					},
				},
			},
		},
	});

	// Masonry
	$('.masonry figure').addClass('card');
	$('.masonry figure a').each(function(){
		$(this).addClass('lightbox');
		$(this).data('caption', $(this).parent('figure').find('figcaption').text());
	});

	// Masonry + Filter
	function onlyUnique(value, index, self) { 
		return self.indexOf(value) === index;
	}
	var filtro = '';
	$('.filter-masonry figure').each(function(i){
		var clases = $(this).attr('class');
		clases = clases.replace('wp-block-image','');
		clases = clases.replace('size-full','');
		filtro += clases;
		$(this).wrap( '<div class="col-md-4 col-sm-6 grid-item '+clases+'"></div>' );
	});
	filtro = filtro.split(' ');
	filtro = filtro.filter( onlyUnique ); 
	$.each( filtro, function( key, value ) {
		if ( value != '' ) {
			$('.filter-button-group').append('<button type="button" class="btn btn-secondary border-light " data-filter=".'+value+'">'+value+'</button>');
		}
	});		
	
	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item' // use a separate class for itemSelector, other than .col-
		
	});
	$('.filter-button-group button').click( function () {
		var filterValue = $(this).data('filter');
		$grid.isotope({ filter: filterValue });
		$('.filter-button-group button.active').removeClass('active');
		$(this).addClass('active');
	});
	
	$grid.imagesLoaded().progress( function() {
		$grid.isotope({ filter: '*' });
	});
	
	
	// Card style
	$('.filter-masonry figure').addClass('card');
	$('.filter-masonry figure a').each(function(){
		$(this).addClass('lightbox');
		$(this).data('caption', $(this).parent('figure').find('figcaption').text());
	});

	// Email address
	const OMINISSTR1 = $('#ominisEmailAddress').data('str1');
	const OMINISSTR2 = $('#ominisEmailAddress').data('str2');
	$('#ominisEmailAddress').find('a').attr('href',`mailto:${OMINISSTR1}@${OMINISSTR2}`);
			
} )( jQuery );