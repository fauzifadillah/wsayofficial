<?php
/*
@package kidzoo-lite
  =================
  THEME SUPPORT OPTIONS
  =================
*/
if ( ! function_exists( 'kidzoo_setup' ) ) :
    function kidzoo_setup() {

        /*
    	 * Make theme available for translation.
    	 * Translations can be filed in the /languages/ directory.
    	 * If you're building a theme based on kidzoo, use a find and replace
    	 * to change 'kidzoo-lite' to the name of your theme in all the template files.
    	*/
	    load_theme_textdomain( 'kidzoo-lite', get_template_directory() . '/languages' );

        /* Activate Post formats */
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

        /* Activate Nav Menu options */
        register_nav_menu( 'primary', esc_html__( 'Header Navigation Menu', 'kidzoo-lite' ) );
        register_nav_menu( 'topnav', esc_html__( 'Top bar Navigation Menu', 'kidzoo-lite' ) );
        register_nav_menu( 'offcanvas', esc_html__( 'Off Canvas Menu', 'kidzoo-lite' ) );

        /* Activate Custom Header */

    	add_theme_support( 'custom-header', apply_filters( 'kidzoo_custom_header_args', array(
    		'default-image'          => '',
    		'default-text-color'     => '936fa4',
    		'width'                  => 1000,
    		'height'                 => 250,
    		'flex-height'            => true,
    		'wp-head-callback'       => 'kidzoo_header_style',
    	) ) );

        /* Activate Custom Background */
        add_theme_support( 'custom-background' );

        /* Activate Custom Logo */
        add_theme_support( 'custom-logo' );

        /* Activate Post thumbnails */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'kidzoo-category-thumb', 300, 9999 );

        /*
    	 * Let WordPress manage the document title.
    	 * By adding theme support, we declare that this theme does not use a
    	 * hard-coded <title> tag in the document head, and expect WordPress to
    	 * provide it for us.
    	*/
        add_theme_support( 'title-tag' );

        function kidzoo_document_title_separator( $sep ) {

            $sep = "|";

            return $sep;
        }
        add_filter( 'document_title_separator', 'kidzoo_document_title_separator' );

        /* Add default posts and comments RSS feed links to head.*/
        add_theme_support( 'automatic-feed-links' );

        /* Activate Html5 features */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        /*enables Selective Refresh for Widgets being managed within the Customizer */
        add_theme_support( 'customize-selective-refresh-widgets' );

        /* Activate woocommerce */
        add_theme_support( 'woocommerce' );

    }
endif;
add_action( 'after_setup_theme', 'kidzoo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kidzoo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kidzoo_content_width', 640 );
}
add_action( 'after_setup_theme', 'kidzoo_content_width', 0 );

/**
 * Registers an editor stylesheet for the theme.
 */
function kidzoo_theme_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Andika' );
    add_editor_style( $font_url );
    add_editor_style( 'css/kidzoo-custom-editor-style.css' );
}
add_action( 'admin_init', 'kidzoo_theme_add_editor_styles' );


if ( ! function_exists( 'kidzoo_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	*/
	function kidzoo_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.header-container .nav-container .site-branding .site-title a,
			.header-container .nav-container .site-branding .site-description{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
/*
  ============================
  SIDEBAR FUNCTIONS
  ============================
*/
function kidzoo_sidebar_init(){

  register_sidebar(
    array(
      'name' => esc_html__( 'Kidzoo Sidebar', 'kidzoo-lite' ),
      'id' => 'sidebar-1',
      'description' => esc_html__('Dynamic Kidzoo Sidebar', 'kidzoo-lite'  ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Shop Sidebar', 'kidzoo-lite' ),
      'id' => 'sidebar-2',
      'description' => esc_html__('Dynamic Shop Sidebar', 'kidzoo-lite'  ),
      'before_widget' => '<section id="%1$s" class="kidzoo-shop-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Top Bar', 'kidzoo-lite' ),
      'id' => 'top-bar',
      'description' => esc_html__('Dynamic Top Bar', 'kidzoo-lite'  ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget kidzoo-topbar-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Top Offer Banner', 'kidzoo-lite' ),
      'id' => 'offer-banner',
      'description' => esc_html__( 'Dynamic Offer Banner', 'kidzoo-lite'  ),
      'before_widget' => '<section id="%1$s" class="kidzoo-topbar-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer Home', 'kidzoo-lite' ),
      'id' => 'footer-home',
      'description' => esc_html__('Footer Home', 'kidzoo-lite' ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 1', 'kidzoo-lite' ),
      'id' => 'footer-sidebar-1',
      'description' => esc_html__('Footer Sidebar 1', 'kidzoo-lite' ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 2', 'kidzoo-lite' ),
      'id' => 'footer-sidebar-2',
      'description' => esc_html__('Footer Sidebar 2', 'kidzoo-lite' ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 3', 'kidzoo-lite' ),
      'id' => 'footer-sidebar-3',
      'description' => esc_html__('Footer Sidebar 3', 'kidzoo-lite' ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );
  register_sidebar(
    array(
      'name' => esc_html__( 'Footer 4', 'kidzoo-lite' ),
      'id' => 'footer-sidebar-4',
      'description' => esc_html__('Footer Sidebar 4', 'kidzoo-lite' ),
      'before_widget' => '<section id="%1$s" class="kidzoo-widget %2$s">',
      'after_widget' => "</section>",
      'before_title' => '<h2 class="kidzoo-widget-title">',
      'after_title' => "</h2>"
    )
  );

}
add_action( 'widgets_init', 'kidzoo_sidebar_init' );

/*
  ============================
  WOOCOMMERCE FUNCTIONS
  ============================
*/
/**
 * Place a cart icon with number of items and total cost in the menu bar.
 * Add Cart icon and count to header if WC is active
 */
function kidzoo_wc_cart_count() {

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $count = WC()->cart->cart_contents_count;
        ?>
        <a class="cart-content" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_attr_e('View your shopping cart', 'kidzoo-lite'); ?>">
            <span class="shop-cart-icon"><i class="fa fa-shopping-basket"></i></span>
            <?php if ( $count > 0 ) echo '<span class="circle">' . $count . '</span>'; ?>
        </a>
        <?php
    }

}
add_action( 'cart_mini', 'kidzoo_wc_cart_count' );
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function kidzoo_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>
    <a class="cart-content" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_attr_e('View your shopping cart', 'kidzoo-lite'); ?>">
        <span class="shop-cart-icon"><i class="fa fa-shopping-basket"></i></span>
        <?php if ( $count > 0 ) echo '<span class="circle">' . $count . '</span>'; ?></a>
    <?php

    $fragments['a.cart-content'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'kidzoo_header_add_to_cart_fragment' );

function kidzoo_header_icon_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'kidzoo-lite'); ?>">
        <span class="shop-cart-icon"><i class="fa fa-shopping-cart"></i></span>
        <span class="shop-cart-content">
            <?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'kidzoo-lite' ), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
        </span>
        <i class="fa fa-chevron-right"></i>
    </a>
	<?php

	$fragments['a.cart-customlocation'] = ob_get_clean();

	return $fragments;

}
add_filter('add_to_cart_fragments', 'kidzoo_header_icon_add_to_cart_fragment');

// Change number or products per row to 3
if (!function_exists('kidzoo_loop_columns')) {
	function kidzoo_loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'kidzoo_loop_columns', 1, 10 );


// ---------------------------------------------
// Remove Cross Sells From Default Position
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// Add them back UNDER the Cart Table
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

// Display Cross Sells on 3 columns instead of default 4
add_filter( 'woocommerce_cross_sells_columns', 'kidzoo_change_cross_sells_columns' );
function kidzoo_change_cross_sells_columns( $columns ) {
    return 4;
}
add_filter( 'woocommerce_cross_sells_total', 'kidzoo_change_cross_sells_product_no' );
function kidzoo_change_cross_sells_product_no( $columns ) {
    return 4;
}

/*
  ============================
  BLOG LOOP CUSTOM FUNCTIONS
  ============================
*/
// Add sticky class to sticky post
function kidzoo_post_classes( $classes ){
    if ( is_sticky() ) {
        $classes[] = 'sticky';
    }
    return $classes;
}
add_filter('post_class', 'kidzoo_post_classes');

// Filter the except length to 20 characters.
function kidzoo_custom_excerpt_length( $length ) {
    return 45;
}
add_filter( 'excerpt_length', 'kidzoo_custom_excerpt_length', 999 );

function kidzoo_posted_meta(){

    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');

    $categories = get_the_category();
    $seperator = ", ";
    $output = '';
    $i = 1;

    if( !empty($categories) ):
        foreach ($categories as $category) :
            if( $i > 1 ): $output .= $seperator; endif;
            $output .= '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'">' . esc_html( $category->name ) . '</a>';
            $i++;
        endforeach;
    endif;

    return '<span class="posted-by">' . esc_html__('Posted by ', 'kidzoo-lite') .  get_the_author_posts_link() .'</span><span class="meta-seperator">|</span> <span class="posted-on"><a href="'. get_day_link( $archive_year, $archive_month, $archive_day) .'">'. get_the_date() .'</a></span> <span class="meta-seperator">|</span> <span class="posted-in">' .$output. '</span>';
}

function kidzoo_posted_footer(){
  $comments_num = get_comments_number();
  if( comments_open() ){
    if( $comments_num == 0 ){
      $comments = esc_html__('No Comments', 'kidzoo-lite' );
    }
    elseif( $comments_num > 1 ){
      $comments = $comments_num . esc_html__(' Comments', 'kidzoo-lite' );
    }
    else{
      $comments = esc_html__('1 Comment', 'kidzoo-lite' );
    }
    $comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments . ' <span class="kidzoo-icon fa fa-comments"></span></a>';
  }else{
    $comments = esc_html__('Comments are closed', 'kidzoo-lite' );
  }

  return '<div class="post-footer-container">
    <div class="row">
      <div class="col-sm-6">
        '. get_the_tag_list('<div class="tags-list"><span class="kidzoo-icon fa fa-tag"></span>', ' ', '</div>') .'
      </div>
      <div class="col-sm-6 text-right"><div class="comments-counter-list">
        '. $comments .'
      </div></div>
    </div>
  </div>';
}

function kidzoo_single_posted_meta(){

    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');

    $categories = get_the_category();
    $seperator = ", ";
    $output = '';
    $i = 1;

    if( !empty($categories) ):
        foreach ($categories as $category) :
            if( $i > 1 ): $output .= $seperator; endif;
            $output .= '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'" alt="'. esc_attr( 'View all post in%s', $category->name ) .'">' . esc_html( $category->name ) . '</a>';
            $i++;
        endforeach;
    endif;

    $comments_num = get_comments_number();
    if( comments_open() ){
      if( $comments_num == 0 ){
        $comments = esc_html__('No Comments', 'kidzoo-lite' );
      }
      elseif( $comments_num > 1 ){
        $comments = $comments_num . esc_html__(' Comments', 'kidzoo-lite' );
      }
      else{
        $comments = esc_html__('1 Comment', 'kidzoo-lite' );
      }
      $comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments . '</a>';
    }else{
      $comments = esc_html__('Comments are closed', 'kidzoo-lite' );
    }

    return '<span class="posted-on"><a href="'. get_day_link( $archive_year, $archive_month, $archive_day) .'">'. get_the_date() .'</a></span><span class="meta-seperator">/</span><span class="posted-by">' . esc_html__('By  ', 'kidzoo-lite') .  get_the_author_posts_link() .'</span> <span class="meta-seperator">/</span> <span class="comments-counter-list">'. $comments .'</span> <span class="meta-seperator">/</span> <span class="posted-in">' .$output. '</span> <span class="meta-seperator">/</span> '. get_the_tag_list('<span class="tags-list">', ', ', '</span>');

}

/*
	-------------------
	NUMERIC PAGINATION
	-------------------
*/
function kidzoo_pagination_bar() {
    if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="kidzoo-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";
}

//Post formats
/*
	-------------------
	GALLERY POST FORMAT
	-------------------
*/
function kidzoo_get_attachment( $num = 1 ){
  $output = '';
	if( has_post_thumbnail() && $num == 1 ):
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array (
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		));
		if($attachments && $num == 1):
			foreach ($attachments as $attachment) :
				$output = wp_get_attachment_url($attachment->ID);
			endforeach;
		elseif ($attachments && $num > 1) :
			$output = $attachments;
		endif;

		wp_reset_postdata();

	endif;

	return $output;
}

function kidzoo_get_bs_slides( $attachments ){

  $output = array();
  $count = count($attachments)-1;

  for( $i=0; $i <= $count; $i++ ):

    $active = ($i == 0 ? ' active' : '');

    $n = ( $i == $count ? 0 : $i+1 );
    $nxtImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
    $p = ( $i == 0 ? $count : $i-1 );
    $prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
    $output[$i] = array(
      'class' => $active,
      'url'   => wp_get_attachment_url( $attachments[$i]->ID ),
      'next_img' => $nxtImg,
      'prev_img' => $prevImg,
      'caption' => $attachments[$i]->post_excerpt
    );

  endfor;

  return $output;
}

/*
	-------------------
	AUDIO AND VIDEO POST FORMAT
	-------------------
*/
function kidzoo_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters('the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	if( in_array( 'audio', $type) ):
		$output = str_replace('?visual=true','?visual=false',$embed[0]);
	else:
        if(isset($embed[0])){
				$output = $embed[0];
		} else {
			$output = '';
		}
	endif;
	return $output;
}


/* CHAT POST FORMAT */
function kidzoo_format_chat_content( $content ) {
	global $_post_format_chat_ids;

	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters( 'kidzoo_post_format_chat_separator', ':' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = kidzoo_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'kidzoo_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'kidzoo_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'kidzoo_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'kidzoo_post_format_chat_content', $chat_output );
}
add_filter( 'the_content', 'kidzoo_format_chat_content' );

add_filter( 'kidzoo_post_format_chat_text', 'wpautop' );

function kidzoo_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}


/*
	-------------------
	LINK POST FORMAT
	-------------------
*/
function kidzoo_grab_url(){
  if( ! preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
    return false;
  }
  return esc_url_raw( $links[1] );
}

/*
	-------------------
	Grab current uri
	-------------------
*/
function kidzoo_grab_current_uri(){
  $http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
  $referer =  $http . $_SERVER["HTTP_HOST"];
  $archive_url = $referer . $_SERVER["REQUEST_URI"];

  return $archive_url;
}
/*
  ============================
  SINGLE POST CUSTOM FUNCTIONS
  ============================
*/
function kidzoo_post_navigation(){

  $nav = '<div class="post-navigation"><div class="row">';

  $prev = get_previous_post_link( '<div class="post-link-nav"><span class="previous">%link</span></div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';

  $next = get_next_post_link( '<div class="post-link-nav"><span class="next">%link</span></div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';

  $nav .= '</div></div>';

  return $nav;
}

function kidzoo_get_post_navigation(){
  if( get_comment_pages_count() > 1 && get_option('page_comments') ):

    require get_template_directory() . '/inc/kidzoo-comment-nav.php';

  endif;
}

// Add our function to the post content filter
function kidzoo_author_info_box() {

    global $post;

    // Detect if it is a single post with a post author
    if ( is_single() && isset( $post->post_author ) ) {

        $author_details = '';
        $user_content = '';

        // Get author's display name
        $display_name = get_the_author_meta( 'display_name', $post->post_author );

        // If display name is not available then use nickname as display name
        if ( empty( $display_name ) )
        $display_name = get_the_author_meta( 'nickname', $post->post_author );

        // Get author's biographical information or description
        $user_description = get_the_author_meta( 'user_description', $post->post_author );

        // Get author's website URL
        $user_website = get_the_author_meta('url', $post->post_author);

        // Get link to the author archive page
        $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

        if ( ! empty( $user_description ) ) {
            // Author avatar and bio
            $author_details = '<div class="kidzoo-author-image">' . get_avatar( get_the_author_meta('user_email') , 90 ) . '</div>';
            $author_details .= '<div class="kidzoo-author-description">' . nl2br( $user_description ). '</div>';
            $author_details .= '<div class="kidzoo-author-name"><a href="'. $user_posts .'">' . $display_name . '</a>';

                // Check if author has a website in their profile
                if ( ! empty( $user_website ) ) {

                // Display author website link
                $author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">' . esc_html__('Website ', 'kidzoo-lite') . '</a></div>';

                } else {
                // if there is no author website then just close the paragraph
                $author_details .= '</div>';
                }
            // Pass all this info to post content
            $user_content = '<div class="kidzoo-author-block text-center"><footer class="author_bio_section" >' . $author_details . '</footer></div>';
        }
    }
    return $user_content;
}
