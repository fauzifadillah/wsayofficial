<style>
    .design-credit a, .design-credit a:link, .design-credit a:visited {
        color: #1A1A1A;
        font-weight: 400;
        font-size: 16px;
    }
    ul#menu {
        margin-bottom: 30px;
    }
    ul#menu li {
    display:inline;
    margin: 2em 1em;
    padding: 2em 1em;
    }
    @media screen and (max-width: 768px) {
        ul#menu li{
            display: none;
        }
    }
</style>
<?php do_action( 'ct_modern_store_main_bottom' ); ?>
<?php ct_modern_store_pagination(); ?>
</section> <!-- .main-container -->
<?php do_action( 'ct_modern_store_after_main' ); ?>

<?php 
// Elementor `footer` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) :
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
    <?php do_action( 'ct_modern_store_footer_top' ); ?>
    <div class="design-credit">
        <ul id="menu">
            <li>
                <a href="https://www.instagram.com/wsay.official/">Instagram</a>
            </li>
            <li>
                <a href="http://wsayofficial.com/about-us">About Us</a>
            </li>
            <li>
                <a href="http://wsayofficial.com/size-chart">Size Chart</a>
            </li>
            <li>
                <a href="https://wsayofficial.com/terms-and-conditions/">Terms and conditions</a>
            </li>
            <li>
                <a href="https://wsayofficial.com/privacy-policy/">Privacy and policy</a>
            </li>
        </ul>  
        <span>
            <?php
            // Translators: %s is the URL of the theme
            $footer_text = sprintf( __( '&copy; 2020, <a href="https://wsayofficial.com">Wsay</a> crafted by <a href="%s">SAGALA</a>.', 'modern-store' ), 'https://www.sagalagroup.com/' );
            $footer_text = apply_filters( 'ct_modern_store_footer_text', $footer_text );
            echo wp_kses_post( $footer_text );
            ?>
        </span>
    </div>
</footer>
<?php endif; ?>
</div><!-- .max-width -->
</div><!-- .overflow-container -->

<?php do_action( 'ct_modern_store_body_bottom' ); ?>

<?php wp_footer(); ?>

</body>
</html>