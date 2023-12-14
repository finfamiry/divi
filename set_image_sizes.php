<?php
add_filter('et_pb_portfolio_image_height', 'portfolio_size_h');
add_filter('et_pb_portfolio_image_width', 'portfolio_size_w');
function portfolio_size_h($height) {
	return '400';
}
function portfolio_size_w($width) {
	return '400';
}
add_image_size('custom-portfolio-size', 400, 400 );

add_filter( 'et_pb_post_main_image_fullwidth_width', 'et_pb_post_main_image_width_customf' );
add_filter( 'et_pb_post_main_image_fullwidth_height', 'et_pb_post_main_image_height_customf' );
function et_pb_post_main_image_width_customf($width) {
    return '1080';
}
function et_pb_post_main_image_height_customf($height) {
    return '400';
}

add_image_size( 'et-pb-post-main-image-fullwidth', 1080, 400, array( 'center', 'center' ) );

function wpb_custom_image_sizes( $size_names ) {
    $new_sizes = array(
        'et-pb-post-main-image-fullwidth' => 'Article Main image short',
        'et-pb-post-main-image-fullwidth-large' => 'Article Main image large'
    );
    return array_merge( $size_names, $new_sizes );
}

add_filter( 'image_size_names_choose', 'wpb_custom_image_sizes' );

?>
