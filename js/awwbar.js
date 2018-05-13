// Remove any other bar (envato bar, etc.)
this.top.location !== this.location && (this.top.location = this.location);

// scroll top
$(window).on('beforeunload', function(){
	$(window).scrollTop(0);
});

$(document).ready(function () {
	
	// Declare variables -------------------------------------
	var window_h = $( window ).height(),
		html_body = $( 'body' ),
		awwbar_h = $( '#awwbar' ).outerHeight(),
		active_device = $( '.device .active' ),
		div_iframe = $( '.div-iframe' ),
		device_info = $( '.device-info .inside' ),
		iframe = $( 'iframe' );
	
	// init --------------------------------------------------
	html_body.css({
		'overflow' : 'hidden',
		'height' : window_h + 'px'
	});
	
	div_iframe.css({
		'height' : ( window_h - awwbar_h ) + 'px'
	});
	
	iframe.css({
		'width' : '100%',
		'height' : ( window_h - awwbar_h ) + 'px'
	});
	
	if( viewport() === 'xl' ){
		previews_load();
	}
	
	$('.label-custom').each(function(){
		var bg = $(this).data('bg'),
			color = $(this).data('color');
		$(this).css({
			'background-color' : bg,
			'color' : color
		});
	});
	
	// menu item hover
	var timer;
	$( '.menu-list li a' ).on({
		
		mouseenter : function(){
			
			if(viewport() === 'xl'){
				
				var img = $(this).find('img');
				
				if(img.length){
					
					$('.preview, .preview-arrow').css({ 'display' : 'inline-block' });
					
					var overlay_h = $('.overlay').height(),
						menu_w = $('.menu-list .wrapper').outerWidth(),
						img_w = img.attr('width')*1,
						img_h = img.attr('height')*1,
						img_max_w = 590,
						img_max_h = overlay_h - 20 - 2 - 20, // window height - padding - border - margin
						preview = $('.preview'),
						preview_arrow = $('.preview-arrow'),
						preview_wrapper = $('.preview .wrapper'),
						menu_item_offset = $(this).offset(),
						menu_item_h = $( this ).outerHeight(),
						preview_h,
						preview_top,
						arrow_top;
					
					// Resize Image, if oversized
					if(img_w > img_max_w){
						img_h = img_h * img_max_w / img_w;
						img_w = img_max_w;
					}
					if(img_h > img_max_h){
						img_w = img_w * img_max_h / img_h;
						img_h = img_max_h;
					}
					
					preview_h = (img_h + 20 + 2); // image height + padding + border + margin
					
					// Preview top position
					if(img_h === img_max_h){
						
						preview_top = 10;
						
					}else{
						
						preview_top = menu_item_offset.top - (preview_h / 2) + (menu_item_h / 2);
						if(preview_top < 10){
							preview_top = 10;
						}
						if(preview_top > (overlay_h - preview_h - 10)){
							preview_top = (overlay_h - preview_h - 10);
						}
						
					}
					// Arrow top position
					arrow_top = menu_item_offset.top + (menu_item_h / 2) - 10;
					if(arrow_top < 14){
						arrow_top = 14;
					}
					if(arrow_top > overlay_h - 10 - 4 - 20){ // window height - margin bottom - corner height - arrow height
						arrow_top = overlay_h - 10 - 4 - 20;
					}
					
					// Show Preview
					timer = setTimeout(function() {
					
						preview.css({
							'left' : ( menu_w + 10 ) + 'px',
							'top' : preview_top + 'px'
						});
						
						preview_arrow.css({
							'left' : ( menu_w - 10 ) + 'px',
							'top' : arrow_top + 'px'
						});
						
						preview_wrapper.html('<img src="' + img.attr('src') + '" width="' + img_w + '" height="' + img_h + '">');
						
						preview.addClass('open');
						preview_arrow.addClass('open');
						
					}, 300);
				}
				
			}
			
		},
		
		mouseleave : function(){
			
			clearTimeout(timer);
			$('.preview').removeClass('open');
			$('.preview-arrow').removeClass('open');
			
		}
		
	});
	
	// search behavior
	$( 'input[name=search]' ).on( 'keyup', function(){
		
		var q = $( this ).val().toUpperCase(),
			ul = $( '.menu-list ul' ),
			li = ul.find('li')
			scroll_for_more = $( '.scroll-for-more' ),
			keep_w = $( '.menu-list .wrapper' ).outerWidth();
		
		$( '.menu-list li' ).each( function( i ){
			
			if( $( this ).find( 'a' ).html().toUpperCase().indexOf(q) > -1) {
				
				$( this ).css({ 'display' : 'block' });
				
			}else{
				
				$( this ).css({ 'display' : 'none' });
				
			}
			
		});
		
		var new_ul_h = $( '.menu-list ul' ).height(),
			no_results = $( '.no-results' );
		
		// no results found
		if( new_ul_h === 0 ){
			no_results.find( 'strong' ).text( '"' + q + '"' );
			no_results.removeClass( 'd-none' );
			scroll_for_more.addClass( 'visibility-hidden opacity-0' );
		}
		// results found
		else{
			no_results.addClass( 'd-none' );
			
			// call to show/hide scroll for more button
			btn_scroll_for_more();
		}
		
		$( '.menu-list .wrapper' ).outerWidth( keep_w );
		
	});
	
	// scroll behavior
	$( '.menu-list .container' ).on( 'scroll', function(){
		
		// hide preview
		$( '.preview' ).removeClass('open');
		$( '.preview-arrow' ).removeClass('open');
		
		// call to show/hide "scroll for more" button
		btn_scroll_for_more();
		
	});
	
	
	// device on click event ---------------------------------
	$( '.device a' ).on( 'click touchstart', function(e){
		
		e.preventDefault();
		
		var window_h = $( window ).height(),
			awwbar_h = $( '#awwbar' ).outerHeight(),
			w = $( this ).data( 'w' ),
			h = $( this ).data( 'h' ),
			device_text = $( this ).attr( 'title' );
		
		device_info.text( '' ).show();
		active_device.removeClass( 'active' );
		active_device = $( this );
		active_device.addClass( 'active' );
		
		// desktop
		if( active_device.hasClass( 'desktop' ) ){
			
			html_body.css({
				'overflow' : 'hidden',
				'height' : window_h + 'px'
			});
	
			div_iframe.css({
				'height' : ( window_h - awwbar_h ) + 'px'
			});
			
			// set iframe size
			iframe.animate({
				'height' : ( window_h - awwbar_h ) + 'px',
				'marginTop' : 0,
				'marginBottom' : 0,
				'width' : '100%'
			}, 200 );
			
		}
		// no desktop
		else{
			
			if( ( h + 50 ) < ( window_h - awwbar_h ) ){
				html_body.css({
					'overflow' : 'hidden',
					'height' : window_h + 'px'
				});
	
				div_iframe.css({
					'height' : ( window_h - awwbar_h ) + 'px'
				});
			}else{
			
				html_body.css({
					'overflow' : 'visible',
					'height' : ( h + 50 + awwbar_h ) + 'px'
				});
				
				div_iframe.css({
					'height' : ( h + 50 ) + 'px'
				});
			}
			
			// set iframe size
			iframe.animate({
				'height' : h + 'px',
				'marginTop' :  '25px',
				'marginBottom' : '25px',
				'width' : w + 'px'
			}, 200, function(){
				device_info.text( device_text );
			});
		}
		
		
	});
	
	// resize window event
	$( window ).resize(function() {
		
		var new_window_h = $( window ).height(),
			new_awwbar_h = $( '#awwbar' ).outerHeight(),
			iframe_h = $( 'iframe' ).outerHeight(true);
			w = $( '.device .active' ).data( 'w' );
		
		// desktop
		if( active_device.hasClass( 'desktop' ) ){
			html_body.css({
				'height' : new_window_h + 'px'
			});
			
			div_iframe.css({
				'height' : ( new_window_h - new_awwbar_h ) + 'px'
			});
			
			iframe.css({
				'height' : ( new_window_h - new_awwbar_h ) + 'px'
			});
			
		}
		// no desktop
		else{
			
			// body behavior
			if( new_window_h < new_awwbar_h + iframe_h ){
				
				html_body.css({
					'overflow' : 'visible',
					'height' : new_awwbar_h + iframe_h + 'px'
				});
				div_iframe.css({
					'height' : iframe_h + 'px'
				});
				
			}else{
				
				html_body.css({
					'overflow' : 'visible',
					'height' : new_window_h + 'px'
				});
				div_iframe.css({
					'height' : new_window_h - new_awwbar_h + 'px'
				});
			}
			
		}
		
		// load images if not loaded and viewport > md
		var images_loaded = $('.menu-list li img').length,
			images_to_load = $('.menu-list li a:not([data-img=""])').length + $('.menu-list li a:not([data-img_hd=""])').length;
		
		if( images_to_load > 0 && images_loaded === 0 && viewport() === 'xl' ){
			$( '.preview, .preview-arrow' ).css({ 'display' : 'inline-block' });
			previews_load();
		}else{
			$( '.preview, .preview-arrow' ).css({ 'display' : 'none' });
		}
		
	});
	
	// menu toggle
	$(window).on( 'click', function() {
		$( '.menu-list' ).removeClass( 'open' );
		$( '.overlay' ).removeClass('show');
	});
	$( '.toggler, .menu-list' ).on( 'click', function( e ){
		e.stopPropagation();
	});
	$('.custom-select:not(.toggler)').on('click', function(e){
		e.preventDefault();
	});
	$('.menu-list .btn-close').on('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		$( '.menu-list' ).removeClass( 'open' );
		$( '.overlay' ).removeClass('show');
	});
	$( '.toggler' ).on( 'click touchstart', function( e ){
		e.preventDefault();
		
		var wrapper_h = $('.menu-list .wrapper').height(),
			ul_h = $( '.menu-list ul' ).height(),
			border_top = 15,
			border_bottom = 15,
			container_new_h = (wrapper_h - border_top - border_bottom);
		
		if( ul_h > container_new_h ){
			$( '.menu-list .container' ).css({
				'height' : container_new_h + 'px',
				'overflow-y' : 'scroll'
			});
			$( '.scroll-for-more' ).removeClass( 'visibility-hidden opacity-0' );
		}else{
			$( '.menu-list .container' ).css({
				'overflow-y' : 'unset'
			});
		}
		$( '.menu-list' ).toggleClass( 'open' );
		
		$( '.overlay' ).toggleClass('show');
		
	});
	
	// check SVG support
	var supportsSvg = function(){
		var div = document.createElement('div');
		div.innerHTML = '<svg/>';
		return (div.firstChild && div.firstChild.namespaceURI) == 'http://www.w3.org/2000/svg';
	};
	if(!supportsSvg()){
		document.documentElement.className += " no-svg";
		
		// IMG LOGO
		var file = '',
			file_img = $( '.logo img' ).data( 'img' ),
			file_img_hd = $( '.logo img' ).data( 'img_hd' )
			is_hd_screen = $( '.is_hd_screen' ).css( 'visibility' );
		
		if( is_hd_screen === 'visible' && file_img_hd !== '' ){
			file = file_img_hd;
		}else{
			file = file_img;	
		}
		
		$( '.logo' ).css({
			'background-image' : 'url(../img/'+file+')'
		});
		
	};
	
});

// load previews
function previews_load(){
	
	var is_hd_screen, img, img_hd, src;
	
	$( '.menu-list li a' ).each( function(){
		
		img = $( this ).data( 'img' );
		img_hd = $( this ).data( 'img_hd' );
		is_hd_screen = $( '.is_hd_screen' ).css( 'visibility' );
		
		src = ( is_hd_screen === 'visible' && img_hd !== '' ) ? img_hd : '' ;
		src = ( src == '' && img !== '' ) ? img : '';
		
		if( src !== '' ){
			$( this ).append( '<img src="' + src + '">' );
			var new_img = $( this ).find('img');
			new_img.on('load', function(){
				new_img.attr('width', new_img.width()).attr('height', new_img.height());
			});
		}
		
	});
}

// get viewport, return xs, sm, md, lg, xl
function viewport(){
	return $( '.viewport' ).find( 'span:visible' ).html();
}

// Show/hide "Scroll for More" button	
function btn_scroll_for_more(){
	
	var scroll_for_more = $( '.scroll-for-more' ),
		menu_list_offset = $( '.menu-list .wrapper ul' ).offset(),
		ul_h = $( '.menu-list .wrapper ul' ).height(),
		wrapper_h = $( '.menu-list .wrapper' ).height(),
		wrapper_offset = $( '.menu-list .wrapper' ).offset(),
		container_border_bottom = 10,
		offset_hide = 15;
	
	if( ( wrapper_offset.top + wrapper_h ) < ( ul_h + menu_list_offset.top + container_border_bottom - offset_hide ) ){
		scroll_for_more.removeClass( 'visibility-hidden opacity-0' );
	}else{
		scroll_for_more.addClass( 'visibility-hidden opacity-0' );
	}
}