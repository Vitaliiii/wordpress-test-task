<?php 
/**
 * Template Name: FAQ Plugin Shortcode
 */


get_header(); 

?>

    <main id="primary" class="site-main">
        <section id="faq-shortcode" class="faq">
            <div class="container">
                <?php echo do_shortcode('[faq_list ids="8, 9, 10, 11"]'); ?>
            </div>
        </section>
    </main><!-- #main -->

<?php 

get_footer();