<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * List shortcodes
 *
 */
$listShortcodes = function($args, $assoc_args)
{
    $shortcodes = $GLOBALS['shortcode_tags'];
    
    $ret = [];
    foreach ($shortcodes as $tag => $callback) {
        $ret[] = [
            'tag' => $tag,
            'callback' => (string)$callback,
        ];
    }

    $format = isset($assoc_args['format']) ? $assoc_args['format'] : 'table';
    WP_CLI\Utils\format_items($format, $ret, array( 'tag', 'callback'));
};


WP_CLI::add_command( 'shortcode list', $listShortcodes);
