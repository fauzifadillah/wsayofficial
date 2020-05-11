<?php
/*
@package kidzoo-lite
  =================
  ADMIN ENQUEUE FUNCTIONS
  =================

  =================
  FRONT-END ENQUEUE FUNCTIONS
  =================
*/
function kidzoo_load_scripts(){

    wp_enqueue_style( 'kidzoo-style', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() , '3.3.7', 'all'  );
    wp_enqueue_style( 'kidzoo-lite', get_template_directory_uri() . '/css/kidzoo.css', array() , '1.0.0', 'all'  );
    wp_enqueue_style( 'kidzoo-errorpage', get_template_directory_uri() . '/css/error.css', array() , '1.0.0', 'all'  );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array() , '4.7.0', 'all'  );
    wp_enqueue_style( 'andika', kidzoo_fonts_url(), array(), null );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') , '3.3.7', 'all'  );
    wp_enqueue_script( 'kidzoo-lite', get_template_directory_uri() . '/js/kidzoo.js', array('jquery') , '1.0.0', 'all'  );

}
add_action( 'wp_enqueue_scripts', 'kidzoo_load_scripts' );

/* Enqueue comment reply script */
function kidzoo_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'kidzoo_enqueue_comments_reply' );

/*
	* Add google font
*/
function kidzoo_fonts_url() {
	$fonts_url = '';
	$andika = _x( 'on', 'Andika font: on or off', 'kidzoo-lite' );
	$amatic = _x( 'on', 'Amatic SC: on or off', 'kidzoo-lite' );

	if ( 'off' !== $andika || 'off' !== $amatic ) {
		$font_families = array();

		if ( 'off' !== $andika ) {
		$font_families[] = 'Andika';
		}

		if ( 'off' !== $amatic ) {
		$font_families[] = 'Amatic SC:700';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
