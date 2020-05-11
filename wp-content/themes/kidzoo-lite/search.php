<?php
/*
  @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <div class="kidzoo-breadcrumb" style="background-image: url( <?php echo header_image(); ?> );">
      <header class="page-header container">
          <h1 class="page-title"><?php esc_html_e('Search', 'kidzoo-lite'); ?></h1>
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
        <div class="container">

            <div class="search-container">
                <div class="search-content">
                    <h3><?php esc_html_e('Search', 'kidzoo-lite'); ?></h3>
                    <?php get_search_form(); ?>
                    <hr />
                    <h4>
                        <?php esc_html_e('Search Results for','kidzoo-lite'); ?>
                        <span class="text-primary">
                            <?php the_search_query(); ?>
                        </span>
                    </h4>
                </div>
            </div>

            <?php
                if( have_posts() ) :

                    while( have_posts() ): the_post();

                      get_template_part( 'template-parts/content', 'search' );

                    endwhile;

                else :

        			get_template_part( 'template-parts/content', 'none' );

                endif;

            ?>

            <nav class="text-center">
                <?php kidzoo_pagination_bar();  ?>
            </nav>

        </div><!-- .container -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
