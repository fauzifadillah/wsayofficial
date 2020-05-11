<?php
/*
@package kidzoo-lite
  =================
  Standard post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-image">
  		<div class="entry-image-container">
  			<?php
  				// check if the post has a Post Thumbnail assigned to it.
  				if ( has_post_thumbnail() ) : ?>
  			    <a class="standard-featured-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  			        <?php the_post_thumbnail(); ?>
  			    </a>
  				<?php endif;
  			?>
  		</div>
  	</div>
    <div class="entry-content">
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

        <footer class="entry-footer">
          <?php echo kidzoo_posted_footer(); ?>
        </footer>

    </div><!-- .entry-content -->

</article>
