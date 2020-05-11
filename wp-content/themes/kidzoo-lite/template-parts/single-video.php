<?php
/*
@package kidzoo-lite
  =================
  Single post Template
  =================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="entry-image">
        <?php if( kidzoo_get_embedded_media() ) : ?>
            <div class="embed-responsive embed-responsive-16by9">
              <?php echo kidzoo_get_embedded_media( array('video', 'iframe') ); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php the_title( '<h1 class="entry-title">','</h1>' ) ?>

    <div class="single-entry-meta">
      <?php echo kidzoo_single_posted_meta(); ?>
    </div>

  </header>
  <div class="entry-content clearfix">

      <?php
          $content = apply_filters('the_content', get_the_content() );
          if(isset($type)){
                $embed = get_media_embedded_in_content( $content, $type );
          } else {
                  $embed = get_media_embedded_in_content( $content );
          }
          $content = str_replace($embed, "", $content);
          echo $content;
      ?>

        <?php
            $defaults = array(
                'before'           => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kidzoo-lite' ) . '</span>',
                'after'            => '</div>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'nextpagelink'     => esc_html__( 'Next page', 'kidzoo-lite' ),
                'previouspagelink' => esc_html__( 'Previous page', 'kidzoo-lite' ),
                'pagelink'         => '%',
                'echo'             => 1
            );

            wp_link_pages( $defaults );
		?>

  </div><!-- .entry-content -->

    <div class="related-posts">
        <?php
          //for use in the loop, list 5 post titles related to first tag on current post
          $tags = wp_get_post_tags($post->ID);
          if ($tags) {
              $first_tag = $tags[0]->term_id;
              $args=array(
              'tag__in' => array($first_tag),
              'post__not_in' => array($post->ID),
              'posts_per_page'=>5,
              'ignore_sticky_posts'=>1
              );
              $my_query = new WP_Query($args);
              echo '<h3 class="related-posts_title">' . esc_html__('You might also like reading:','kidzoo-lite') .'</h3>';
              echo '<ul class="related-posts_list row">';
              if( $my_query->have_posts() ) {
                  while ($my_query->have_posts()) : $my_query->the_post(); ?>

                      <li class="related-posts_item">
                          <?php echo '<a href="'.esc_url( get_the_permalink() ).'">'; the_title(); echo '</a>'; ?>
                      </li>

                  <?php endwhile;
              }
              echo '</ul>';
              wp_reset_postdata();
        } ?>
    </div>

    <?php if( kidzoo_author_info_box() ) : ?>

        <?php echo kidzoo_author_info_box(); ?>

    <?php endif; ?>

</article>
