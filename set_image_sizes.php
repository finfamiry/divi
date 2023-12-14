add_filter( 'et_pb_post_main_image_fullwidth_width', 'et_pb_post_main_image_width_customf' );
add_filter( 'et_pb_post_main_image_fullwidth_height', 'et_pb_post_main_image_height_customf' );
function et_pb_post_main_image_width_customf($width) {
    return '1080';
}
function et_pb_post_main_image_height_customf($height) {
    return '400';
}

add_image_size( 'et-pb-post-main-image-fullwidth', 1080, 400, true );
