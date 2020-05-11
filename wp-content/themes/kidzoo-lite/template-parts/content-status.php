<?php
/*
@package kidzoo-lite
  =================
  Status post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kidzoo-format-status' ); ?>>

    <header class="entry-header">
        <div class="post-details">
			<div class="avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
			</div>
			<div class="status-info">
				<span class="author-links"> <?php the_author(); ?> </span> &#64; <span class="time-links"> <?php the_time( get_option( 'date_format' ) ); ?></span>
				<?php the_content();	?>
			</div>
    	</div>
    </header>

</article>
