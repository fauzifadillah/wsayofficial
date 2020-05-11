<?php
/*
@package kidzoo-lite
  =================
  Aside post format
  =================
*/
if ( kidzoo_get_attachment() ) {
	$imgclass = 'col-md-2 col-sm-3';
	$conclass = 'col-md-10 col-sm-9';
}
else {
	$imgclass = 'col-sm-12';
	$conclass = 'col-sm-12';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kidzoo-format-aside' ); ?>>

  <div class="aside-container">
    <div class="row">
      <div class="<?php echo $imgclass; ?> text-center">
        <?php if( kidzoo_get_attachment()): ?>

            <div class="aside-featured background-image" style="background-image:url(<?php echo kidzoo_get_attachment(); ?>);"> </div>

        <?php endif; ?>
      </div>
      <div class="<?php echo $conclass; ?>">
          <div class="aside-text-block">
			  <div class="entry-content">

	              <header class="entry-header">

	                <div class="entry-meta">
	                  <?php echo kidzoo_posted_meta(); ?>
	                </div>

	              </header>

                  <div class="entry-excerpt">
                    <?php the_content(); ?>
                  </div>

              </div><!-- .entry-content -->
          </div>
      </div>
    </div>
    <footer class="entry-footer">

      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <?php echo kidzoo_posted_footer(); ?>
        </div>
      </div>

    </footer>
  </div>

</article>
