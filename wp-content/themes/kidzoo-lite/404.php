<?php
/*
    Template name: 404 error page
    @package kidzoo-lite
*/
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" >

      <section class="error-404 not-found">
          <div class="container">
              <header class="page-header">
                  <h1 class="page-title"><i class="fa fa-frown-o"></i> <?php esc_html_e( 'Whoops! That page can&rsquo;t be found.', 'kidzoo-lite' ); ?></h1>
              </header><!-- .page-header -->

              <div class="page-content">

                  <div class="error">
                      <div id="outline">
                          <div id="errorboxoutline">
                              <div class="error-code"><span class="first-err"><?php echo '4'; ?></span><span><?php echo '0'; ?></span><span class="last-err"><?php echo '4'; ?></span></div>

                              <div id="errorboxbody">
                                  <a title="<?php esc_attr_e("Go to the Home Page", 'kidzoo-lite') ?> " href="<?php echo esc_url( home_url('/') ); ?>" class="button-home"><?php esc_html_e('Back to Home', 'kidzoo-lite'); ?></a>
                              </div>

                          </div>
                      </div>
                  </div>

              </div><!-- .page-content -->
          </div><!-- .container -->
      </section><!-- .error-404 -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
