<?php 
    $post_id = get_the_ID();
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnails');
    if($thumb){
        $thumbUrl = $thumb[0];
        $thumbAlt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
        $thumbTitle = get_the_title(get_post_thumbnail_id());
    }    
?> 
<div id="post-<?php the_ID(); ?>" class="post" data-id='<?php echo $post_id;?>'>
    <?php if( $thumb ): ?>
        <a href="<?php the_permalink();?>">
            <div class="post-image">
                <img src="<?php echo $thumbUrl?>" alt="<?php echo $thumbAlt; ?>" title="<?php echo $thumbTitle; ?>"/>
            </div>
        </a>
    <?php endif;?> 
    <div class="post-text">
        <a href="<?php the_permalink();?>">
            <h4><?php the_title(); ?></h4>
        </a>
        <p><?php the_excerpt(); ?></p>
    </div>
    <?php display_rating($post_id);?>
</div>