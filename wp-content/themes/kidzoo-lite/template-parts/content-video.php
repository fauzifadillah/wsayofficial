<?php
/*
@package kidzoo-lite
  =================
  Video post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kidzoo-format-video' ); ?>>

    <div class="entry-content">
        <header class="entry-header">

        <?php if( kidzoo_get_embedded_media() ) : ?>
            <div class="embed-responsive embed-responsive-16by9">
              <?php echo kidzoo_get_embedded_media( array('video', 'iframe') ); ?>
            </div>
        <?php endif; ?>

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
