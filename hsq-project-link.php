<?php
/**
 * Plugin Name:     Project Link
 * Description:     Shows an image next to a heading and a short descriptive text
 * Version:         0.1.0
 * Author:          Florian Huehn (hattedsquirrel.net)
 * Text Domain:     hsq-project-link
 *
 * @package         hsq
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function hsq_hsq_project_link_block_init() {
	$dir = __DIR__;

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "hsq/hsq-project-link" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'hsq-hsq-project-link-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_set_script_translations( 'hsq-hsq-project-link-block-editor', 'hsq-project-link' );

	$editor_css = 'build/index.css';
	wp_register_style(
		'hsq-hsq-project-link-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'hsq-hsq-project-link-block',
		plugins_url( $style_css, __FILE__ ),
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type(
		'hsq/hsq-project-link',
		array(
			'editor_script' => 'hsq-hsq-project-link-block-editor',
			'editor_style'  => 'hsq-hsq-project-link-block-editor',
			'style'         => 'hsq-hsq-project-link-block',
		)
	);
}
add_action( 'init', 'hsq_hsq_project_link_block_init' );
