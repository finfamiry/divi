<?php
function my_theme_enqueue_styles() {

    $parent_style = 'Divi-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>

<?php
function custom_post_name () {
return array(
'feeds' => true,
'slug' => 'materiaalit-ja-oppaat',
'with_front' => false,
);
}
add_filter( 'et_project_posttype_rewrite_args', 'custom_post_name' );
?>

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

add_image_size( 'et-pb-post-main-image-fullwidth', 1080, 400, array('center', 'center') );

function wpb_custom_image_sizes( $size_names ) {
    $new_sizes = array(
        'et-pb-post-main-image-fullwidth' => __('Article Main image short'),
        'et-pb-post-main-image-fullwidth-large' => __('Article Main image large')
    );
    return array_merge( $size_names, $new_sizes );
}

add_filter( 'image_size_names_choose', 'wpb_custom_image_sizes' );

?>

<?php
// create new column in et_pb_layout screen
add_filter( 'manage_et_pb_layout_posts_columns', 'ds_create_shortcode_column', 5 );
add_action( 'manage_et_pb_layout_posts_custom_column', 'ds_shortcode_content', 5, 2 );
// register new shortcode
add_shortcode('ds_layout_sc', 'ds_shortcode_mod');
// New Admin Column
function ds_create_shortcode_column( $columns ) {
$columns['ds_shortcode_id'] = 'Module Shortcode';
return $columns;
}
//Display Shortcode
function ds_shortcode_content( $column, $id ) {
if( 'ds_shortcode_id' == $column ) {
?>
<p>[ds_layout_sc id="<?php echo $id ?>"]</p>
<?php
}
}
// Create New Shortcode
function ds_shortcode_mod($ds_mod_id) {
extract(shortcode_atts(array('id' =>'*'),$ds_mod_id));
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}
?>
