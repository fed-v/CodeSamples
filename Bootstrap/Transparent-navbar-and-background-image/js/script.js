jQuery(document).ready(function( $ ) {

	//CREATE INSTANCE OF THE DATE OBJECT
	var date = new Date();

	//EXTRACT FOUR DIGIT YEAR AND ADD TO SPAN
	document.getElementById('year').innerHTML = date.getFullYear();

	$(window).scroll(function() {
		if ($(document).scrollTop() > 50) {
			$('.navbar').addClass('shrink');
		}else {
			$('.navbar').removeClass('shrink');
		}
	});


	// HAMBURGER ROLLOVER
	$(".navbar-default .navbar-toggle").on('mouseover', function() {
		//$(".navbar-default .navbar-toggle .icon-bar").css('background', '#840000').animate("slow");
		$(".navbar-default .navbar-toggle .icon-bar").animate({ "backgroundColor": "#840000" }, "slow" );
	});

	$(".navbar-default .navbar-toggle").on('mouseleave', function() {
		$(".navbar-default .navbar-toggle .icon-bar").animate({ "backgroundColor": "#888" }, "slow" );
	});

	// HAMBURGER CLICK
	$(".navbar-default .navbar-nav > li > a").on('click', function(event) {
		//event.preventDefault();
		//alert("Close!");

		/*$(".navbar-collapse").fadeOut('slow');*/

	});

	/*
	$(".navbar-default .navbar-toggle").on('click', function() {
		$(".navbar-collapse").fadeIn('slow');
	});*/

});
