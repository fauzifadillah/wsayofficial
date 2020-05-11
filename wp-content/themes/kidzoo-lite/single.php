<?php
/*
  @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <div class="kidzoo-breadcrumb" style="background-image: url( <?php echo header_image(); ?> );">
      <div class="container kidzoo-breadcrumb-banner">
          <?php
          if( function_exists('kidzoo_custom_breadcrumbs') ) :
              kidzoo_custom_breadcrumbs();
          endif;
          ?>
      </div>
    </div>
    <main id="main" class="site-main" >

      <div class="container">
            <?php
              if( have_posts() ) :

                while( have_posts() ): the_post();

                  get_template_part( 'template-parts/single', get_post_format() );

                  echo kidzoo_post_navigation();

                  if( comments_open() ):
                    comments_template();
                  endif;

                endwhile;

              endif;
            ?>
      </div><!-- .container -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
