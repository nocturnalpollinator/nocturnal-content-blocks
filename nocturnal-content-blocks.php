<?php
/**
* Plugin Name: Nocturnal Content Blocks
* Description: Requires ACF
* Version: 1.0
* Author: Robin Jonsson 
* Author URI: http://github.com/nocturnalpollinator
**/

define( 'NOC_CBLOCK_PATH', plugin_dir_path( __FILE__ ) );
define( 'NOC_CBLOCK_THEME_CONTENT', get_template_directory() . '/acf-content-blocks' );

if (file_exists(NOC_CBLOCK_PATH . '/vendor/autoload.php')) {
    require_once(NOC_CBLOCK_PATH . '/vendor/autoload.php');
}

/**
 * Disable Gutenberg 
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Disable the regular editor for pages
 */
add_action('init', function() {
    remove_post_type_support('page', 'editor');
});

/**
 * Require all includes
 */
foreach (glob(__DIR__ . '/Classes/*.php') as $filename)
{
    require_once($filename);
}
unset($filename);