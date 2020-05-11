<?php
/*
@package kidzoo-lite
  =================
  Quote post format
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kidzoo-format-quote' ); ?>>
  <header class="entry-header">

    <div class="row">
      <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">

        <h1 class="quote-content">
            <a href="<?php echo get_permalink(); ?>" rel="bookmark">
                <?php the_content(); ?>
            </a>
        </h1>
        <?php the_title( '<h2 class="quote-author">- ',' -</h2>' ) ?>

      </div>
    </div>


  </header>

</article>
