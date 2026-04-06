<?php
/**
 * Register block styles for Gutenberg blocks.
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package ominis
 */

/**
 * Register block styles.
 */
function ominis_register_block_styles() {
	// Example: Register a custom style for the button block
	register_block_style(
		'core/button',
		array(
			'name'  => 'ominis-custom-button',
			'label' => __( 'Custom Button', 'ominis' ),
		)
	);

	// Example: Register a custom style for the image block
	register_block_style(
		'core/image',
		array(
			'name'  => 'ominis-image-shadow',
			'label' => __( 'Image with Shadow', 'ominis' ),
		)
	);

	// Example: Register a custom style for the paragraph block
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'ominis-highlight-text',
			'label' => __( 'Highlight Text', 'ominis' ),
		)
	);
}

add_action( 'init', 'ominis_register_block_styles' );
