<?php
/*
@package kidzoo-lite
  =================
  Audio post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kidzoo-format-audio' ); ?>>

    <div class="entry-content">

        <?php echo kidzoo_get_embedded_media( array('audio', 'iframe') ); ?>

        <header class="entry-header">

            <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ) ?>

            <div class="entry-meta">
              <?php echo kidzoo_posted_meta(); ?>
            </div>

        </header>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn-kidzoo"><?php esc_html_e('Continue', 'kidzoo-lite'); ?> <i class="fa fa-long-arrow-right"></i></a>
        </div>


    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php echo kidzoo_posted_footer(); ?>
    </footer>

</article>
