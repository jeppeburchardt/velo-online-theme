<?php

function init_menus() {
	register_nav_menu('primary', __('Primary Menu'));
	register_nav_menu('categories', __('Categories'));	
}

add_theme_support('post-thumbnails'); 

add_image_size('velo-frontpage', 360, 202, true);
add_image_size('velo-article', 698, 350, true);

add_action('init', 'init_menus');

function velo_thumbnail( $html, $post_id, $post_image_id ) {
	global $post;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'velo-frontpage' );
	$html = '<img class="velo-image" src="'.$image[0].'" alt="'.esc_attr( get_post_field('post_title', $post_id )).'" />';
	return $html;
}
function velo_article_image() {
	global $post;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'velo-article' );
	$html = '<img class="velo-image" src="'.$image[0].'" alt="'.esc_attr( get_post_field('post_title', $post_id )).'" />';
	return $html;
}
add_filter( 'post_thumbnail_html', 'velo_thumbnail', 10, 3 );

//theme widgets:
//class PostTeasers extends WP_Widget {
//	function PostTeasers() {
//		parent::WP_Widget(false, 'Post teasers');
//	}
//function form($instance) {
//		// outputs the options form on admin
//	}
//function update($new_instance, $old_instance) {
//		// processes widget options to be saved
//		return $new_instance;
//	}
//function widget($args, $instance) {
//		// outputs the content of the widget
//	}
//}
//register_widget('PostTeasers');

//sidebar:
register_sidebar( array(
    'id'          => 'content-sidebar',
    'name'        => __( 'Content sidebar', $text_domain ),
    'description' => __( 'This sidebar is located to the right of an article.', $text_domain ),
) );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
	global $post;
	return '<a class="btn btn-default" role="button" href="'. get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function velo_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}
add_filter('wp_nav_menu_args', 'velo_wp_nav_menu_args');


// add category nicenames in body and post class
function valo_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes[] = $category->category_nicename;
    return $classes;
}
add_filter('post_class', 'valo_category_id_class');


?>