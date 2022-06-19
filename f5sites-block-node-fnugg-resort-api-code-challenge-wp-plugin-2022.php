<?php
/**
 * Plugin Name:       Fnugg Resort
 * Plugin URI:        https://github.com/franciscof5/f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022
 * Description:       Get information from our resorts
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Francisco Matelli
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022
 * Domain Path:       f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022
 *
 * @package           f5sites
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function f_5_sites_f_5_sites_block_node_fnugg_resort_api_code_challenge_wp_plugin_2022_block_init() {
	#register_block_type( __DIR__ . '/build' );
    register_block_type(
      'f5sites/f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022',
      [
        'attributes'      => [
          'blockText' => [
            'default' => 'Start typing to search for resorts (fnugg.no)...',
            'type'    => 'string',
          ],
        ],
        'editor_script'   => 'f5sites-fnugg-resort-block-editor',
        'editor_style'    => 'f5sites-fnugg-resort-block-editor',
        'render_callback' => function( $attributes, $content ) {
          $block_text = esc_html( $attributes['blockText'] );
          return "<p class='wp-block-f5sites-f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022'>$block_text</p>";
        },
        'style'           => 'f5sites-fnugg-resort-block',
      ]
    );
    /*
    $dir = dirname( __FILE__ );

    $script_asset_path = "$dir/build/index.asset.php";
    if ( ! file_exists( $script_asset_path ) ) {
        throw new Error(
            'You need to run `npm start` or `npm run build` for the "create-block/dynamic-posts" block first.'
        );
    }
    $index_js     = 'build/index.js';
    $script_asset = require( $script_asset_path );
    wp_register_script(
        'create-block-dynamic-posts-block-editor',
        plugins_url( $index_js, __FILE__ ),
        $script_asset['dependencies'],
        $script_asset['version']
    );
    wp_set_script_translations( 'create-block-dynamic-posts-block-editor', 'dynamic-posts' );

    $editor_css = 'build/index.css';
    wp_register_style(
        'create-block-dynamic-posts-block-editor',
        plugins_url( $editor_css, __FILE__ ),
        array(),
        filemtime( "$dir/$editor_css" )
    );

    $style_css = 'build/style-index.css';
    wp_register_style(
        'create-block-dynamic-posts-block',
        plugins_url( $style_css, __FILE__ ),
        array(),
        filemtime( "$dir/$style_css" )
    );

    register_block_type( 'create-block/dynamic-posts', array(
        'editor_script' => 'create-block-dynamic-posts-block-editor',
        'editor_style'  => 'create-block-dynamic-posts-block-editor',
        'style'         => 'create-block-dynamic-posts-block',
    ) );*/
}
add_action( 'init', 'f_5_sites_f_5_sites_block_node_fnugg_resort_api_code_challenge_wp_plugin_2022_block_init' );

