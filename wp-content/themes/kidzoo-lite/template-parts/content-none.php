<?php
/*
	@package kidzoo-lite
*/
?>

<section class="no-results search-not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No Search Results Found', 'kidzoo-lite' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kidzoo-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kidzoo-lite' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kidzoo-lite' ); ?></p>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
