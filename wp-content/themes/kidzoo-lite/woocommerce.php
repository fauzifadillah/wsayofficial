<?php

get_header();
?>
<div class="kidzoo-breadcrumb">
	<div class="container">
		<?php woocommerce_breadcrumb(); ?>
	</div>
</div>
<div class="container">

	<div id="primary" class="content-area">
		<div class="shop-container">
			<div class="row">
				<div class="col-sm-9">
					<main id="main" class="col-xs-12" role="main">

						<?php woocommerce_content(); ?>

					</main><!-- #main -->
				</div>
				<div class="col-sm-3">
					<?php get_sidebar('shop'); ?>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

</div>
<?php

get_footer();
