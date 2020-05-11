<?php
/*
  @package kidzoo-lite
*/

if( post_password_required() ){
  return;
}

?>

<div id="comments" class="comments-area">

  <?php if( have_comments() ): ?>

  <h2 class="comments-title">

    <?php

        $comments_no = get_comments_number();
        if ( 1 == $comments_no ) {
          /* translators: %s: post title */
          printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'kidzoo-lite' ), get_the_title() );
        } else {
          printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
              '%1$s comments on &ldquo;%2$s&rdquo;',
              '%1$s comments on &ldquo;%2$s&rdquo;',
              $comments_no,
              'comments title',
              'kidzoo-lite'
            ),
            number_format_i18n( $comments_no ),
            get_the_title()
          );
        }

    ?>

  </h2>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <?php kidzoo_get_post_navigation(); ?>
    <?php endif; // Check for comment navigation. ?>

  <ul class="comments-list">

    <?php

        $args = array(
            'type' => 'all',
            'avatar_size' => 64,
		    'style'      => 'ul',
		    'short_ping' => true,
      );

      wp_list_comments( $args );
    ?>

  </ol>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <?php kidzoo_get_post_navigation(); ?>
  <?php endif; // Check for comment navigation. ?>


<?php endif; ?>

  <?php if( !comments_open() && get_comments_counter() && post_type_supports( get_post_type(), 'comments' ) ): ?>

    <p class="no-comments"> <?php esc_html_e('Comments are closed', 'kidzoo-lite'); ?> </p>

  <?php endif; ?>


  <?php

  $fields =  array(
    'author' =>
      '<div class="form-group"><label for="author">' . esc_html__( 'Name', 'kidzoo-lite' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .'" required="required" /></div>',

    'email' =>
      '<div class="form-group"><label for="email">' . esc_html__( 'Email', 'kidzoo-lite' ) . '</label> <span class="required">*</span> <input id="email" name="email" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) .'" required="required" /></div>',

    'url' =>
      '<div class="form-group last_field"><label for="url">' . esc_html__( 'Website', 'kidzoo-lite' ) . '</label> <input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .'" /></div>',

  );

    $args = array(

      'class_submit' => 'btn btn-lg review-submit-button',
      'label_submit' => esc_html__( 'Submit Comment', 'kidzoo-lite' ),
      'comment_field' =>
        '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun', 'kidzoo-lite'  ) .'</label><textarea id="comment" name="comment" class="form-control" required="required"></textarea></div>',
      'fields' => apply_filters( 'comment_form_default_fields', $fields )

    );

    comment_form( $args );
  ?>

</div>
