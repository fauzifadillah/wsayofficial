<?php
/*
  @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <div class="kidzoo-breadcrumb" style="background-image: url( <?php echo header_image(); ?> );">
        <header class="archive-header container">
            <?php the_archive_title('<h1 class="page-title">','</h1>'); ?>
        </header>
        <div class="container kidzoo-breadcrumb-banner">
            <?php
            if( function_exists('kidzoo_custom_breadcrumbs') ) :
                kidzoo_custom_breadcrumbs();
            endif;
            ?>
        </div>
    </div>
    <main id="main" class="site-main" >
        <div class="container kidzoo-blog-container">
            <div class="row">
              <div class="col-sm-9">

                  <div class="kidzoo-posts-container">

                    <?php
                      if( have_posts() ) :

                        echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] .'">';

                        while( have_posts() ): the_post();

                          get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;

                        echo '</div>';

                        kidzoo_pagination_bar();

                      endif;
                    ?>

                  </div><!-- .container -->

              </div>
              <div class="col-sm-3">
                  <?php get_sidebar(); ?>
              </div>

            </div>
        </div>

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
