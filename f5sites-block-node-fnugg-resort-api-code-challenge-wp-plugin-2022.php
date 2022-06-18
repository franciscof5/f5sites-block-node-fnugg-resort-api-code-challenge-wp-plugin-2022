<?php
/**
 * Plugin Name:       Fnugg Resort
 * Plugin URI:        https://github.com/franciscof5/f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022
 * Description:       Get information from our resorts
 * Requires at least: 5.8
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
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'f_5_sites_f_5_sites_block_node_fnugg_resort_api_code_challenge_wp_plugin_2022_block_init' );
