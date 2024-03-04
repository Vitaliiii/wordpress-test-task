<?php 
    $heightdesk = get_sub_field('space_desktop');
    $heightmob = get_sub_field('space_mobile');
?>
<div class="spacer" style="--space-desktop: <?php echo $heightdesk; ?>px;  --space-mobile: <?php echo $heightmob; ?>px"></div>