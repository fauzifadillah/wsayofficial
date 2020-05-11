<?php
/*
    Template Name: Page with Left sidebar
    @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <div class="kidzoo-breadcrumb" style="background-image: url( <?php echo header_image(); ?> );">
      <header class="page-header container">
          <h1 class="page-title"><?php single_post_title(); ?></h1>
      </header>
      <div class="container kidzoo-breadcrumb-banner">
          <?php
          if( function_exists('kidzoo_custom_breadcrumbs') ) :
              kidzoo_custom_breadcrumbs();
          endif;
          ?>
      </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-9 col-sm-push-3 col-md-9 col-md-push-3">
              <main id="main" class="site-main" >

                  <?php
                    if( have_posts() ) :

                      while( have_posts() ): the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
         				if ( comments_open() || get_comments_number() ) :
         					comments_template();
         				endif;

                      endwhile;

                    endif;
                  ?>

              </main> <!-- #main -->
          </div>
          <div class="col-xs-12 col-sm-3 col-sm-pull-9 col-md-3 col-md-pull-9">
              <?php get_sidebar(); ?>
          </div>
      </div>
    </div><!-- .container -->

  </div> <!-- #primary -->

<?php get_footer(); ?>
