<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("http://wsayofficial.com/wp-content/uploads/2020/04/Screen-Shot-2020-04-18-at-23.22.12.png");
  height: 800px;
  max-width: 3398px;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
</style>
<body id="<?php echo esc_attr( get_stylesheet() ); ?>" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'ct_modern_store_body_top' ); ?>
	<a class="skip-content" href="#main-container"><?php esc_html_e( 'Press "Enter" to skip to content', 'modern-store' ); ?></a>
	<div id="overflow-container" class="overflow-container">
		<div id="max-width" class="max-width">
			<?php do_action( 'ct_modern_store_before_header' ); ?>
			<?php
			// Elementor `header` location
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :
			?>
			<header class="site-header" id="site-header" role="banner">
				<div class="header-top">
					<div id="menu-secondary-container" class="menu-secondary-container">
						<?php get_template_part( 'menu', 'secondary' ); ?>
					</div>
					<div id="social-icons-container" class="social-icons-container">
						<?php ct_modern_store_social_icons_output(); ?>
					</div>
				</div>
				<?php 
				
				if (is_front_page() == true ) {
					echo '<div class="hero-image">
					<div class="hero-text"></div></div>';
				} else {
					// echo '<div class="header-middle">';
				}		

				 ?>
				<!-- <div class="hero-image">
					<div class="hero-text"> -->
						<!-- <h1>I am John Doe</h1>
						<p>And I'm a Photographer</p>
						<button>Hire me</button> -->
					<!-- </div> -->
				<!-- </div> -->
				<div class="header-middle">
					<div id="title-container" class="title-container">
						<?php get_template_part( 'logo' ) ?>
						<?php if ( get_bloginfo( 'description' ) ) {
							echo '<p class="tagline">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
						} ?>
					</div>
					<?php if ( ct_modern_store_is_wc_active() ) : ?>
						<?php get_template_part( 'content/search-bar' ); ?>
						<?php if ( get_theme_mod( 'user_icon_display' ) != 'no' ) : ?>
							<div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" title="<?php esc_attr_e( 'Visit your account', 'modern-store' ); ?>">
										<?php 
										if ( get_theme_mod('user_icon_gravatar') == 'yes' ) {
											echo get_avatar( get_current_user_id(), 34, '', __('Member avatar', 'modern-store'));
										} else {
											echo '<i class="fas fa-user"></i>';
										}?>
									</a>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'shopping_cart_display' ) != 'no' ) : ?>
							<div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
									<a class="shopping-cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Visit your shopping cart', 'modern-store' ); ?>">
										<i class="fa fa-shopping-cart"></i>
										<?php if ( get_theme_mod( 'shopping_cart_display_count' ) != 'no' ) : ?>
											<span class="cart-count">
												<?php echo absint(WC()->cart->get_cart_contents_count()); ?>
											</span>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="header-bottom">
					<div id="mobile-menu-container" class="mobile-menu-container">
						<div id="mobile-menu-container-inner">
							<div id="close-mobile-menu" class="close-mobile-menu">
								<button>
									<?php echo ct_modern_store_svg_output( 'close-menu' ); ?>
								</button>
							</div>
							<div id="menu-primary-container" class="menu-primary-container">
								<?php get_template_part( 'menu', 'primary' ); ?>
							</div>
						</div>
					</div>
					<div id="toggle-container" class="toggle-container">
						<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
							<span class="screen-reader-text"><?php esc_html_e( 'open menu', 'modern-store' ); ?></span>
							<?php echo ct_modern_store_svg_output( 'toggle-navigation' ); ?>
						</button>
					</div>
				</div>
			</header>
			<?php endif; ?>
			<?php get_template_part( 'content/header-promo' ); ?>
			<?php do_action( 'ct_modern_store_after_header' ); ?>
			<section id="main-container" class="main-container" role="main">
				<?php do_action( 'ct_modern_store_main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}






// backup 21 04

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("http://wsayofficial.com/wp-content/uploads/2020/04/Screen-Shot-2020-04-18-at-23.22.12.png");
  height: 800px;
  max-width: 3398px;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.topnav {
  overflow: hidden;
  background-color: #FDD306;
  display: block;
}
</style>
<body id="<?php echo esc_attr( get_stylesheet() ); ?>" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'ct_modern_store_body_top' ); ?>
	<a class="skip-content" href="#main-container"><?php esc_html_e( 'Press "Enter" to skip to content', 'modern-store' ); ?></a>
	<div id="overflow-container" class="overflow-container">
		<div id="max-width" class="max-width">
			<?php do_action( 'ct_modern_store_before_header' ); ?>
			<?php
			// Elementor `header` location
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :
			?>
			<header class="site-header" id="site-header" role="banner">
				<div class="header-top">
					<div id="menu-secondary-container" class="menu-secondary-container">
						<?php get_template_part( 'menu', 'secondary' ); ?>
					</div>
					<div id="social-icons-container" class="social-icons-container">
						<?php ct_modern_store_social_icons_output(); ?>
					</div>
				</div>

				
				<?php 
				
				if (is_front_page() == true ) {
					echo '
					<div class="topnav">
					&nbsp;
					</div>
					<div class="hero-image">
					<div class="hero-text"></div></div>';
				} else {
					// echo '<div class="header-middle">';
					echo '<div class="header-middle">
					<div id="title-container" class="title-container">
						<div id="site-title" class="site-title"><a href="https://wsayofficial.com">WSAY</a></div>											</div>
																								
																			
															<div id="search-form-container" class="search-form-container">
	<form role="search" method="get" class="search-form" action="https://wsayofficial.com/">
		<label class="screen-reader-text">Search</label>
					<span class="category-select">
				<i class="fas fa-caret-down"></i>	
				<select id="store-search">
					<option>
						All					</option>
											<option value="uncategorized">Uncategorized</option>
									</select>
			</span>
				<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" tabindex="-1">
					<div class="submit-button">
				<input type="submit" class="search-submit" value="Search">
			</div>
				<input type="hidden" value="product" name="post_type" id="post_type">
		<input type="hidden" value="" name="product_cat" id="product_cat_search">
	</form>
</div><div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="https://wsayofficial.com/?page_id=10" title="Visit your account">
										<i class="fas fa-user"></i>									</a>
								</div>
							</div><div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
											<a class="shopping-cart-icon" href="https://wsayofficial.com/?page_id=8" title="Visit your shopping cart">
			<i class="fa fa-shopping-cart"></i>
							<span class="cart-count">
					28				</span>
					</a>
		
								</div>
							</div></div>';
				}		

				 ?>
				<!-- <div class="hero-image">
					<div class="hero-text"> -->
						<!-- <h1>I am John Doe</h1>
						<p>And I'm a Photographer</p>
						<button>Hire me</button> -->
					<!-- </div> -->
				<!-- </div> -->
				<div class="header-middle">
					<div id="title-container" class="title-container">
					<i class="fas fa-bars fa-lg"></i>
					</div>
					<?php if ( ct_modern_store_is_wc_active() ) : ?>
						<?php get_template_part( 'content/search-bar' ); ?>
						<?php if ( get_theme_mod( 'user_icon_display' ) != 'no' ) : ?>
							<div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" title="<?php esc_attr_e( 'Visit your account', 'modern-store' ); ?>">
										<?php 
										if ( get_theme_mod('user_icon_gravatar') == 'yes' ) {
											echo get_avatar( get_current_user_id(), 34, '', __('Member avatar', 'modern-store'));
										} else {
											echo '<i class="fas fa-user"></i>';
										}?>
									</a>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'shopping_cart_display' ) != 'no' ) : ?>
							<div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
									<a class="shopping-cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Visit your shopping cart', 'modern-store' ); ?>">
										<i class="fa fa-shopping-cart"></i>
										<?php if ( get_theme_mod( 'shopping_cart_display_count' ) != 'no' ) : ?>
											<span class="cart-count">
												<?php echo absint(WC()->cart->get_cart_contents_count()); ?>
											</span>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="header-bottom">
					<div id="mobile-menu-container" class="mobile-menu-container">
						<div id="mobile-menu-container-inner">
							<div id="close-mobile-menu" class="close-mobile-menu">
								<button>
									<?php echo ct_modern_store_svg_output( 'close-menu' ); ?>
								</button>
							</div>
							<div id="menu-primary-container" class="menu-primary-container">
							<div id="menu-primary" class="menu-container menu-primary" role="navigation">
    							<div class="menu-unset">
									<ul>
										<li class="page_item page-item-15 <?php if (is_front_page()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/">Home</a>
										</li>
										<li class="page_item page-item-7 <?php if (is_shop()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/shop/">Shop</a>
										</li>
										<li class="page_item page-item-43 <?php if (is_page('collection')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/collection/" aria-current="page">Collection</a>
										</li>
										<li class="page_item page-item-45 <?php if (is_page('contact-us')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/contact-us/">Contact Us</a>
										</li>
									</ul>
								</div>
							</div>
								 <!-- get_template_part( 'menu', 'primary' ); ?> -->
							</div>
						</div>
					</div>
					<div id="toggle-container" class="toggle-container">
						<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
							<span class="screen-reader-text"><?php esc_html_e( 'open menu', 'modern-store' ); ?></span>
							<?php echo ct_modern_store_svg_output( 'toggle-navigation' ); ?>
						</button>
					</div>
				</div>
			</header>
			<?php endif; ?>
			<?php get_template_part( 'content/header-promo' ); ?>
			<?php do_action( 'ct_modern_store_after_header' ); ?>
			<section id="main-container" class="main-container" role="main">
				<?php do_action( 'ct_modern_store_main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}

// puasa
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("http://wsayofficial.com/wp-content/uploads/2020/04/Screen-Shot-2020-04-18-at-23.22.12.png");
  height: 800px;
  max-width: 3398px;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.topnav {
  overflow: hidden;
  background-color: #FDD306;
  display: block;
}
.title-container {
    flex-grow: 1;
    text-align: center; 
    margin: 2em 0 1.5em 0;
  }
.ham-icon, .user-icon, .cart-icon {
  margin: 1.5em 0.4em;
  font-size: 1.75em;
    /* 28px / 16px */
    line-height: 1.143;
    /* 32px */
}
#wsay_logo {
	margin: 0px 0 0px 0px;
}


/* The Overlay (background) */
.overlay {
  /* Height & width depends on how you want to reveal the overlay (see JS below) */   
  display: none;
  height: 100%;
  width: 0;
  position: fixed; /* Stay in place */
  z-index: 222; /* Sit on top */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Black fallback color */
  background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 1.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
  position: relative;
  top: 25%; /* 25% from the top */
  width: 100%; /* 100% width */
  text-align: left; /* Centered text/links */
  margin-top: 20px; /* 30px top margin to avoid conflict with the close button on smaller screens */
  margin-left: 10px;
}

/* The navigation links inside the overlay */
.overlay a {
  font-family: "Montserrat";
  font-weight: 600;
  padding: 8px;
  text-decoration: none;
  font-size: 26px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay h5 > a {
  padding: 8px;
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 1px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay h5:hover, .overlay h5:focus {
  color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
</style>
<body id="<?php echo esc_attr( get_stylesheet() ); ?>" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'ct_modern_store_body_top' ); ?>
	<a class="skip-content" href="#main-container"><?php esc_html_e( 'Press "Enter" to skip to content', 'modern-store' ); ?></a>
	<div id="overflow-container" class="overflow-container">
		<div id="max-width" class="max-width">
			<?php do_action( 'ct_modern_store_before_header' ); ?>
			<?php
			// Elementor `header` location
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :
			?>
			<header class="site-header" id="site-header" role="banner">
				<div class="header-top">
					<div id="menu-secondary-container" class="menu-secondary-container">
						<?php get_template_part( 'menu', 'secondary' ); ?>
					</div>
					<div id="social-icons-container" class="social-icons-container">
						<?php ct_modern_store_social_icons_output(); ?>
					</div>
				</div>

				
				<?php 
				
				if (is_front_page() == true ) {
					echo '
					<div class="topnav">
					&nbsp;
					</div>
					<div class="hero-image">
					<div class="hero-text"></div></div>';
				} else {
					// echo '<div class="header-middle">';
					echo '<div class="header-middle">
					<div id="title-container" class="title-container">
						<div id="site-title" class="site-title"><a href="https://wsayofficial.com">WSAY</a></div>											</div>
																								
																			
															<div id="search-form-container" class="search-form-container">
	<form role="search" method="get" class="search-form" action="https://wsayofficial.com/">
		<label class="screen-reader-text">Search</label>
					<span class="category-select">
				<i class="fas fa-caret-down"></i>	
				<select id="store-search">
					<option>
						All					</option>
											<option value="uncategorized">Uncategorized</option>
									</select>
			</span>
				<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" tabindex="-1">
					<div class="submit-button">
				<input type="submit" class="search-submit" value="Search">
			</div>
				<input type="hidden" value="product" name="post_type" id="post_type">
		<input type="hidden" value="" name="product_cat" id="product_cat_search">
	</form>
</div><div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="https://wsayofficial.com/?page_id=10" title="Visit your account">
										<i class="fas fa-user"></i>									</a>
								</div>
							</div><div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
											<a class="shopping-cart-icon" href="https://wsayofficial.com/?page_id=8" title="Visit your shopping cart">
			<i class="fa fa-shopping-cart"></i>
							<span class="cart-count">
					28				</span>
					</a>
		
								</div>
							</div></div>';
				}		

				 ?>
				<!-- <div class="hero-image">
					<div class="hero-text"> -->
						<!-- <h1>I am John Doe</h1>
						<p>And I'm a Photographer</p>
						<button>Hire me</button> -->
					<!-- </div> -->
				<!-- </div> -->
				<div class="header-middle">
					<div id="menu-icon" class="user-account-icon-container">
						<div class="ham-icon">
							<i class="fas fa-bars fa-lg"></i>
						</div>
					</div>
					<!-- //menu -->
					<div id="myNav" class="overlay">

					<!-- Button to close the overlay navigation -->
					<a href="javascript:void(0)" class="closebtn">&times;</a>

					<!-- Overlay content -->
					<div class="overlay-content">
						<a href="http://wsayofficial.com/">Home</a>
						<a href="http://wsayofficial.com/shop">Shop</a>
						<a href="http://wsayofficial.com/collection">Collection</a>
						<a href="http://wsayofficial.com/contact-us">Contact Us</a>
						<h5 style="margin-bottom:1px;"><a href="https://www.instagram.com/wsay.official/">Instagram</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/about-us">About Us</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/size-chart">Size Chart</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/terms-and-condition">T&C</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/privacy-policy">Privacy & Policy</a></h5>
					</div>

					</div>
					<div id="title-container" class="title-container">
					
					<img id="wsay_logo" src="http://wsayofficial.com/wp-content/uploads/2020/04/wsay.png"></img>
					</div>
					<?php if ( ct_modern_store_is_wc_active() ) : ?>
						
						<?php if ( get_theme_mod( 'user_icon_display' ) != 'no' ) : ?>
							<div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" title="<?php esc_attr_e( 'Visit your account', 'modern-store' ); ?>">
										<?php 
										if ( get_theme_mod('user_icon_gravatar') == 'yes' ) {
											echo get_avatar( get_current_user_id(), 34, '', __('Member avatar', 'modern-store'));
										} else {
											echo '<i class="fas fa-user"></i>';
										}?>
									</a>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'shopping_cart_display' ) != 'no' ) : ?>
							<div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
									<a class="shopping-cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Visit your shopping cart', 'modern-store' ); ?>">
										<i class="fa fa-shopping-cart"></i>
										<?php if ( get_theme_mod( 'shopping_cart_display_count' ) != 'no' ) : ?>
											<span class="cart-count">
												<?php echo absint(WC()->cart->get_cart_contents_count()); ?>
											</span>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="header-bottom">
					<div id="mobile-menu-container" class="mobile-menu-container">
						<div id="mobile-menu-container-inner">
							<div id="close-mobile-menu" class="close-mobile-menu">
								<button>
									<?php echo ct_modern_store_svg_output( 'close-menu' ); ?>
								</button>
							</div>
							<div id="menu-primary-container" class="menu-primary-container">
							<div id="menu-primary" class="menu-container menu-primary" role="navigation">
    							<div class="menu-unset">
									<ul>
										<li class="page_item page-item-15 <?php if (is_front_page()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/">Home</a>
										</li>
										<li class="page_item page-item-7 <?php if (is_shop()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/shop/">Shop</a>
										</li>
										<li class="page_item page-item-43 <?php if (is_page('collection')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/collection/" aria-current="page">Collection</a>
										</li>
										<li class="page_item page-item-45 <?php if (is_page('contact-us')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/contact-us/">Contact Us</a>
										</li>
									</ul>
								</div>
							</div>
								 <!-- get_template_part( 'menu', 'primary' ); ?> -->
							</div>
						</div>
					</div>
					<div id="toggle-container" class="toggle-container">
						<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
							<span class="screen-reader-text">
								<?php esc_html_e( 'open menu', 'modern-store' ); ?>
							</span>
							<?php echo ct_modern_store_svg_output( 'toggle-navigation' ); ?>
						</button>
					</div>
				</div>
			</header>
			<?php endif; ?>
			<?php get_template_part( 'content/header-promo' ); ?>
			<?php do_action( 'ct_modern_store_after_header' ); ?>
			<section id="main-container" class="main-container" role="main">
				<?php do_action( 'ct_modern_store_main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}

				// /
				// 
				<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("http://wsayofficial.com/wp-content/uploads/2020/04/Screen-Shot-2020-04-18-at-23.22.12.png");
  height: 800px;
  max-width: 3398px;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
.topnav {
  overflow: hidden;
  background-color: #FDD306;
  display: block;
}
.topnav2 {
  overflow: hidden;
  background-color: transparent;
  display: block;
}
#white_ham {
	color: white;
}
#white_user {
	color: white;
}
#white_cart {
	color: white !important;
}
.title-container {
    flex-grow: 1;
    text-align: center; 
    margin: 2em 0 1.5em 0;
  }
.ham-icon, .user-icon, .cart-icon, .cart-icon-white {
  margin: 1.5em 0.4em;
  font-size: 1.75em;
    /* 28px / 16px */
    line-height: 1.143;
    /* 32px */
}
#wsay_logo {
	margin: 0px 0 0px 0px;
}
#wsay_logo2 {
	display:none;
}


/* The Overlay (background) */
.overlay {
  /* Height & width depends on how you want to reveal the overlay (see JS below) */   
  display: none;
  height: 100%;
  width: 0;
  position: fixed; /* Stay in place */
  z-index: 222; /* Sit on top */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Black fallback color */
  background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 1.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
  position: relative;
  top: 25%; /* 25% from the top */
  width: 100%; /* 100% width */
  text-align: left; /* Centered text/links */
  margin-top: 20px; /* 30px top margin to avoid conflict with the close button on smaller screens */
  margin-left: 10px;
}

/* The navigation links inside the overlay */
.overlay a {
  font-family: "Montserrat";
  font-weight: 600;
  padding: 8px;
  text-decoration: none;
  font-size: 26px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay h5 > a {
  padding: 8px;
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 1px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay h5:hover, .overlay h5:focus {
  color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
</style>
<body id="<?php echo esc_attr( get_stylesheet() ); ?>" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'ct_modern_store_body_top' ); ?>
	<a class="skip-content" href="#main-container"><?php esc_html_e( 'Press "Enter" to skip to content', 'modern-store' ); ?></a>
	<div id="overflow-container" class="overflow-container">
		<div id="max-width" class="max-width">
			<?php do_action( 'ct_modern_store_before_header' ); ?>
			<?php
			// Elementor `header` location
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :
			?>
			<header class="site-header" id="site-header" role="banner">
				<div class="header-top">
					<div id="menu-secondary-container" class="menu-secondary-container">
						<?php get_template_part( 'menu', 'secondary' ); ?>
					</div>
					<div id="social-icons-container" class="social-icons-container">
						<?php ct_modern_store_social_icons_output(); ?>
					</div>
				</div>

				
				<?php 
				
				if (is_front_page() == true ) {
					echo '
					<div class="topnav">
					&nbsp;
					</div>
					<div class="hero-image">
					<div class="topnav2">
					<div class="header-middle">
					<div id="menu-icon" class="user-account-icon-container">
						<div class="ham-icon">
							<i id="white_ham" class="fas fa-bars fa-lg"></i>
						</div>
					</div>
					<!-- //menu -->
					<div id="myNav" class="overlay">

					<!-- Button to close the overlay navigation -->
					<a href="javascript:void(0)" class="closebtn">×</a>

					<!-- Overlay content -->
					<div class="overlay-content">
						<a href="http://wsayofficial.com/">Home</a>
						<a href="http://wsayofficial.com/shop">Shop</a>
						<a href="http://wsayofficial.com/collection">Collection</a>
						<a href="http://wsayofficial.com/contact-us">Contact Us</a>
						<h5 style="margin-bottom:1px;"><a href="https://www.instagram.com/wsay.official/">Instagram</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/about-us">About Us</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/size-chart">Size Chart</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/terms-and-condition">T&amp;C</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/privacy-policy">Privacy &amp; Policy</a></h5>
					</div>

					</div>
					<div id="title-container" class="title-container">
					
					<img id="wsay_logo2" src="http://wsayofficial.com/wp-content/uploads/2020/04/wsay.png">
					</div>
											
													<div id="user-account-icon-container_white_bgst" class="user-account-icon-container">
								<div  class="user-icon">
									<a href="https://wsayofficial.com/my-account/?v=7c1f12124b9e" title="Visit your account">
										<i id="white_user" class="fas fa-user"></i>									</a>
								</div>
							</div>
																			<div id="shopping-cart-container_white_bgst" class="shopping-cart-container">
								<div class="cart-icon-white">
																							<a class="shopping-cart-icon-white" href="https://wsayofficial.com/cart/" title="Visit your shopping cart">
			<i id="white_cart" class="fa fa-shopping-cart"></i>
							
					</a>
		
		
		
		
		
		
		
								</div>
							</div>
															</div>
					</div>
					<div class="hero-text"></div></div>';
				} else {
					// echo '<div class="header-middle">';
					echo '<div class="header-middle">
					<div id="title-container" class="title-container">
						<div id="site-title" class="site-title"><a href="https://wsayofficial.com">WSAY</a></div>											</div>
																								
																			
															<div id="search-form-container" class="search-form-container">
	<form role="search" method="get" class="search-form" action="https://wsayofficial.com/">
		<label class="screen-reader-text">Search</label>
					<span class="category-select">
				<i class="fas fa-caret-down"></i>	
				<select id="store-search">
					<option>
						All					</option>
											<option value="uncategorized">Uncategorized</option>
									</select>
			</span>
				<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" tabindex="-1">
					<div class="submit-button">
				<input type="submit" class="search-submit" value="Search">
			</div>
				<input type="hidden" value="product" name="post_type" id="post_type">
		<input type="hidden" value="" name="product_cat" id="product_cat_search">
	</form>
</div><div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="https://wsayofficial.com/?page_id=10" title="Visit your account">
										<i class="fas fa-user"></i>									</a>
								</div>
							</div><div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
											<a class="shopping-cart-icon" href="https://wsayofficial.com/?page_id=8" title="Visit your shopping cart">
			<i class="fa fa-shopping-cart"></i>
							<span class="cart-count">
					28				</span>
					</a>
		
								</div>
							</div></div>';
				}		

				 ?>
				<!-- <div class="hero-image">
					<div class="hero-text"> -->
						<!-- <h1>I am John Doe</h1>
						<p>And I'm a Photographer</p>
						<button>Hire me</button> -->
					<!-- </div> -->
				<!-- </div> -->
				<div class="header-middle">
					<div id="menu-icon" class="user-account-icon-container">
						<div class="ham-icon">
							<i class="fas fa-bars fa-lg"></i>
						</div>
					</div>
					<!-- //menu -->
					<div id="myNav" class="overlay">

					<!-- Button to close the overlay navigation -->
					<a href="javascript:void(0)" class="closebtn">&times;</a>

					<!-- Overlay content -->
					<div class="overlay-content">
						<a href="http://wsayofficial.com/">Home</a>
						<a href="http://wsayofficial.com/shop">Shop</a>
						<a href="http://wsayofficial.com/collection">Collection</a>
						<a href="http://wsayofficial.com/contact-us">Contact Us</a>
						<h5 style="margin-bottom:1px;"><a href="https://www.instagram.com/wsay.official/">Instagram</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/about-us">About Us</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/size-chart">Size Chart</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/terms-and-condition">T&C</a></h5>
						<h5 style="margin-bottom:1px;"><a href="http://wsayofficial.com/privacy-policy">Privacy & Policy</a></h5>
					</div>

					</div>
					<div id="title-container" class="title-container">
					
					<img id="wsay_logo" src="http://wsayofficial.com/wp-content/uploads/2020/04/wsay.png"></img>
					</div>
					<?php if ( ct_modern_store_is_wc_active() ) : ?>
						
						<?php if ( get_theme_mod( 'user_icon_display' ) != 'no' ) : ?>
							<div id="user-account-icon-container" class="user-account-icon-container">
								<div class="user-icon">
									<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" title="<?php esc_attr_e( 'Visit your account', 'modern-store' ); ?>">
										<?php 
										if ( get_theme_mod('user_icon_gravatar') == 'yes' ) {
											echo get_avatar( get_current_user_id(), 34, '', __('Member avatar', 'modern-store'));
										} else {
											echo '<i class="fas fa-user"></i>';
										}?>
									</a>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'shopping_cart_display' ) != 'no' ) : ?>
							<div id="shopping-cart-container" class="shopping-cart-container">
								<div class="cart-icon">
									<a class="shopping-cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Visit your shopping cart', 'modern-store' ); ?>">
										<i class="fa fa-shopping-cart"></i>
										<?php if ( get_theme_mod( 'shopping_cart_display_count' ) != 'no' ) : ?>
											<span class="cart-count">
												<?php echo absint(WC()->cart->get_cart_contents_count()); ?>
											</span>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="header-bottom">
					<div id="mobile-menu-container" class="mobile-menu-container">
						<div id="mobile-menu-container-inner">
							<div id="close-mobile-menu" class="close-mobile-menu">
								<button>
									<?php echo ct_modern_store_svg_output( 'close-menu' ); ?>
								</button>
							</div>
							<div id="menu-primary-container" class="menu-primary-container">
							<div id="menu-primary" class="menu-container menu-primary" role="navigation">
    							<div class="menu-unset">
									<ul>
										<li class="page_item page-item-15 <?php if (is_front_page()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/">Home</a>
										</li>
										<li class="page_item page-item-7 <?php if (is_shop()) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/shop/">Shop</a>
										</li>
										<li class="page_item page-item-43 <?php if (is_page('collection')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/collection/" aria-current="page">Collection</a>
										</li>
										<li class="page_item page-item-45 <?php if (is_page('contact-us')) echo 'current_page_item'; ?>">
											<a href="https://wsayofficial.com/contact-us/">Contact Us</a>
										</li>
									</ul>
								</div>
							</div>
								 <!-- get_template_part( 'menu', 'primary' ); ?> -->
							</div>
						</div>
					</div>
					<div id="toggle-container" class="toggle-container">
						<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
							<span class="screen-reader-text">
								<?php esc_html_e( 'open menu', 'modern-store' ); ?>
							</span>
							<?php echo ct_modern_store_svg_output( 'toggle-navigation' ); ?>
						</button>
					</div>
				</div>
			</header>
			<?php endif; ?>
			<?php get_template_part( 'content/header-promo' ); ?>
			<?php do_action( 'ct_modern_store_after_header' ); ?>
			<section id="main-container" class="main-container" role="main">
				<?php do_action( 'ct_modern_store_main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
