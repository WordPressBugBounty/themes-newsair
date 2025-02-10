/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	var myCustomizer = window.parent.window.wp.customize;

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text hide and show and text color.
	wp.customize( 'header_textcolor', function( value ) {
		if(value() == 'blank'){
			myCustomizer.control('newsair_title_font_size').container.hide();
		}else{
			myCustomizer.control('newsair_title_font_size').container.show();
		}
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.site-branding-text ' ).addClass('d-none');
				myCustomizer.control('newsair_title_font_size').container.hide();
			} else {
				$('.site-title').css('position', 'unset');
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding-text ' ).removeClass('d-none');
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
				myCustomizer.control('newsair_title_font_size').container.show();
			}
		} );
	} );
	function customizePreviewStyle(settingId, selector, property, unit = '') {
		wp.customize(settingId, function(value) {
			value.bind(function(newVal) {
				if (property.startsWith('--')) { 
					document.documentElement.style.setProperty(property, newVal + unit);
				} else { 
					let cssProperties = {};
					cssProperties[property] = newVal + unit;
					$(selector).css(cssProperties);
				}
			});
		});
	}
	
	customizePreviewStyle('body_background_color', ':root', '--wrap-color', '');
	customizePreviewStyle('site_title_fontfamily', ':root', '--title-font', '');
	customizePreviewStyle('site_title_fontweight', ':root', '--title-weight', '');
	customizePreviewStyle('newsair_menu_fontfamily', ':root', '--menus-font', '');

	customizePreviewStyle('newsair_title_fontsize_desktop', '.site-title a', 'font-size','px');
	customizePreviewStyle('newsair_title_fontsize_tablet', '.site-title a', 'font-size','px');
	customizePreviewStyle('newsair_title_fontsize_mobile', '.site-title a', 'font-size','px');

	customizePreviewStyle('desktop_header_image_height', '.bs-default .bs-header-main .inner, .bs-headthree .bs-header-main .inner', 'height','px');
	customizePreviewStyle('tablet_header_image_height', '.bs-default .bs-header-main .inner, .bs-headthree .bs-header-main .inner', 'height','px');
	customizePreviewStyle('mobile_header_image_height', '.bs-default .bs-header-main .inner, .bs-headthree .bs-header-main .inner', 'height','px');

	customizePreviewStyle('top_bar_header_background_color', '.bs-head-detail, .bs-headtwo .bs-head-detail, .mg-latest-news .bn_title', 'background','');
	customizePreviewStyle('menu_area_bg_color', '.bs-default .bs-menu-full', 'background','');
	customizePreviewStyle('newsair_header_overlay_color', '.bs-default .bs-header-main .inner', 'background-color','');
	customizePreviewStyle('newsair_footer_copy_bg', 'footer .bs-footer-copyright .copyright-overlay', 'background','');
	customizePreviewStyle('newsair_footer_copy_text', 'footer .bs-footer-copyright p, footer .bs-footer-copyright a', 'color','');
	
	customizePreviewStyle('desktop_side_logo_width', '.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img, .bs-headtwo .navbar-header img', 'width','px');
	customizePreviewStyle('tablet_side_logo_width', '.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img, .bs-headtwo .navbar-header img', 'width','px');
	customizePreviewStyle('mobile_side_logo_width', '.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img, .bs-headtwo .navbar-header img', 'width','px');

	// Header Banner, Site Title and Site Tagline Center Alignment.
	wp.customize( 'newsair_center_logo_title', function( value ) {
		value.bind( function( newVal ) {
			var firstChild = $('.bs-header-main .row.align-items-center').children(':nth-child(1)');
			var secondChild = $('.bs-header-main .row.align-items-center').children(':nth-child(2)');	
			if(newVal == true){
				if(firstChild.hasClass('col-lg-4 text-start')){
					firstChild.removeClass('col-lg-4 text-start');
				} 
				firstChild.addClass('col-lg-12 text-center');

				if(secondChild.hasClass('col-lg-8')){
					secondChild.removeClass('col-lg-8');
				} 
				secondChild.addClass('col-lg-12');
				
				
				secondChild.children(':nth-child(1)').addClass('d-flex justify-content-center mt-3');
			}else{
				if(firstChild.hasClass('col-lg-12 text-center')){
					firstChild.removeClass('col-lg-12 text-center');
				} 
				firstChild.addClass('col-lg-4 text-start');

				if(secondChild.hasClass('col-lg-12')){
					secondChild.removeClass('col-lg-12');
				} 
				secondChild.addClass('col-lg-8');
				
				if(secondChild.children(':nth-child(1)').hasClass('d-flex justify-content-center mt-3')){
					secondChild.children(':nth-child(1)').removeClass('d-flex justify-content-center mt-3');
				} 
			}
			console.log(newVal);
		} );
	} );
	// Featured Slider Position
	wp.customize( 'main_slider_position', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('.mainfeatured .row.gx-1').addClass('flex-row-reverse');
			}else{
				$('.mainfeatured .row.gx-1').removeClass('flex-row-reverse');
			}
		});
	});

	// Footer Background Image
	wp.customize( 'newsair_footer_widget_background', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer.footer').css('background-image', 'url(' + newVal + ')');
			}else{
				$('footer.footer').removeAttr('style');
			}
		});
	});

	// Footer Background overlay color.
	wp.customize( 'newsair_footer_overlay_color', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer .overlay').css('background', newVal);
			}else{
				$('footer .overlay').css('background', '');
			}
		} );
	} );
	// Footer all Text color.
	wp.customize( 'newsair_footer_text_color', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer .bs-widget p, .site-title-footer a, .site-title-footer a:hover, .site-description-footer, .site-description-footer:hover, footer .bs-widget h6, footer .mg_contact_widget .bs-widget h6').css('color', newVal);
			}else{
				$('footer .bs-widget p, .site-title-footer a, .site-title-footer a:hover, .site-description-footer, .site-description-footer:hover, footer .bs-widget h6, footer .mg_contact_widget .bs-widget h6').css('color', '');
			}
		} );
	} );
	// Footer Widget Area Column.
	wp.customize( 'newsair_footer_column_layout', function( value ) {
		var colum = 12 / value();
		var wclass = $('.animated.bs-widget');
		if(wclass.hasClass('col-md-12')){
			wclass.removeClass('col-md-12');
		}else if(wclass.hasClass('col-md-6')){
			wclass.removeClass('col-md-6');
		}else if(wclass.hasClass('col-md-4')){
			wclass.removeClass('col-md-4');
		}else if(wclass.hasClass('col-md-3')){
			wclass.removeClass('col-md-3');
		}
		wclass.addClass(`col-md-${colum}`);

		value.bind( function( newVal ) {
			colum = 12 / newVal;
			wclass = $('.animated.bs-widget');
			if(wclass.hasClass('col-md-12')){
				wclass.removeClass('col-md-12');
			}else if(wclass.hasClass('col-md-6')){
				wclass.removeClass('col-md-6');
			}else if(wclass.hasClass('col-md-4')){
				wclass.removeClass('col-md-4');
			}else if(wclass.hasClass('col-md-3')){
				wclass.removeClass('col-md-3');
			}
			wclass.addClass(`col-md-${colum}`);
			console.log(wclass);
		} );
	} );
	wp.customize( 'scrollup_layout', function( value ) {
		value.bind( function( newVal ) {
			$('.bs_upscr i').removeClass();
			$('.bs_upscr i').addClass(newVal);
		});
	});
} )( jQuery );
