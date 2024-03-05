<?php
/**
 * Template part for displaying FAQ items in the faq_list shortcode.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="faq-<?php the_ID(); ?>" class="faq__item">
    <div class="faq__item-content">
        <button class="faq__item-button h4"><?php the_title(); ?></button>
        <article class="faq__item-text h4"><?php the_content(); ?></article>
    </div>
</div>