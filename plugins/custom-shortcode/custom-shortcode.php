<?php
/**
 * Custom Shortcode
 *
 * Plugin Name: Custom Shortcode
 * Plugin URI:  #
 * Description: #.
 * Version:     1.0
 * Author:      Vitalii
 * Author URI:  #
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: custom -shortcode
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

function display_faq_list($atts) {
    $atts = shortcode_atts(
        array(
            'ids' => '',
        ),
        $atts,
        'faq_list'
    );

    if (empty($atts['ids'])) {
        return 'No posts found.';
    }

    $post_ids = explode(',', $atts['ids']);
    $post_ids = array_map('intval', $post_ids);

    $args = array(
        'post_type'      => 'faq',
        'post_status'    => 'publish',
        'posts_per_page' => -1, 
        'post__in'       => $post_ids,
        'orderby'        => 'post__in',
    );

    $query = new WP_Query($args);
    $output = '';

    if ($query->have_posts()) {
        $output .= '<div class="faq__list">';
        while ($query->have_posts()) {
            $query->the_post();
                
            ob_start();
            global $post;
            include(locate_template('/template-parts/content-faq_shortcode.php', false, false));
            $output .= ob_get_clean();

        }
        $output .= '</div>';
        wp_reset_postdata();
    } else {
        $output .= '<p>No posts found.</p>';
    }

    return $output;
}

add_shortcode('faq_list', 'display_faq_list');