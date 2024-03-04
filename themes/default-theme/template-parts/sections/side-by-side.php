<?php
    $theme = get_sub_field('theme') 
        ? '--'.get_sub_field('theme')
        : '';
    $media_side = get_sub_field('media_side') 
        ? '--'.get_sub_field('media_side')
        : '';
    $image = get_sub_field('image');
    $text = get_sub_field('text');
?>

<section class="sbs <?php echo $theme;?> <?php echo $media_side;?>">
    <div class="container">
        <div class="sbs__content">
            <div class="sbs__media">
                <?php if($image):?>
                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>" title="<?php echo $image['title'];?>" loading="lazy" decoding="async">
                <?php endif;?>
            </div>
            <div class="sbs__text">
                <?php if ($text):?>
                    <article><?php echo $text; ?></article>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

                    