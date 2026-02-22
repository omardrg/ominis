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
	// Ejemplo: Registrar un estilo personalizado para el bloque de botón
	register_block_style(
		'core/button',
		array(
			'name'  => 'custom-button',
			'label' => __( 'Custom Button', 'ominis' ),
		)
	);

	// Ejemplo: Registrar un estilo personalizado para el bloque de imagen
	register_block_style(
		'core/image',
		array(
			'name'  => 'image-shadow',
			'label' => __( 'Image with Shadow', 'ominis' ),
		)
	);

	// Ejemplo: Registrar un estilo personalizado para el bloque de párrafo
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'highlight-text',
			'label' => __( 'Highlight Text', 'ominis' ),
		)
	);
}

add_action( 'init', 'ominis_register_block_styles' );
