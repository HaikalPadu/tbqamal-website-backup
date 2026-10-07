<?php
/**
 * Block styles.
 *
 * @package carbon-charity
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'carbon-charity-flat-button',
			'label' => __( 'Flat button', 'carbon-charity' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/list',
		array(
			'name'  => 'carbon-charity-list-underline',
			'label' => __( 'Underlined list items', 'carbon-charity' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'carbon-charity-box-shadow',
			'label' => __( 'Box shadow', 'carbon-charity' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'carbon-charity-box-shadow',
			'label' => __( 'Box shadow', 'carbon-charity' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'carbon-charity-box-shadow',
			'label' => __( 'Box shadow', 'carbon-charity' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/details',
		array(
			'name'  => 'carbon-charity-plus',
			'label' => __( 'Plus & minus', 'carbon-charity' ),
		)
	);
}
add_action( 'init', 'carbon_charity_register_block_styles' );

/**
 * This is an example of how to unregister a core block style.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function carbon_charity_unregister_block_style() {
	wp_enqueue_script(
		'carbon-charity-unregister',
		get_stylesheet_directory_uri() . '/assets/js/unregister.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		carbon_charity_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'carbon_charity_unregister_block_style' );
