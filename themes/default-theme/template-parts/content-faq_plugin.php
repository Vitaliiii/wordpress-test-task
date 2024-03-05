<?php
/**
 * Template part for displaying FAQ items in the faq_list shortcode.
 */

?>

<div id="faq-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-status="<?php echo get_post_status(get_the_ID());?>" class="faq__item">
    <div class="faq__item-content"></div>
</div>