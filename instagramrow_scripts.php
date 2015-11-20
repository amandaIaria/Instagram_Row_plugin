<?php

function theme_name_scripts() {
	wp_enqueue_style( 'style-sheet', plugins_url('assets/style/css/style.css', __FILE__) );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'script-name', plugins_url('assets/script/build/build.js', __FILE__) , array(), '1.0.0', true );

	wp_enqueue_script( 'slick-script', plugins_url("assets/script/plugins/slick-carousel/slick/slick.js", __FILE__)  , array(), '1.0.0', false );

	wp_enqueue_style( 'slick-style', 'http://cdn.jsdelivr.net/jquery.slick/1.5.6/slick.css' );
	

				
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );