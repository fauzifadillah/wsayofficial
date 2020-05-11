<?php

  /*
    This is the template for Header

    @package kidzoo-lite
  */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="profile" href="http://gmpg.org/xfn/11">

        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>
  <body <?php body_class(); ?>>

    <div id="page" class="site">

    <!-- preloader -->
    <!-- <div id="preloader" class="loader">
    		<div class="loading-pulse"></div>
    </div> -->

     <!-- sidebar-closed -->
    <div class="kidzoo-sidebar sidebar-closed">

      <div class="kidzoo-sidebar-container">

        <a class="js-toggleSidebar sidebar-close">
          <span class="fa fa-close"></span>
        </a>

        <div class="sidebar-scroll">

            <div class="kidzoo-offcanvas-menu">
                <?php
                  wp_nav_menu( array(
                    'theme_location' => 'offcanvas',
                    'container' => false,
                    'menu_class' => 'nav navbar-nav navbar-collapse'
                  ));
                ?>
            </div>

        </div>

      </div>

    </div>

    <div class="sidebar-overlay js-toggleSidebar"> </div>

    <div class="nav_wrapper">
        <header class="header-container">
          <div class="nav-container">
            <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 site-branding">
                      <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                      ?>
                      <h2 class="site-title">
                          <a href="<?php echo esc_url( home_url( '/' ) );  ?>" >
                              <?php
                                  if ( has_custom_logo() ) {
                                          echo '<img class="logo-img" src="'. esc_url( $logo[0] ) .'">';
                                  } else {
                                          echo '<span class="logo-text">'. esc_attr( get_bloginfo( 'name' ) ) .'</span>';
                                  }
                              ?>
                          </a>
                      </h2>
                      <?php
                          $description = get_bloginfo( 'description');
                          if ( $description) :
                          echo '<span class="site-description">';	echo esc_attr($description); echo '</span>';
                          endif;
                      ?>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6 pull-right topbar-right">
                          <div class="text-right topbar-icons">
                              <div class="head-search">
                                   <div id="search-toggle" class="toggle-search"><i class="fa fa-search"></i></div>
                                   <div class="search-expand">
                                       <div class="search-expand-inner">
                                           <?php get_search_form(); ?>
                                       </div>
                                   </div>
                              </div><!--/.head-search-->
                              <?php do_action('cart_mini'); ?>
                          </div>
                          <div class="text-left topbar-widgets">
                                <a class="js-toggleSidebar sidebar-open visible-xs pull-right">
                                    <span class="fa fa-bars"></span>
                                </a>
                                <?php
                                    if ( is_active_sidebar( 'top-bar' ) ) {
                                        dynamic_sidebar( 'top-bar' );
                                    }
                                ?>
                          </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 menu-container">
                      <nav class="navbar navbar-default navbar-kidzoo main-navigation hidden-xs">
                        <?php
                          wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'nav navbar-nav'
                          ));
                        ?>
                      </nav><!--/.navbar-kidzoo-->
                  </div>
              </div><!-- .row -->
            </div> <!-- .container-fluid -->
          </div><!-- .nav-container -->
        </header><!-- .header-container -->
    </div>
    <div id="content" class="site-content">
