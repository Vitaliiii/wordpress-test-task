<?php 
/**
 * Template Name: FAQ ACF field
 */


get_header(); 


?>

    <main id="primary" class="site-main">
        <section id="faq-acf" class="faq">
            <div class="container">
                <div class="faq__list">
                    <?php $faq_list = get_field('faq_list'); ?>
                    <?php
                        if ($faq_list) {
                            foreach ($faq_list as $post) {
                                setup_postdata($post);
                                if (get_post_status($post->ID) === 'publish') {
                                    get_template_part('template-parts/content', 'faq_plugin');
                                }
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p class="faq__message">Not found</p>';
                        }
                    ;?>     
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php 

get_footer();