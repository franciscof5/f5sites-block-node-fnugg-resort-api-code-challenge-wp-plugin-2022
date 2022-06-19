<?php // -*- coding: utf-8 -*-
declare(strict_types=1);

/**
 * Plugin Name:       F5 Sites | Fnugg Resort
 * Plugin URI:        https://github.com/franciscof5/f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022
 * Description:       Get information from our resorts
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Francisco Matelli
 * Domain Path:       /languages
 *
 * @package         Fnugg
 */

namespace Fnugg;

/**
 * Defining base constant.
 */
defined('ABSPATH') || die;

/**
 * Initialize all the plugin things.
 *
 * @throws \Throwable
 *
 * @return array|void
 */
function initialize()
{
    try {
        // Translation directory updated !
        load_plugin_textdomain(
            'fnugg',
            true,
            basename(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'languages'
        );

        $autoload = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

        /**
         * Checking if vendor/autoload.php exists or not.
         */
        if (file_exists($autoload)) {
            /** @noinspection PhpIncludeInspection */
            require_once $autoload;
        }

        // Loading the core modules of the plugin
        $modules = [
            'api'   => (new Api\Api()),
            'block' => (new Block\Block([
                'dir'  => __DIR__,
                'file' => __FILE__,
            ])),
        ];

        /**
         * Filters the core modules of the plugin.
         *
         * @param array $modules
         */
        return array_map(function ($module) {
            $module->init();
        }, apply_filters('fnugg_core_modules', $modules));
    } catch (\Throwable $throwable) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            throw $throwable;
        }

        /**
         * Fires when any error happens.
         *
         * @param \Throwable $throwable
         */
        do_action('fnugg_error', $throwable);
    }
}
add_action('plugins_loaded', __NAMESPACE__ . '\\initialize');

add_action('fnugg_frontend_render_html', function($resp, $atts) {
    #var_dump("resp", $resp);
    if (empty($resp['hits'])) {
        return null; // Or anything on having no response or error.
    }
    #include('/your/path/to/file/fnugg-html-render-frontend.php');
    ?><div class="card">
        <div class="card-feature">
            <div class="card-top">
                <h3 class="card-title">
                    <?php echo $resp['hits']['hits'][0]['_source']['name']; ?>
                </h3>
                <p><?php echo $resp['hits']['hits'][0]['_source']['description']; ?></p>
                <p><img src="<?php echo $resp['hits']['hits'][0]['_source']['images']['image_full']; ?>"></p>
                <p><strong>Contact:</strong> <?php echo $resp['hits']['hits'][0]['_source']['description']; ?></p>
                <p><strong>Address:</strong> <?php echo $resp['hits']['hits'][0]['_source']['contact']['address']; ?></p>
            </div>
        </div>
    </div>
    <?php
}, 10, 2);
