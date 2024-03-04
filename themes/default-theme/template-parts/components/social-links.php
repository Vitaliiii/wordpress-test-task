<?php if( have_rows('social_links', 'option') ): ?>
    <ul class="social-links">
    <?php while( have_rows('social_links', 'option') ): the_row(); 
        $icon = get_sub_field('icon');
        $link = get_sub_field('link');
        ?>
        <li class="social-link">
            <a href="<?php echo $link; ?>" target="_blank" rel="nofollow">
                <?php if( !empty( $icon ) ): ?>
                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                <?php endif; ?>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>