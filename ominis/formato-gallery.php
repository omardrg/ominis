	<div class="entry-content">
		<div class="text-center mb-3 ">
			<div class="btn-group filter-button-group" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-secondary border-light active" data-filter="*"><?php _e( 'Show all', 'ominis' ); ?></button>

			</div><!-- /.btn-group -->
		</div><!-- /.text-center -->
		<div class="row grid filter-masonry">
		<?php
		the_content();
		?>
		</div><!-- /.filter-masonry -->
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ominis' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->