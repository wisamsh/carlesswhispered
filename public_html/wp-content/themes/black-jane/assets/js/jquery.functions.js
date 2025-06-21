/*
 * jQuery Black Jane theme functions file
 * https://www.themeinprogress.com
 *
 * Copyright 2018, ThemeinProgress
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   HEADER CART
   ============================================= */
	
	$('#header-wrapper.header-6 .header-cart').hover(
		
		function () {
			$(this).children('a.cart-contents').addClass('active');
		}, 
		function () {
			$(this).children('a.cart-contents').removeClass('active');
		}
			
	);

/* ===============================================
   HEADER SEARCH 
   =============================================== */
   
	$('#header-wrapper.header-6 .header-search i').click(function(){
		
		if( $('#header-wrapper.header-6 .header-search .search-form').css('display') === 'none') {
		
			$('#header-wrapper.header-6 .header-search .search-form').fadeIn(100);
		
		} else {	
		
			$('#header-wrapper.header-6 .header-search .search-form').fadeOut(100);
		
		}

    });

/* ===============================================
   SLICK
   ============================================= */

	$('.slick-jane-slideshow').each(function() {

		var slick_id = $(this).attr('id');
		
		var slick_center = false;
		
		if ( $(this).attr('data-center') === "true" ) {
			slick_center = true ;
		}
		
		var slick_columns = parseInt($(this).attr('data-columns'));
		var slick_columns_992 = 2 ;

		if ( $(this).attr('data-columns').length === 0 ) {
			slick_columns = 1 ;
		}

		if ( slick_columns <= 1 ) {
			slick_columns_992 = 1 ;
		}

		$('#' + slick_id + ' .jane-slick-wrapper' ).slick({

		  centerMode: slick_center,

		  dots: false,
		  speed: 300,
		  adaptiveHeight: true,

		  prevArrow: '<div class="prev-arrow"><i class="fa fa-angle-left"></i></div>',
		  nextArrow: '<div class="next-arrow"><i class="fa fa-angle-right"></i></div>',

		  slidesToShow: slick_columns,
		  slidesToScroll: slick_columns,
		
		  responsive: [
			{
			  breakpoint: 992,
			  settings: {
				centerMode: false,
				slidesToShow: slick_columns_992,
				slidesToScroll: slick_columns_992,
			  }
			},
			{
			  breakpoint: 768,
			  settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},

		  ]
		  
		});

		function blackjane_slick_arrows() {
			
			if ( $('#' + slick_id ).children('div.slick-arrow').length === 0 ) {
			
				$('#' + slick_id ).prev('header.title').removeClass('slick_arrows');
			
			} else {
			
				$('#' + slick_id ).prev('header.title').addClass('slick_arrows');
			
			}
		
		}
		
		$( window ).load(blackjane_slick_arrows);
		$( window ).resize(blackjane_slick_arrows);

	}); 

});          