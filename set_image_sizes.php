<?php

function custom_divi_image_sizes( $sizes ) {
    $custom_sizes = array(
        'custom-portfolio-size' => array(
            'width' => '400',
            'height' => '400',
            'crop' => false
        ),
        'et-pb-post-main-image' => array(
            'width' => '400',
            'height' => '400',
            'crop' => true
        ),
        'et-pb-post-main-image-fullwidth' => array(
            'width' => '1080',
            'height' => '400',
            'crop' => true
        ),
        'et-pb-portfolio-module-image' => array(
            'width' => '510',
            'height' => '382',
            'crop' => true
        ),
        'et-pb-portfolio-image-single' => array(
            'width' => '1080',
            'height' => '9999',
            'crop' => false
        ),
        'et-pb-gallery-module-image-portrait' => array(
            'width' => '400',
            'height' => '516',
            'crop' => true
        ),
        'et-pb-post-main-image-fullwidth-large' => array(
            'width' => '2880',
            'height' => '1800',
            'crop' => true
        ),
        'et-pb-image--responsive--dektop' => array(
            'width' => '1280',
            'height' => '720',
            'crop' => true
        ),
        'et-pb-image--responsive--table' => array(
            'width' => '980',
            'height' => '551',
            'crop' => true
        ),
        'et-pb-image--responsive--phone' => array(
            'width' => '480',
            'height' => '270',
            'crop' => true
        ),
    ),
);

return array_merge( $sizes, $custom_sizes );
}

add_filter( 'et_theme_image_sizes', 'custom_divi_image_sizes' );

function wpb_custom_image_sizes( $size_names ) {
    $new_sizes = array(
        'et-pb-post-main-image-fullwidth' => 'Article Main image short',
        'et-pb-post-main-image-fullwidth-large' => 'Article Main image large'
    );
    return array_merge( $size_names, $new_sizes );
}

add_filter( 'image_size_names_choose', 'wpb_custom_image_sizes' );
