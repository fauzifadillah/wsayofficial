<?php
/*
    Template Name: Home page
    @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" >

      <div class="home-container">

        <?php
          if( have_posts() ) :

            while( have_posts() ): the_post();

              get_template_part( 'template-parts/content', 'home' );

            endwhile;

          endif;
        ?>

      </div><!-- .container -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
