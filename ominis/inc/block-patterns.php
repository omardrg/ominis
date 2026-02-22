<?php
/**
 * Register block patterns for Gutenberg.
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 *
 * @package ominis
 */

/**
 * Register block patterns.
 */
function ominis_register_block_patterns() {
	// Ejemplo: Patrón de héroe con título y botón
	register_block_pattern(
		'ominis/hero-section',
		array(
			'title'       => __( 'Hero Section', 'ominis' ),
			'description' => __( 'A large hero section with background image and text overlay.', 'ominis' ),
			'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":"60px 20px"}}} -->
<div class="wp-block-group alignfull" style="padding:60px 20px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Welcome to Our Site</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">This is a sample hero section pattern.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
			'categories'  => array( 'ominis' ),
		)
	);

	// Ejemplo: Patrón de tarjetas de características
	register_block_pattern(
		'ominis/features-cards',
		array(
			'title'       => __( 'Features Cards', 'ominis' ),
			'description' => __( 'Three feature cards with icons and descriptions.', 'ominis' ),
			'content'     => '<!-- wp:group {"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Feature One</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Description for the first feature.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Feature Two</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Description for the second feature.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Feature Three</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Description for the third feature.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:group -->',
			'categories'  => array( 'ominis' ),
		)
	);

	// Ejemplo: Patrón de testimonial
	register_block_pattern(
		'ominis/testimonial',
		array(
			'title'       => __( 'Testimonial', 'ominis' ),
			'description' => __( 'A testimonial block with quote and author.', 'ominis' ),
			'content'     => '<!-- wp:group {"style":{"spacing":{"padding":"40px"},"color":{"background":"#f0f0f0"}}} -->
<div class="wp-block-group has-background" style="background-color:#f0f0f0;padding:40px"><!-- wp:quote -->
<blockquote class="wp-block-quote"><p>This is a sample testimonial quote from a happy customer.</p><cite>John Doe</cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->',
			'categories'  => array( 'ominis' ),
		)
	);
}

add_action( 'init', 'ominis_register_block_patterns' );

/**
 * Register block pattern categories.
 */
function ominis_register_block_pattern_categories() {
	register_block_pattern_category(
		'ominis',
		array(
			'label' => __( 'Ominis Patterns', 'ominis' ),
		)
	);
}

add_action( 'init', 'ominis_register_block_pattern_categories' );
