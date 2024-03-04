<?php

// Check value exists.

if( have_rows('page_builder') ):

    while ( have_rows('page_builder') ) : the_row();

        $layout = get_row_layout();
        $layout = str_replace( '_', '-', $layout );
        include "sections/{$layout}.php";

    endwhile;

// No value.
else :
    // Do something...
endif;

?>