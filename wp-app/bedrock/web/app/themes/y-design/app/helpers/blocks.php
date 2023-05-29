<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
    
$banner = new FieldsBuilder('banner');
$banner
    ->addText('title')
    ->addWysiwyg('content')
    ->addImage('background_image')
    ->setLocation('block', '==', 'acf/banner');

add_action('acf/init', function() use ($banner) {
   acf_add_local_field_group($banner->build());
});

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
            'mode' 				=> 'edit',
        ));
    }
}

add_filter('allowed_block_types_all', 'nova_allowed_block_types');
function nova_allowed_block_types( $allowed_blocks ) {
	return array(
		// custom ACF blocks
		'acf/banner',

        // 'core ACF blocks
        'core/heading',
        'core/paragraph',
        'core/image',
        'core/gallery',
        'core/list',
        'core/quote',
        'core/audio',
        'core/cover',
        'core/file',
        'core/video',
        'core/preformatted',
        'core/code',
        'core/freeform',
        'core/html',
        'core/pullquote',
        'core/table',
        'core/verse',
        'core/button',
        'core/columns',
        'core/media-text',
        'core/more',
        'core/nextpage',
        'core/separator',
        'core/spacer',
        'core/shortcode',
        'core/archives',
        'core/categories',
        'core/latest-comments',
        'core/latest-posts',
        'core/embed',
        'core-embed/twitter',
        'core-embed/youtube',
        'core-embed/facebook',
        'core-embed/instagram',
        'core-embed/wordpress',
        'core-embed/soundcloud',
        'core-embed/spotify',
        'core-embed/flickr',
        'core-embed/vimeo',
        'core-embed/animoto',
        'core-embed/cloudup',
        'core-embed/collegehumor',
        'core-embed/dailymotion',
        'core-embed/funnyordie',
        'core-embed/hulu',
        'core-embed/imgur',
        'core-embed/issuu',
        'core-embed/kickstarter',
        'core-embed/meetup-com',
        'core-embed/mixcloud',
        'core-embed/photobucket',
        'core-embed/polldaddy',
        'core-embed/reddit',
        'core-embed/reverbnation',
        'core-embed/screencast',
        'core-embed/scribd',
        'core-embed/slideshare',
        'core-embed/smugmug',
        'core-embed/speaker',
        'core-embed/ted',
        'core-embed/tumblr',
        'core-embed/videopress',
        'core-embed/wordpress-tv',
	);
}