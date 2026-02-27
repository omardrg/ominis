<?php
/**
 * Template part for displaying page content in page-masonry.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ominis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header my-3">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php ominis_post_thumbnail(); ?>

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

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'ominis' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
