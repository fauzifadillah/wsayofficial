<?php

  /*
    This is the template for Footer

    @package kidzoo-lite
  */

?>

</div><!-- #content -->
<footer class="kidzoo-footer">
    <?php
    if (    is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && is_active_sidebar( 'footer-sidebar-3'  )
        &&  is_active_sidebar( 'footer-sidebar-4' )
    ): {?>
        <div class="kidzoo-footer-container">
            <div class="kidzoofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div><!-- .third .widget-area -->

                    <div class="fourth col-md-3 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                    </div><!-- .fourth .widget-area -->
                </div>

            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="kidzoo-footer-container">
            <div class="kidzoofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third col-md-4 col-sm-4 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div><!-- .third .widget-area -->
                </div>
            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && is_active_sidebar( 'footer-sidebar-2' )
        && !is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="kidzoo-footer-container">
            <div class="kidzoofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-6 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second col-md-6 col-sm-6 col-xs-12 widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div><!-- .second .widget-area -->

                </div>
            </div>
        </div>
    <?php }
    elseif ( is_active_sidebar( 'footer-sidebar-1'  )
        && !is_active_sidebar( 'footer-sidebar-2' )
        && !is_active_sidebar( 'footer-sidebar-3'  )
        &&  !is_active_sidebar( 'footer-sidebar-4' )
    ) : {?>
        <div class="kidzoo-footer-container">
            <div class="kidzoofooter container" role="complementary">
                <div class="row">
                    <div class="first col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12 text-center widget-area">
                        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                    </div><!-- .first .widget-area -->
                </div>
            </div>
        </div>
    <?php }
    endif;
    ?>
    <div class="kidzoo-footer-copyright">
        <div class="container">
            <div class="site-info text-center">
                <?php
    			printf( esc_html__( 'Theme: %1$s by %2$s', 'kidzoo-lite' ), esc_attr( 'Kidzoo Lite', 'kidzoo-lite' ),
    				'<a href="'.esc_url( __( 'http://themeparrot.com', 'kidzoo-lite' ) ).'">' . esc_attr__( 'ThemeParrot', 'kidzoo-lite' ) . '</a>' );
                ?>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<!-- BACK TO TOP -->
  <div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs affix-top">
    <button class="btn btn-primary" title="<?php esc_attr_e('Back to Top', 'kidzoo-lite'); ?>"><i class="fa fa-chevron-up"></i></button>
  </div>
<!-- //BACK TO TOP -->

<?php wp_footer(); ?>
</body>
</html>
