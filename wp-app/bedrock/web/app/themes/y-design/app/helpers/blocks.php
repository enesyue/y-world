<?php

/**
 * Add custom block-category for filtering ACF-based blocks.
 */
add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
    $categories[] = array(
        'slug'  => 'y-blocks',
        'title' => 'y-blocks'
    );

    return $categories;
});

/**
 * Initilize blocks trough PHP's Reflection Method / Class.
 */
App\Blocks\Base\BlockBuilder::getBlocks();