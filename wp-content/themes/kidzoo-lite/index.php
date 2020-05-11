<?php
/*
  @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" >
        <div class="container kidzoo-blog-container">
            <div class="row">

              <div class="col-sm-9">

                  <div class="kidzoo-posts-container">

                    <?php
                      if( have_posts() ) :

                        while( have_posts() ): the_post();

                          get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;

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
