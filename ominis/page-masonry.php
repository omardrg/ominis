<?php
/**
 * Template Name: Masonry
 */
__( 'Masonry', 'ominis' );

get_header();
?>

		<main id="primary" class="site-main content-area col">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'masonry' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
